<?php 
	if ( ! function_exists('yesno'))
	{

		function yesno($data,$true,$false)
		{
			if ($data=="1") 
			{
				return "<i class='fa fa-check'></i> $true";
			}
			else
			{
				return "<i class='fa fa-remove'></i> $false";
			}
		}
	}