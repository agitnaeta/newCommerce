<?php 
	/**
	* 
	*/
	class Instagram
	{
		
		private static $client_id     ='e1e31fecf2f747bba8d4e36f92000779';
		private static $client_secret ='46d0a2485c7b4626ab722bc0383845dc';
		private static $callback_url  ='http://gerai18.com';
		private static $api_host='https://api.instagram.com/';

		private function _curl_post($url,$data)
		{
			$ch=curl_init($url);
			curl_setopt($ch, CURLOPT_POST,true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, "content-type:application/x-www-form-urlencoded");
			return $respon=curl_exec($ch);
		}
		private function _curl_get($url)
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL            => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING       => "",
				CURLOPT_MAXREDIRS      => 10,
				CURLOPT_TIMEOUT        => 30,
				CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST  => "GET",
			));
			return $response = curl_exec($curl);
		}


		public function auth()
		{
			$client_id    =self::$client_id;
			$callback_url =self::$callback_url;
			$path         ="oauth/authorize/?client_id=$client_id&redirect_uri=$callback_url&response_type=code&scope=public_content+basic+follower_list+comments+relationships+likes";
			return $url   =self::$api_host.$path;
		}
		public function access_token($code)
		{
				$data=array(
					'code'          =>$code,
					'client_id'     =>self::$client_id,
					'client_secret' =>self::$client_secret,
					'grant_type'    =>'authorization_code',
					'redirect_uri'  =>self::$callback_url,
				);
				$url=self::$api_host.'oauth/access_token';
				return $this->_curl_post($url,$data);
		}
		public function data_pribadi($access_token)
		{
			$path='v1/users/self/media/recent/?access_token='.$access_token;
			$url=self::$api_host.$path;
			return $this->_curl_get($url);
		}
	}