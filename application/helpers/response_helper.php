<?php 
	function response($code,$msg,$params)
	{
		return array('code'=>$code,'msg'=>$msg,'params'=>$params);
	}