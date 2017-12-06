<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('currency'))
{
	function currency($nominal,$mataUang,$kurs)
	{
		switch ($mataUang) {
			case 'rp':
					$jumlah_desimal="0";
					$pemisah_desimal=",";
					$pemisah_ribuan=".";
					return  $reNominal="IDR ".number_format($nominal,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan);
				break;
			case '$':
					$jumlah_desimal="0";
					$pemisah_desimal=",";
					$pemisah_ribuan=".";				
					$reNominal=$nominal*$kurs;
					$cek=strpos($reNominal,$pemisah_ribuan);
					 if ($cek!=null) {
					 	$ex=explode(".", $reNominal);
					 	$panjang=strlen($ex[1]);
					 }
					 else
					 {
					 	$panjang=2;
					 }
					return 	$usd="USD ".number_format($reNominal,$panjang,$pemisah_ribuan,$pemisah_desimal);
				break;
			default:
					$jumlah_desimal="0";
					$pemisah_desimal=",";
					$pemisah_ribuan=".";
					return  $reNominal="Rp. ".number_format($nominal,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan).",-";
				break;
		}
	}
}