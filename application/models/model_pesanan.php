<?php 
	/**
	* 
	*/
	class Model_pesanan extends ci_model
	{
		
		public function insert($data)
		{
			return $this->db->insert('pemesanan',$data);
		}
		public function insert_rincian($data)
		{
			return $this->db->insert_batch('rincian',$data);
		}
		function get_user($id)
		{
			return $this->db->where('id_user',$id)
							->get('pemesanan','DESC');
		}
		public function get_pesanan($id)
		{
			return $this->db->where('id',$id)
							->get('pemesanan','DESC');
		}
		public function update($data)
		{
			return $this->db->where('id',$data['id'])
							->update('pemesanan',$data);
		}
		function detail_rincian($id_pesanan='')
		{
			return $this->db->where('id_pesanan',$id_pesanan)
							->get('rincian');
		}
		function all_order()
		{
			return $this->db->get('pemesanan');
		}
	}