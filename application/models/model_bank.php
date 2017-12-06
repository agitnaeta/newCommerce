<?php 
	/**
	* 
	*/
	class Model_bank extends ci_model
	{
		
		function all($value='')
		{
			return $this->db->get('bank');
		}
	}