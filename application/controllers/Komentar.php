<?php 
	/**
	* 
	*/
	class Komentar extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('response');
			$this->load->model('model_komentar');
		}
		public function list_komentar()
		{
			$s=$this->session->userdata('user');
			if (empty($s)) {
				redirect('login');
			}else{
				if ($s['role']=='0') {
					$data['komentar']=$this->model_komentar->get_all_komen($s['id'])->result();
				}else{
					$data['komentar']=$this->model_komentar->get_komen($s['id'])->result();
				}
				
				$tpl=$this->load->view('komentar/list_komentar',$data,true);
				echo $this->template->output_admin($tpl);
			}
		}
		public function insert()
		{
			$s=$this->session->userdata('user');
			if (empty($s)) {
				echo json_encode(response('9999','Silahkan Login Terlebih Dahulu',''));
			}else{
				$data = array(
					'iduser' => $s['id'],
					'idtopik'=> $this->input->post('idtopik'),
					'komentar'=>$this->input->post('komentar'), 
				);
				$this->model_komentar->insert($data);
				redirect('topik/lihat_topik/'.$data['idtopik'].'');
			}
		}
	}