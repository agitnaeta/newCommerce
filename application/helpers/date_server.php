<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('date_server'))
{
	function date_server($data)
	{
			if(!empty($data)){
				$garing="/";
				$cek=strpos($data,$garing);
				if($cek!=null)
				{
					$x=explode("/", $data);
					$date="$x[2]-$x[0]-$x[1]";
					return $date;
				}
				else
				{
					return $data;
				}
			}
			else{
				return date('Y-m-d');
			}
		
	}
}