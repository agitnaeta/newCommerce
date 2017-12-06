<?php 
	/**
	* 
	*/
	class Model_topik extends ci_model
	{
		function insert($data)
		{
			$this->db->insert('topik',$data);
		}
		function update($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('topik',$data);
		}
		function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('topik');
		}
		function get()
		{
			return $this->db->get('topik');
		}
		function one($field,$val)
		{
			$this->db->where($field,$val);
			return $this->db->get('topik');
		}
		function all()
		{
			return $this->db->get('topik');
		}
		function trending()
		{
			return $this->db->query("select t.id ,judul,COUNT(k.id) as jumlah from topik t, komentar k WHERE t.id=k.idtopik ORDER BY jumlah");
		}
		function cari_topik_trending($cari)
		{
			return $this->db->query("select t.id ,judul,COUNT(k.id) as jumlah from topik t, komentar k WHERE t.id=k.idtopik  and judul like '%$cari%' ORDER BY jumlah");
		}
		public function cari_topik($topik)
		{
			$this->db->like('judul',$topik);
			return $this->db->get('topik');
		}
		public function last_topik()
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('topik');
		}
	}