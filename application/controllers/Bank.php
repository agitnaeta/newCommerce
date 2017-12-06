<?php 
	/**
	* 
	*/
	class Bank extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('grocery_CRUD');
		}
		function index()
		{
			$crud = new grocery_CRUD();
			$crud->set_table('bank')
			        ->set_subject('bank')
			        ->columns('id','nama','no_rek','kode','pemilik')
			        ->display_as('no_rek','Nomor Rekening')
			        ->display_as('jenis_kelamin','Jenis Kelamin');

			$crud->fields(
					'nama','no_rek','kode','pemilik'
			);
		
			
			$crud->required_fields('nama','no_rek','kode','pemilik');
			$output = $crud->render();
			$table_crud=$this->_bank_output($output);
			echo $this->template->output_admin($table_crud);
		}
		private function _bank_output($output = null)
		{
			$tpl=null;
			$tpl.=$this->load->view('template/crud_template',$output,true);
			$tpl.=$this->load->view('pelanggan/crud_pelanggan.php',(array)$output,true);
			return $tpl;
		}

	}