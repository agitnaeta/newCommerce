<?php 
	/**
	* 
	*/
	class Rajaongkir
	{
		protected $CI;
		private $key='2cc23218430be7c4241c84a336eddb43';
		private $host="http://api.rajaongkir.com/starter";
		
		function response($code,$msg,$val='')
		{
			return  array('code'=>$code,'msg'=>$msg,'val'=>$val);
		}
		public function __construct()
		{
			$this->CI =& get_instance();
		}

		function config_base()
		{
			return array('province_id'=>'9','city_id'=>'440');
		}
		private function _get($get)
		{
			
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
			 	return $this->response('9',$err,null);
			} else {
			  	return  $this->response('1000','Success',$response);
			}

		}
		public function get_city()
		{
			$city="/city";
			return $this->_get($city);
		}
		public function get_provinsi()
		{
			$pro="/province";
			return $this->_get($pro);
		}
		public function detail_city($id='',$arr_key='')
		{
			$detail_city='/city?id='.$id;
			$data=$this->_get($detail_city);
			$detail=json_decode($data['val'],true);
			return $detail['rajaongkir']['results'][$arr_key];
		}
		public function detail_province($id='',$arr_key='')
		{
			$detail_city='/province?id='.$id;
			$data=$this->_get($detail_city);
			$detail=json_decode($data['val'],true);
			return $detail['rajaongkir']['results'][$arr_key];
		}
		public function cost($destination,$weight)
		{
			$curl = curl_init();
			$config_base=$this->config_base();
			$data_kirim=array(
				"origin"      =>$config_base['city_id'],
				"destination" =>$destination,
				"weight"      =>$weight*1000, #ini gram yang dibutuhkan Kg
				"courier"     =>'jne',
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
			 	return $this->response('9',$err,null);
			} else {
			  	return  $this->response('1000','Success',$response);
			}
		}
	}