<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('dateindo'))
{
 function dateindo($date,$param) 
 { 
 		$bulanindo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        
        
       if ($param=="table") 
       {
          if ($date=="0000-00-00") {
            return $data="Not Set";
          }
          else
          {
              $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
              $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
              $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
              $result = (int)$tgl . " " . substr($bulanindo[(int)$bulan-1],0,3) . " ". $tahun;
              return $result;
          }
        
       }
       elseif ($param="time") 
       {
       		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
       		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
            	$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
       		$jam=substr($date,11,2);
			$menit=substr($date,14,2);
			$detik=substr($date,17,2);
			if ($date=="0000-00-00 00:00:00") 
			{
				return $date="Not Set";
			}
			else
			{
				$result = (int)$tgl . " " . substr($bulanindo[(int)$bulan-1],0,3) . " ". $tahun ." ".$jam.":".$menit.":".$detik;
        		return $result;
			}
			
       }
       else
       {

       	$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
           $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
           $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
       	$result = (int)$tgl . " " . $bulanindo[(int)$bulan-1] . " ". $tahun;
           return $result;

       }
        
}
}
