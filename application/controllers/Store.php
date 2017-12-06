<?php 
	/**
	* 
	*/
	class Store extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			$this->load->helper('response');
			$this->load->helper('dateindo');
		 
			$this->load->helper('rupiah');
			$this->load->model('model_pesanan');
			$this->load->model('model_komentar');
			$this->load->model('model_produk');
			$this->load->model('model_bank');
			$this->load->library('rajaongkir');
			$this->load->library('grocery_CRUD');
		}
		public function index($not_found='')
		{
			$is=isset($_GET['code']);
			if ($is==1) {
				$code=$_GET['code'];
				$url='import/grab_token/'.$code;
				redirect($url);
			}
			$tpl=null;
			$jenis=$this->model_produk->dis_jenis()->result();
			// print_r($jenis);die;
			foreach($jenis as $j){
				$produk[$j->jenis]=$this->model_produk->jenis($j->jenis)->result();
			}
			$data['produk']=$produk;
			$data['jenis']=$this->jenis_produk();
			$data['banner']=$this->model_produk->banner()->result();
			if ($not_found==true) {
				$tpl.=$this->load->view('store/etalase_kosong','',true);
			}
			$detect_device=detect_device(); 
			if ($detect_device=='pc') {
					$tpl.=$this->load->view('template/banner_search',$data,true);
					$tpl.=$this->load->view('store/etalase',$data,true);
					echo $this->template->output($tpl);
			}else{
			
					$tpl.=$this->load->view('template/banner_search_mobile',$data,true);
					$tpl.=$this->load->view('store/etalase_mobile',$data,true);
					echo $this->template->output($tpl);
			}
		
		}
		function jenis_produk()
		{
			return $jenis=$this->model_produk->dis_jenis()->result();
		}
		public function jenis($jenis='')
		{
			$tpl=null;
			if ($jenis==null) {
				redirect("store");
			}else{
				$produk[$jenis]=$this->model_produk->jenis($jenis)->result();
				if ($produk[$jenis]==null) {
					$this->index(true);
				}else{
					$data['produk']=$produk;
					$data['jenis']=$this->jenis_produk();
					$data['banner']=$this->model_produk->banner()->result();
				
					$tpl.=$this->load->view('template/banner_search',$data,true);
					$tpl.=$this->load->view('store/etalase',$data,true);
					echo $this->template->output($tpl);
				}
				
			}
		}
		function my_profile()
		{

			$data['profile']=$this->session->userdata('user');
			if ($data['profile']==null) {
				redirect('login');
			}
			$data['jenis']=$this->jenis_produk();
			$tpl=$this->load->view('store/my_profile',$data,true);
			echo $this->template->output($tpl);
		}
		public function my_order()
		{
			$s=$this->session->userdata('user');

			if ($s==null) {
				redirect('login');
			}
			$data['pesanan']=$this->model_pesanan->get_user($s['id'])->result();
			$data['bank']=$this->model_bank->all()->result();
			$data['jenis']=$this->jenis_produk();
			if (detect_device()=='pc') {
				$tpl=$this->load->view('store/list_order',$data,true);
				echo $this->template->output($tpl);
			}else{
				$tpl=$this->load->view('store/list_order_mobile',$data,true);
				echo $this->template->output($tpl);	
			}
			
		}
		public function konfirm_bayar($id_pesanan='',$error="")
		{
			if ($id_pesanan!=null) {
				$pesanan=$this->model_pesanan->get_pesanan($id_pesanan)->result();
				if ($pesanan==null) {
					redirect('store');
				}else{
					$data['jenis']=$this->jenis_produk();
					$data['id_pesanan']=$id_pesanan;
					$data['error']=$error;
					$tpl=$this->load->view('store/confirm_bayar',$data,true);
					echo $this->template->output($tpl);
				}
			}else{
				redirect('store');
			}
		}
		public function upload_bukti($value='')
		{


			 	$config['upload_path']          = './assets/uploads/bukti/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $config['encrypt_name'] 		= true;

               
                $id_pesanan=$this->input->post('id_pesanan');
              
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('bukti_bayar'))
                {
					$this->konfirm_bayar($id_pesanan,$this->upload->display_errors());
                }
                else
                {
                    $gambar=$this->upload->data();
                    $data = array(
                    	'id' => $id_pesanan,
                    	'bukti'=>$gambar['file_name'],
                    	'status'=>'waiting' 
                    );
                   $this->model_pesanan->update($data);
                   $this->konfirm_bayar($id_pesanan,"Upload Berhasil");
                }
		}
		public function invoice($id_pesanan='')
		{
			



			$pesanan=$this->model_pesanan->get_pesanan($id_pesanan)->result();
			if ($pesanan!=null) {

				$tbl_pesanan=array(
					"id"           =>$id_pesanan,
					"id_user"      =>$pesanan[0]->id_user,
					"total_harga"  =>$pesanan[0]->total_harga,
					"total_beban"  =>$pesanan[0]->total_beban,
					"service"      =>$pesanan[0]->service,
					"ongkir"       =>$pesanan[0]->ongkir,
					"tanggal_beli" =>$pesanan[0]->tanggal_beli,
					"alamat_kirim"  =>$pesanan[0]->alamat_kirim,
				);
				
				
				$user['user']=json_decode($tbl_pesanan['alamat_kirim'],true);

				$rincian=$this->model_pesanan->detail_rincian($id_pesanan)->result_array();
				
				// Definisi data
				$data['pesanan']=$tbl_pesanan;
				$data['rincian']=$rincian;
				$data['all']=$user;
				$data['status']=$pesanan[0]->status;
				// echo "<pre>";
				// print_r($user);
				$this->load->view('store/invoice_array',$data);
			}else{
				rediret("order/my_order");
			}
			
		}
		public function search($not_found='')
		{
			$search=$this->input->post('search');
			$tpl=null;
			$jenis=$this->model_produk->dis_jenis()->result();
			foreach($jenis as $j){

				$produk[$j->jenis]=$this->model_produk->search($search,$j->jenis)->result();
			}
			$data['produk']=array_filter($produk);
			$data['banner']=$this->model_produk->banner()->result();
			$data['jenis']=$this->jenis_produk();
			

			if ($not_found==true) {
				$tpl.=$this->load->view('store/etalase_kosong','',true);
			}
			$tpl.=$this->load->view('template/banner_search',$data,true);
			$tpl.=$this->load->view('store/etalase',$data,true);
			echo $this->template->output($tpl);

		}

		public function produk($nama_produk='',$id_produk='')
		{	

				if($id_produk==null){
					$this->index('true');
				}
				// Mengambil data prodyk detail
				$data['produk'] =$this->model_produk->get_field('id',$id_produk)->result();
				if ($data['produk']==null) {
					$this->index('true');
					die;
				}

				// Membuat meta data 
				$meta=array(
					'description' =>$data['produk'][0]->deskripsi,
					'keywords'    =>$data['produk'][0]->nama_produk.",".$data['produk'][0]->jenis.",".$data['produk'][0]->warna,
					'image'=>base_url("assets/uploads/files/".$data['produk'][0]->gambar),
				);
				// Mengambil Data Terakhir Dilihat
				$array=array(
					'nama_produk' =>$nama_produk,
					'id_produk'   =>$id_produk,
				);
				$_last_seen=$this->_last_seen($array);
				$last=array();
				foreach($_last_seen as $ls){
					$last[]=$this->model_produk->get_field('id',$ls['id_produk'])->result_object();
				}
				$data['last']=$last;
				$data['review'] =$this->model_komentar->get_produk($id_produk)->result();
				$data['jenis']  =$this->jenis_produk();
				if (detect_device()=='pc') {
					$tpl=$this->load->view('store/detail_produk',$data,true);
					echo $this->template->output($tpl,$meta);
				}else{
					$tpl=$this->load->view('store/detail_produk_mobile',$data,true);
					echo $this->template->output($tpl,$meta);
				}
		}
		public function destroy()
		{
			$this->session->unset_userdata('last_seen');
		}
		private function _last_seen($array)
		{
			
			$_last_seen=$this->session->userdata('last_seen');

			if ($_last_seen==null) {
				$_last_seen=array();
				array_push($_last_seen, $array);
				$this->session->unset_userdata('last_seen');
				$this->session->set_userdata('last_seen',$_last_seen);
				return $_last_seen;
			}else{
				$id_last=array();
				foreach($_last_seen as $ls){
					$id_last[]=$ls['id_produk'];
				}
			
				if (in_array($array['id_produk'], $id_last)) {
					return $_last_seen;
				}else{
					if (count($_last_seen)>=6) {
						unset($_last_seen[0]);
					}
					array_push($_last_seen, $array);
					$this->session->unset_userdata('last_seen');
					$this->session->set_userdata('last_seen',$_last_seen);
					return $_last_seen;
				}
			}
		}

		public function add_review()
		{
			$s=$this->session->userdata('user');
			if ($s==null) {
				redirect("login");
			}
			$data = array(
				'id_produk' => $this->input->post('id_produk'), 
				'rating' => $this->input->post('rating'), 
				'komentar' => $this->input->post('komentar'),
				'id_user'=>$s['id'],
				'nama_lengkap'=>$s['nama_lengkap'], 
			);
			$this->model_komentar->add_review($data);
			$this->produk($data['id_produk']);
		}
		public function all_komentar()
		{
			$data['review']=$this->model_komentar->all()->result();
			$tpl=$this->load->view('store/all_komentar',$data,true);
			echo $this->template->output_admin($tpl);
		}
		function banner()
		{
			$crud = new grocery_CRUD();
			$crud->set_table('banner')
			        ->set_subject('banner')
			        ->columns('id','gambar','link','status')
			        ->display_as('gambar','Gambar (1000x187)');;
			        

			$crud->fields(
				'gambar','link','status'
			);

			$crud->set_field_upload('gambar','assets/uploads/files');
			$crud->field_type('status','dropdown',array(
					'1'=>'show',
					'0'=>'off'
			));
			$crud->required_fields('gambar','link','status');

			$output = $crud->render();
			$table_crud=$this->_banner_output($output);
			echo $this->template->output_admin($table_crud);
		}
		private function _banner_output($output = null)
		{
			$tpl=null;
			$tpl.=$this->load->view('template/crud_template',$output,true);
			$tpl.=$this->load->view('store/crud_banner.php',(array)$output,true);
			return $tpl;
		}
	}