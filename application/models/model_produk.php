<?php 
	/**
	* 
	*/
	class Model_produk extends ci_model
	{
		
		function jenis($jenis)
		{
			return $this->db->where('jenis',$jenis)
					 		->get('produk');
		}
		public function dis_jenis()
		{
			return $this->db->query("SELECT DISTINCT(jenis) FROM `produk`");
		}
		function get_field($field,$val)
		{
			return $this->db->where($field,$val)
					 		->get('produk');
		}
		public function search($search='',$jenis='')
		{
			return $this->db->query("SELECT * from produk where nama_produk like '%$search%' and jenis='$jenis'");
		}
		public function banner()
		{
			return $this->db->get('banner');
		}
	}