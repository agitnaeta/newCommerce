<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('model_profile');
		$this->load->model('model_produk');
		
		$this->load->library('grocery_CRUD');
	}
	public function index()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('profile')
		        ->set_subject('profile')
		        ->display_as('type','Type');

		 #untuk Editan 
		$crud->fields('type','judul','isi','gambar');

		#untuk set validasi 
		$crud->callback_before_insert(array($this,'type_callback'));

		#untuk Set Type
		$crud->field_type('type','dropdown',
				array(
					'kontak'    =>'Kontak',
					'profile'   =>'Profile',
					'visi_misi' =>'Visi Misi',
					'webname'   =>'Web Name',
				)
		);

		// $crud->unset_texteditor('isi','full_text');
		$crud->set_field_upload('gambar','assets/uploads/files');

		$crud->required_fields('type','judul','isi','gambar');
		$output     = $crud->render();
		$table_crud =$this->_profile_output($output);
		echo $this->template->output_admin($table_crud);
	}
	private function _profile_output($output = null)
	{
		$tpl=null;
		$tpl.=$this->load->view('template/crud_template',$output,true);
		$tpl.=$this->load->view('profile/crud_profile.php',(array)$output,true);
		return $tpl;
	}
	function type_callback($post_array='')
	{
		$type=$this->model_profile->type($post_array['type'])->result();
		if ($type!=null) {
			$this->form_validation->set_message('type','Tipe Sudah Digunakan,silahkan edit yang sudah ada');	
			return false;	
		}else{
			return true;
		}
	}
	public function type($type='')
	{
		if ($type==null) {
			redirect("store");
		}else{
			$profile=$this->model_profile->type($type)->result();
			if ($profile!=null) {
				$data['profile']=$profile;
				$data['jenis']=$this->model_produk->dis_jenis()->result();
				$tpl=$this->load->view('profile/view',$data,true);
				echo $this->template->output($tpl);
			}else{
				redirect("store");
			}
			
		}
	}

}