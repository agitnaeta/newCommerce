<?php 
	/**
	* 
	*/
	class Template
	{
		protected $CI;
		
		public function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->helper('detect_device');
			$this->CI->load->model('model_profile');
			
		}

		public function output($body,$meta='')
		{
			$output='';
			$output .=$this->_head($meta);
			$output .=$this->_body($body);
			$output .=$this->_footer();
			return $output;
		}
		public function output_admin($body)
		{
			$output='';
			$output .=$this->_head();
			$output .=$this->_body_admin($body);
			$output .=$this->_footer();
			return $output;
		}
		private function _head($meta='')
		{
			$head='';
			// if ($meta==null) {
			// 	$meta=array('description'=>null,'keywords'=>null,'image'=>'http://gerai18.com/assets/uploads/files/b02e5-1502798684701.jpg');
			// }
			// $head.=$this->CI->load->view('template/meta',$meta,true);
			$head.=$this->CI->load->view('modul/css','',true);
			$head.=$this->CI->load->view('modul/js','',true);
			
			$head.=$this->CI->load->view('modul/ckeditor','',true);
			$head.=$this->CI->load->view('modul/datatable','',true);
			$head.=$this->CI->load->view('modul/select','',true);
			$head.=$this->CI->load->view('modul/swal','',true);

			$data['head']=$head;
			$data['webname']=$this->web_name();
			return $this->CI->load->view('template/head',$data,true);
		}
		private function _header()
		{

			$data['webname']=$this->web_name();
			return $this->CI->load->view('template/header',$data,true);
		}
		private function _header_admin()
		{
			$data['webname']=$this->web_name();
			return $this->CI->load->view('template/header_admin',$data,true);
		}
		private function _body($body='')
		{
			$data = array('body' => $body, 'header'=>$this->_header());
			return $this->CI->load->view('template/body',$data,true);
		}
		private function _body_admin($body='')
		{
			$data = array('body' => $body, 'header'=>$this->_header_admin());
			return $this->CI->load->view('template/body',$data,true);
		}
		private function _footer()
		{
			$data['webname']=$this->web_name();
			return $this->CI->load->view('template/footer',$data,true);
		}
		public function web_name()
		{
			return $this->CI->model_profile->type('webname')->row_object();
		}

	}