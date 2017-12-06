<?php 
	/**
	* 
	*/
	class Daftar extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('response');
			$this->load->model('model_user');
			$this->load->model('model_produk');

		}
		
		public function index($response='')
		{
			$data['response']=$response;
			$data['jenis']=$this->model_produk->dis_jenis()->result();
			$body=$this->load->view('form_daftar',$data,true);
			echo $this->template->output($body);
		}
		public function create_account()
		{
			
			$config=array(
				array(
					"field"=>"nama_lengkap",
					"label"=>"Nama Lengkap",
					"rules"=>'required|min_length[4]|max_length[100]',
				),
				array(
					"field"=>"username",
					"label"=>"Nama Pengguna",
					"rules"=>'alpha_numeric|required|min_length[8]|max_length[100]|callback_cek_duplikat[username]',
				),
				array(
					"field"=>"password",
					"label"=>"Kata Sandi",
					"rules"=>'required|min_length[8]|max_length[100]',
				),
				array(
					"field"=>"email",
					"label"=>"E-Mail",
					"rules"=>'required|valid_email|callback_cek_duplikat[email]',
				),
				array(
					"field"=>'jenis_kelamin',
					"label"=>"Jenis Kelamin",
					"rules"=>'required',
				),
			);	
		
		
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run()!=false) {
				$clear_data=array(
					'nama_lengkap'  =>$this->input->post('nama_lengkap'),
					'username'      =>$this->input->post('username'),
					'password'      =>$this->input->post('password'),
					'email'         =>$this->input->post('email'),
					'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
				);
				$this->model_user->insert($clear_data);
				$this->index($response=response('1000','Berhasil Mendaftar Silahan Login',''));
			}else{
				$this->index($response=response('9999','Gagal Mendaftar Silahkan Coba lagi',''));
			}
			
		}
		public function cek_duplikat($value,$field)
		{	
			$cek=$this->model_user->get_field($field,$value)->result();
			if ($cek!=null) {
				$this->form_validation->set_message('cek_duplikat', $value.' Sudah Digunakan');
				return false;
			}else{
				return TRUE;
			}
		}


	}