<?php 
	/**
	* 
	*/
	class Model_user extends ci_model
	{
		
		function auth($u,$p)
		{
			$this->db->where('username',$u);
			$this->db->where('password',$p);
			return $this->db->get('user');
		}
		function insert($data)
		{
			$this->db->insert('user',$data);
		}
		function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('user');
		}
		function update($data)
		{
			$this->db->where('id',$data['id']);
			return $this->db->update('user',$data);
		}
		function one($id)
		{
			$this->db->where('id',$id);
			return $this->db->get('user');
		}
		public function get_field($field,$val)
		{
			$this->db->where($field,$val);
			return $this->db->get('user');
		}
	}