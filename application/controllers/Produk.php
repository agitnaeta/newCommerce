<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');

		
		$this->load->library('grocery_CRUD');
	}
	public function index()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('produk')
		        ->set_subject('produk')
		        ->display_as('nama_produk','Nama Produk')
		        ->display_as('berat','Berat (kg)');

		 #untuk Editan 
		$crud->fields('nama_produk','harga','ukuran','berat','jenis','stock','warna','gambar','deskripsi');

		#untuk set validasi 
		


		#untuk Set Type
		$crud->field_type('ukuran','dropdown',
				array(
					'S'              =>'S',
					'M'              =>'M',
					'L'              =>'L',
					'XL'             =>'XL',
					'XXL'            =>'XXL',
					'all_size_fit_l' =>'All Size Fit L'
				)
		);
			$crud->field_type('jenis','dropdown',
				array(
					'Jaket'       =>'Jaket',
					'Kaos'        =>'Kaos',
					'Jeans'       =>'Jeans',
					'Topi'        =>'Topi',
					'Tas'         =>'Tas',
					'Dompet'      =>'Dompet',
					'Sepatu'      =>'Sepatu',
					'Sendal'      =>'Sendal',
					'Baju_Muslim' =>'Baju Muslim',
					'Kutu_baru'   =>'Kutu baru',
					'BatWing'     =>'BatWing',
					'Jam_Tangan'  =>'Jam Tangan',
					'Kerudung'    =>'Kerudung',
					'Flanel'      =>'Flanel',
				)
		);	

		
		$crud->set_field_upload('gambar','assets/uploads/files');

		$crud->required_fields('nama_produk','harga','ukuran','jenis','stock');
		$output = $crud->render();
		$table_crud=$this->_produk_output($output);
		echo $this->template->output_admin($table_crud);
	}
	private function _produk_output($output = null)
	{
		$tpl=null;
		$tpl.=$this->load->view('template/crud_template',$output,true);
		$tpl.=$this->load->view('produk/crud_produk.php',(array)$output,true);
		return $tpl;
	}
}