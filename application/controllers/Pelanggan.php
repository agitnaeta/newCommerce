<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		$this->load->library('rajaongkir');
		$this->load->model('model_user');
	}
	public function index()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('user')
		        ->set_subject('User')
		        ->columns('id','nama_lengkap','username','password','email','jenis_kelamin','role')
		        ->display_as('nama_lengkap','Nama Lengkap')
		        ->display_as('jenis_kelamin','Jenis Kelamin');

		$crud->fields(
				'nama_lengkap',
				'username',
				'password',
				'email',
				'jenis_kelamin',
				'role',
				'provinsi',
				'kota',
				'kodepos',
				'no_telp',
				'alamat'
		);
		$crud->set_rules('username','username','callback_username');
		$crud->set_rules('email','email','valid_email');

		$crud->field_type('jenis_kelamin','dropdown',array('L'=>'Laki-Laki','P'=>'Perempuan'));
		$crud->field_type('role','dropdown',array('1'=>'User','0'=>'Admin'));
		$crud->field_type('provinsi','dropdown',$this->get_provinsi());
		$crud->field_type('kota','dropdown',$this->get_city());
		$crud->field_type('password','password','');
		
		$crud->required_fields('nama_lengkap','username','password','email');
		$output = $crud->render();
		$table_crud=$this->_pelanggan_output($output);
		echo $this->template->output_admin($table_crud);
	}
	private function _pelanggan_output($output = null)
	{
		$tpl=null;
		$tpl.=$this->load->view('template/crud_template',$output,true);
		$tpl.=$this->load->view('pelanggan/crud_pelanggan.php',(array)$output,true);
		return $tpl;
	}
	public function username($username='')
	{
		$r=str_replace(" ",'',$username);
		$l=strlen($username);
		$lr=strlen($r);
		if ($l!=$lr) {
			$this->form_validation->set_message('username','Tidak boleh ada spasi');
			return false;
		}else{
			return true;
		}
	}



	public function get_provinsi()
	{
		
		
		$p=$this->rajaongkir->get_provinsi();
		if ($p['code']=='1000') {
			$x=json_decode($p['val'],true);
			$provinsi=$x['rajaongkir']['results'];


			for ($i=0; $i <count($provinsi) ; $i++) { 
				$val=$provinsi[$i]['province'];
				$pro[$provinsi[$i]['province_id']]=$val;
			}
			// print_r($pro);
			return $pro;

		}else{
			return false;
		}
	}
	public function get_city()
	{
		$p=$this->rajaongkir->get_city();
		if ($p['code']=='1000') {
			$x=json_decode($p['val'],true);
			$provinsi=$x['rajaongkir']['results'];


			for ($i=0; $i <count($provinsi) ; $i++) { 
				$val=$provinsi[$i]['city_name'];
				$pro[$provinsi[$i]['city_id']]=$val;
			}
			// print_r($pro);
			return $pro;

		}else{
			return false;
		}
	}
	function update_pelanggan()
	{
		$data = array(
			'id'       =>$this->input->post('id'),
			'provinsi' =>$this->input->post('provinsi'),
			'kota'     =>$this->input->post('kota'),
			'kodepos'  =>$this->input->post('kodepos'),
			'alamat'  =>$this->input->post('alamat'),
		);
		$this->model_user->update($data);
	}
}