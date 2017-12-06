<?php 
	/**
	* 
	*/
	class model_komentar extends ci_model
	{
		public function add_review($data)
		{
			$this->db->insert('review',$data);
		}
		public function get_produk($id_produk)
		{
			return $this->db->where('id_produk',$id_produk)->get('review');
		}
		public function all()
		{
			return $this->db->get('review','DESC');
		}
	}