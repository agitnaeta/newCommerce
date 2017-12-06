<?php 
	/**
	* 
	*/
	class Model_profile extends ci_model
	{
		
		function type($type='')
		{
			$this->db->where('type',$type);
			return $this->db->get('profile');
		}
		
	}