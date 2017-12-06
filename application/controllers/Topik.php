
<?php 
	/**
	* 
	*/
	class Topik extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_topik');
			$this->load->model('model_komentar');
			$this->load->helper('response');
		}
		public function index()
		{
			$data['topik']    =$this->model_topik->all()->result();
			$data['trending']=$this->model_topik->trending()->result();
			$tpl=$this->load->view('topik/list_topik',$data,true);
			echo $this->template->output($tpl);
		}
		public function list_topik()
		{
			$s       =$this->session->userdata('user');
			if (empty($s)) {
				redirect('login');
			}
			$user_id            =$s['id'];
			if ($s['role']=='0') {
				$data['topik']      =$this->model_topik->all()->result();
			}else{
				$data['topik']      =$this->model_topik->one('user_id',$user_id)->result();
			}
			$data['last_topik'] =$this->last_topik();
			$data['trending']   =$this->model_topik->trending()->result();
			$tpl=$this->load->view('topik/table_topik',$data,true);
			echo $this->template->output_admin($tpl);
		}
		public function topik_trending()
		{
			$data['trending']=$this->model_topik->trending();

		}
		public function form_topik()
		{
			$tpl=$this->load->view('topik/form_topik','',true);
			echo $this->template->output_admin($tpl);
		}
		public function tambah_topik()
		{
			$s       =$this->session->userdata('user');
			$data = array(
				'judul'   => $this->input->post('judul'), 
				'isi'     => $this->input->post('isi'),
				'user_id' => $s['id'], 
			);
			$this->model_topik->insert($data);
			echo json_encode(response('1000','Berhasil Insert',''));
		}
		public function form_update($id)
		{
			$data['topik']=$this->model_topik->one('id',$id)->result();
			$tpl=$this->load->view('topik/form_update',$data,true);
			echo $this->template->output_admin($tpl);
		}
		public function update_topik()
		{
			$data = array(
				'judul'   => $this->input->post('judul'), 
				'isi'     => $this->input->post('isi'),
				'id'      => $this->input->post('id'),
			);
			$this->model_topik->update($data);
			echo json_encode(response('1000','Berhasil Update',''));
		}
		public function delete_topik()
		{
			$id=$this->input->post('id');
			$this->model_topik->delete($id);
			echo json_encode(response('1000','Berhasil Delete',''));
		}
		public function lihat_topik($id)
		{
			$data['topik']=$this->model_topik->one('id',$id)->result();
			$data['komentar']=$this->model_komentar->get_komen_topik($id)->result();
			$tpl=$this->load->view('topik/lihat_topik',$data,true);

			$s       =$this->session->userdata('user');
			if (empty($s)) {
				echo $this->template->output($tpl);
			}else{
				echo $this->template->output_admin($tpl);
			}
			
		}
		public function cari_topik()
		{
			$cari          =$this->input->post('cari');
			$data['trending'] =$this->model_topik->cari_topik_trending($cari)->result();
			$data['topik'] =$this->model_topik->cari_topik($cari)->result();
			$tpl           =$this->load->view('topik/list_topik',$data,true);
			$s             =$this->session->userdata('user');
			if (empty($s)) {
				echo $this->template->output($tpl);
			}else{
				echo $this->template->output_admin($tpl);
			}
		}
		function last_topik()
		{
			return $last_topik=$this->model_topik->last_topik()->result();
		}		
	}