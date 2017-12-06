<?php 
	/**
	* 
	*/
	class Cart extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("template");
			$this->load->model('model_produk');
			$this->load->helper('rupiah');
			
		}
		function add_cart()
		{	
			$id   =$this->input->post('id_produk');
			$sc   =$this->session->userdata('cart');
			$cart =($sc==null) ? array():$sc;
			if (in_array($id, $cart)) {
				echo "Item anda sudah dimasukan";
			}else{
				array_push($cart,$id);
				$this->session->unset_userdata('cart');
				$this->session->set_userdata('cart',$cart);
				echo "Success add cart";
			}
			
		}
		function count_cart()
		{
			$sc   =$this->session->userdata('cart');
			echo count($sc);
		}
		function index($not_found='')
		{
			$tpl=null;
			$cart=$this->session->userdata('cart');
			if ($cart!=null) {
				foreach($cart as $c){
				$produk[]=$this->model_produk->get_field("id",$c)->result();
			}
		
				$data['detail_cart'] = call_user_func_array("array_merge", $produk);
				$data['jenis']=$this->jenis_produk();
				if ($not_found==true) {
					$tpl.=$this->load->view('store/etalase_kosong','',true);
				}
				if (detect_device()=="pc") {
						$tpl.=$this->load->view('cart/detail_cart',$data,true);
						echo $this->template->output($tpl);
				}else{
						$tpl.=$this->load->view('cart/detail_cart_mobile',$data,true);
						echo $this->template->output($tpl);
				}
			
			}else{
				redirect("store");
			}
			
		}
		function jenis_produk()
		{
			return $jenis=$this->model_produk->dis_jenis()->result();
		}
		public function remove_item()
		{
			# code...
			$id=$this->input->post('id');
			$s=$this->session->userdata('cart');
			$re=array_values($s);
			for ($i=0; $i < count($re) ; $i++) { 
				if ($re[$i]==$id) {
					$sKey=$i;
				}
			}
		
			 
			unset($re[$sKey]);

			$this->session->unset_userdata('cart');
			$this->session->set_userdata('cart',$re);

		}
		public function remove_item_test($id)
		{
			# code...
			
			$s=$this->session->userdata('cart');
			$re=array_values($s);
			for ($i=0; $i < count($re) ; $i++) { 
				if ($re[$i]==$id) {
					echo $sKey=$i;
				}
			}
		
			 
			echo($re[$sKey]);
		
			// unset($s[$sKey]);
			// $this->session->unset_userdata('cart');
			// $this->session->set_userdata('cart',$s);

		}
		
	}