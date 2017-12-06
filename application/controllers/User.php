<?php 
	/**
	* 
	*/

	// defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('template');
			$this->load->model('model_user');
			$this->load->helper('response');
		}
		public function profile($response='')
		{
			$session=$this->session->userdata("user");
			if ($session!=null) {
				$data['response']=$response;
				$data['user'] =$this->model_user->one($session['id']);
				$body         =$this->load->view('form_user',$data,true);
				echo $this->template->output_admin($body);
			}
			
		}
		public function update()
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
					"rules"=>'alpha_numeric|required|min_length[8]|max_length[100]',
				),
				array(
					"field"=>"password",
					"label"=>"Kata Sandi",
					"rules"=>'min_length[8]|max_length[100]',
				),
				array(
					"field"=>"email",
					"label"=>"E-Mail",
					"rules"=>'required|valid_email',
				),
				array(
					"field"=>'jenis_kelamin',
					"label"=>"Jenis Kelamin",
					"rules"=>'required',
				),
			);

			$this->form_validation->set_rules($config);
			if ($this->form_validation->run()!=false) {
				$password=$this->input->post('password');

				$clear_data=array(
					'id'			=>$this->input->post('id'),
					'nama_lengkap'  =>$this->input->post('nama_lengkap'),
					'username'      =>$this->input->post('username'),
					'password'      =>$this->input->post('password'),
					'email'         =>$this->input->post('email'),
					'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
				);

				if ($password==null) {
					unset($clear_data['password']);
				}
				$this->model_user->update($clear_data);
				$this->profile($response=response('1000','Berhasil memperbarui data',''));
			}else{
				$this->profile($response=response('9999','Gagal memperbarui data',''));
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
		function update_data()
		{
			$clear_data=array(
					'id'            =>$this->input->post('id'),
					'nama_lengkap'  =>$this->input->post('nama_lengkap'),
					'username'      =>$this->input->post('username'),
					'password'      =>$this->input->post('password'),
					'email'         =>$this->input->post('email'),
					'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
					'alamat'        =>$this->input->post('alamat'),
					'kota'          =>$this->input->post('kota'),
					'provinsi'      =>$this->input->post('provinsi'),
					'kodepos'       =>$this->input->post('kodepos'),
					'no_telp'       =>$this->input->post('no_telp'),
			);

			$this->model_user->update($clear_data);
			$this->session->unset_userdata('user');
			$this->session->set_userdata('user',$clear_data);
			redirect('store/my_profile');
		}
		

	}