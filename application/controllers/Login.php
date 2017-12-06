<?php 
	/**
	* 
	*/
	class Login extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('response');
			$this->load->library('fb');
			$this->load->model('model_user');
			$this->load->model('model_produk');
		}
		public function auth()
		{
			$u=$this->input->post('username');
			$p=$this->input->post('password');
			$auth=$this->model_user->auth($u,$p)->result();
			if ($auth!=null) {
				$data=(array)$auth[0];
				$this->session->set_userdata('user',$data);
				if($data['role']==1){
					redirect('store/my_profile');
				}else{
					redirect('panel');
				}
			}else{
				$response=response('9999',"Gagal Login","");
				$this->index($response);
			}
		}
		public function index($response='')
		{
			$res['jenis']=$this->jenis_produk();
			$res['response']=$response;
			$body=$this->load->view('form_login',$res,true);
			echo $this->template->output($body);
		}
		function jenis_produk()
		{
			return $jenis=$this->model_produk->dis_jenis()->result();
		}
		public function logout()
		{
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('cart');
			redirect('login');
		}
		public function fbauth()
		{
			$url=$this->fb->auth();
			redirect($url);
		}
		public function loginfb()
		{
				$code=$_GET['code'];
				$this->fb->grab_auth($code);
		}
	}