<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		
		$this->load->helper('url');
		$this->load->helper('dateindo');
		$this->load->helper('response');
		$this->load->helper('rupiah');
		$this->load->model('model_produk');
		$this->load->model('model_pesanan');
		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->load->library('rajaongkir');
		$this->load->library('grocery_CRUD');
	}
	public function confirm()
	{
		$data=null;$total=null;$total_beban=null;
		$id_produk=$this->input->post('id_produk');
		if ($id_produk==null) {
			redirect('cart');
		}
		$beban=$this->input->post('berat');
		if (array_sum($beban)>=30) {
			$this->session->set_flashdata('over','Pesanan Harus dibawah 30Kg');
			redirect('cart');
		}
		for($i=0; $i<count($id_produk); $i++)
		{
			$data[]= array(
				'id_produk'   => $id_produk[$i],
				'harga'       =>$this->input->post('harga')[$i], 
				'berat'       =>$this->input->post('berat')[$i], 
				'jumlah'      =>$this->input->post('jumlah')[$i], 
				'sub'         =>$this->input->post('sub')[$i], 
				'gambar'      =>$this->input->post('gambar')[$i], 
				'nama_produk' =>$this->input->post('nama_produk')[$i], 
			);
			$total[]       =$this->input->post('sub')[$i];
			$total_beban[] =$this->input->post('berat')[$i];
		}

		$s=$this->session->userdata('user');
		if ($s==null){
			redirect("login");
		}else{
			$all_pemesan=array(
				'id_pengguna' =>$s['id'],
				'rincian'     =>$data,
				'total_harga' =>array_sum($total),
				'total_beban' =>array_sum($total_beban),
			);
			


			// Definisikan data 
			$data['pesanan'] =$all_pemesan;
			$data['jenis']   =$this->model_produk->dis_jenis()->result();
			$data['user']    =$this->model_user->one($all_pemesan['id_pengguna'])->result();

			// insert user to cart
			$all=array_merge($all_pemesan,array('user'=>(array)$data['user']));
			
			// Hitung Harga Kirim
			$destination    =$data['user'][0]->kota;
			$weight         =$all_pemesan['total_beban'];
			$cek_harga      =$this->rajaongkir->cost($destination,$weight)['val']; 
			$harga          =json_decode($cek_harga,true);
			$data['ongkir'] =$harga['rajaongkir']['results'];


			// Set session 
			$this->session->unset_userdata('final_cart');
			$this->session->set_userdata('final_cart',$all);

			if (detect_device()=='pc') {
				$tpl=$this->load->view('store/confirm_alamat',$data,true);
				echo $this->template->output($tpl);
			}else{
					$tpl=$this->load->view('store/confirm_alamat_mobile',$data,true);
				echo $this->template->output($tpl);
			}
			
		}

	}
	public function list_provinsi()
	{
		$list_provinsi=$this->rajaongkir->get_provinsi();
		$provinsi=json_decode($list_provinsi['val'],true);
		$data['province']=$provinsi['rajaongkir']['results'];
	
		echo $this->load->view("store/list_provinsi",$data,true);
	}
	function list_kota()
	{

		$list_provinsi=$this->rajaongkir->get_city();
		$provinsi=json_decode($list_provinsi['val'],true);
		$data['kota']=$provinsi['rajaongkir']['results'];
		echo $this->load->view("store/list_kota",$data,true);
	}
	public function update_final_cart()
	{
		$kurir  =array(
			'ongkir'=>$this->input->post('ongkir'),
			'service'=>$this->input->post('service')
		);
		$fc=$this->session->userdata('final_cart');
		$new=array_merge($kurir,$fc);
		$this->session->unset_userdata('final_cart');
		$this->session->set_userdata('final_cart',$new);
		echo json_encode($this->session->userdata('final_cart'));
	}
	public function cetak()
	{

		$all=array();
		$s=$this->session->userdata('final_cart');
		if ($s==null) {
			redirect('store');
		}
		$tbl_pesanan=array(
			'id'           =>date('ymdhis'),
			'id_user'      =>$s['id_pengguna'],
			'total_harga'  =>$s['total_harga'],
			'total_beban'  =>$s['total_beban'],
			'service'      =>$s['service'],
			'ongkir'       =>$s['ongkir'],
			'tanggal_beli' =>date('Y-m-d H:i:s'),
			'alamat_kirim' =>(string)json_encode($s['user']),
		);

		foreach ($s['rincian'] as $row){
			$rincian=array_merge(array('id_pesanan'=>$tbl_pesanan['id']),$row);
			$all[]=$rincian;
		}
		$data['pesanan']=$tbl_pesanan;
		$data['rincian']=$all;
		$data['all']=$s;
		$data['status']=null;
		 $this->model_pesanan->insert($tbl_pesanan);
		 $this->model_pesanan->insert_rincian($all);

	 
		$this->load->view('store/invoice',$data);	

		$this->session->unset_userdata('cart');	
		$this->session->unset_userdata('final_cart');	
	}
	public function all_order()
	{
		$data['pesanan']=$this->model_pesanan->all_order()->result();
		$data['jenis']=$this->model_produk->dis_jenis();
		$tpl=$this->load->view('store/all_order',$data,true);
		echo $this->template->output_admin($tpl);
	}
	public function approve($id_pesanan='')
	{
		if ($id_pesanan==null) {
			echo json_encode(response("9999","gagal terima",null));

		}else{
			$array=array(
				'id'=>$id_pesanan,
				'status'=>'Paid',
			);
			$this->model_pesanan->update($array);
			echo json_encode(response("1000","Success",null));
		}
	}
}