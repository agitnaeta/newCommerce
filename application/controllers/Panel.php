<?php 
	/**
	* 
	*/
	class Panel  extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->cek_session();
			$this->load->model('model_topik');
		}
		public function cek_session()
		{
			$session=$this->session->userdata('user');
			if ($session!=null) {
				return $session;
			}else{
				redirect('login');
			}
		}
		public function index()
		{
			$body=$this->load->view('dashboard','',true);
			echo $this->template->output_admin($body);
		}
		function last_topik()
		{
			return $last_topik=$this->model_topik->last_topik()->result();
		}	
	}