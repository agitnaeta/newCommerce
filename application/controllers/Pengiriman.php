<?php 
	/**
	* 
	*/
	class Pengiriman extends ci_controller
	{
		
		private $key='2cc23218430be7c4241c84a336eddb43';
		private $host="http://api.rajaongkir.com/starter";


		function __construct()
		{
			parent::__construct();	
		}
		function config_base()
		{
			return array('province_id'=>'9','city_id'=>'440');
		}
		public function get_city()
		{
			$get="/city";
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $this->host.$get,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: ".$this->key.""
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}

		}
		public function cost()
		{
			$curl = curl_init();
			$config_base=$this->config_base();
			$data_kirim=array(
				"origin"=>$config_base['city_id'],
				"destination"=>'114',
				"weight"=>'1000',
				"courier"=>'jne',
			);
			curl_setopt_array($curl, array(
			  CURLOPT_URL =>$this->host."/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => http_build_query($data_kirim),
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: ".$this->key.""
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}
		}
	}