<?php 


	if ( ! function_exists('kosong'))
	{

		function kosong($data)
		{
			if ($data==null) 
			{
				echo "<h3 class='text-center text-muted'> Opps.. Sorry no data to display...</h3>";
			}
			else
			{
				return $data;
			}
		}
	}