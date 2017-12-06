<?php 
	/**
	* 
	*/
	class Import extends ci_controller
	{
		
		function __construct()
		{
				parent::__construct();
                
                $this->load->library('instagram');
                $this->load->library('template');
                $this->load->library('fb');

                $this->load->helper('detect_device');
                $this->load->helper('response');
		}
        public function index()
        {
            echo "string";
        }
        public function auth($value='')
        {
            $url=$this->instagram->auth();
            redirect($url);
        }
        public function grab_token($code='')
        {
            $token        =$this->instagram->access_token($code);
            // print_r($token);
            $response     =json_decode($token);
            // print_r($response);die;
           $access_token =$response->access_token;

            
            if ($access_token!=null) {
                $this->session->set_userdata('ig_token',$access_token);
                // redirect('import/data_pribadi');
                echo json_encode(response('1000','Success',$access_token));
            }else{
                echo json_encode(response('999','Gagal',$access_token));
            }
        }
        public function data_pribadi()
        {
           $token   =$this->session->userdata('ig_token');
            $data_ig =$this->instagram->data_pribadi($token);
           return json_decode($data_ig);
        }
		public function json()
		{
			$json='{
                "pagination": {},
                "data": [
                    {
                        "id": "1597270712161972299_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c212.0.546.546/21433509_1655174837868583_5566752875222138880_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 179,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/21433509_1655174837868583_5566752875222138880_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 359,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/21433509_1655174837868583_5566752875222138880_n.jpg"
                            }
                        },
                        "created_time": "1504629528",
                        "caption": {
                            "id": "17881730713082112",
                            "text": "Sumedang punya potensi\n#jatigede #sumedang #jatigedesumedang #sumedangtandang #inimahsumedang\n@inimahsumedang @tanjungduriat",
                            "created_time": "1504629528",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 156
                        },
                        "tags": [
                            "inimahsumedang",
                            "sumedang",
                            "jatigede",
                            "sumedangtandang",
                            "jatigedesumedang"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BYqpUAAjLBL/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/21440436_348308625624179_4456949565207085056_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/21440436_348308625624179_4456949565207085056_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/21440436_348308625624179_4456949565207085056_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1595735506502427211_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c169.0.640.640/21296224_114656179218384_1538142137906888704_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 209,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/21296224_114656179218384_1538142137906888704_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 418,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/21296224_114656179218384_1538142137906888704_n.jpg"
                            }
                        },
                        "created_time": "1504446517",
                        "caption": {
                            "id": "17883073894122684",
                            "text": "although I do not always exist, it does not mean I do not love you\n@dlinamarlina",
                            "created_time": "1504446517",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 147
                        },
                        "tags": [
                            "f"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 3
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BYlMP0UjiJL/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1594119782403011389_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/21296546_792121664323484_6881346045591158784_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 320,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/21296546_792121664323484_6881346045591158784_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 640,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/21296546_792121664323484_6881346045591158784_n.jpg"
                            }
                        },
                        "created_time": "1504253908",
                        "caption": {
                            "id": "17895810547044343",
                            "text": "Orang gilaa",
                            "created_time": "1504253908",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 39
                        },
                        "tags": [],
                        "filter": "Clarendon",
                        "comments": {
                            "count": 6
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BYfc37_jfM9/",
                        "location": {
                            "latitude": -6.85638889,
                            "longitude": 108.09472222,
                            "name": "Jatigede Dam",
                            "id": 303497730
                        },
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1591289283460497172_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c227.0.585.585/21042569_1889359821314278_1946190092888440832_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/21042569_1889359821314278_1946190092888440832_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/21042569_1889359821314278_1946190092888440832_n.jpg"
                            }
                        },
                        "created_time": "1503916486",
                        "caption": {
                            "id": "17880600544090226",
                            "text": "Namun bila kau ingin sendiri cepat cepatlah sampaikan kepadaku",
                            "created_time": "1503916486",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 32
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BYVZSwbjH8U/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1584817250526654673_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c0.1.643.643/20968969_270296820122157_9115797043258851328_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 321,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/e35/p320x320/20968969_270296820122157_9115797043258851328_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 642,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/sh0.08/e35/p640x640/20968969_270296820122157_9115797043258851328_n.jpg"
                            }
                        },
                        "created_time": "1503144960",
                        "caption": {
                            "id": "17894724847041194",
                            "text": "Adek sini adek :v",
                            "created_time": "1503144960",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": false,
                        "likes": {
                            "count": 27
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BX-ZuSDjXDR/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1581250154534448658_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c212.0.547.547/20759728_333242637135497_3969258077445685248_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/20759728_333242637135497_3969258077445685248_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/20759728_333242637135497_3969258077445685248_n.jpg"
                            }
                        },
                        "created_time": "1502719729",
                        "caption": {
                            "id": "17867651923163427",
                            "text": "you - no grading",
                            "created_time": "1502719729",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 21
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BXxuqNCDq4S/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20865893_495113824161812_4880680296917237760_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20865893_495113824161812_4880680296917237760_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20865893_495113824161812_4880680296917237760_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1571809028794536428_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.608.608/20184631_336277713466850_3610808864359841792_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/20184631_336277713466850_3610808864359841792_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/20184631_336277713466850_3610808864359841792_n.jpg"
                            }
                        },
                        "created_time": "1501594259",
                        "caption": {
                            "id": "17905213225001763",
                            "text": "Bekraft 2017 , see u on youtube",
                            "created_time": "1501594259",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 32
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BXQL_vgDNHs/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20548606_1918069861790702_8670232329903407104_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20548606_1918069861790702_8670232329903407104_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20548606_1918069861790702_8670232329903407104_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1570247730722039401_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c160.0.640.640/20398087_1271995672929215_854302427199832064_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 213,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/20398087_1271995672929215_854302427199832064_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 426,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/20398087_1271995672929215_854302427199832064_n.jpg"
                            }
                        },
                        "created_time": "1501408138",
                        "caption": {
                            "id": "17882550745072694",
                            "text": "@kaskus_id Just walking around and meet u @nixia just watch the video on my \nyoutube.com/agitnaeta  and follow @nixia\n\n#kaskus #kaskusBattleGround #msiGamming #msi 😜",
                            "created_time": "1501408138",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 140
                        },
                        "tags": [
                            "msigamming",
                            "kaskus",
                            "msi",
                            "kaskusbattleground"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 3
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BXKo_3XDOZp/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1566722892309087447_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.608.608/20347518_1807281535954718_7219312748620939264_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/20347518_1807281535954718_7219312748620939264_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/20347518_1807281535954718_7219312748620939264_n.jpg"
                            }
                        },
                        "created_time": "1500987944",
                        "caption": {
                            "id": "17849855104194347",
                            "text": "Cara cari Temen ?\npastinya buat kite yang merantau nyari temen susah ya, mana ada waktu juga buat keluyuran. So mending lu coba yogrt.co \naplikasinya tersedia buat android & ios \n@yogrt_id #yogrtapp #yogrt #yogrtid #yogrtpestainsekampung",
                            "created_time": "1500987944",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 148
                        },
                        "tags": [
                            "yogrtid",
                            "yogrtapp",
                            "yogrtpestainsekampung",
                            "yogrt"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BW-HitxjkTX/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20449949_1820031981644055_162611932887515136_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20449949_1820031981644055_162611932887515136_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20449949_1820031981644055_162611932887515136_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1557794158809998358_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c8.0.1090.1090/19985478_115405139086126_6582769020208939008_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 315,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19985478_115405139086126_6582769020208939008_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 630,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19985478_115405139086126_6582769020208939008_n.jpg"
                            }
                        },
                        "created_time": "1499923556",
                        "caption": {
                            "id": "17863189906165249",
                            "text": "special thanks untuk @asep_rohendra programmer dari Tahukos.com \nYang punya info kosan silahkan masukin sini ya,, semoga hidupnya semakin bermanfaat",
                            "created_time": "1499923556",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 121
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BWeZYitDGQW/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1557021106908287684_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/19985267_467925936917655_3430393252648321024_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 320,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19985267_467925936917655_3430393252648321024_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 640,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19985267_467925936917655_3430393252648321024_n.jpg"
                            }
                        },
                        "created_time": "1499831401",
                        "caption": {
                            "id": "17876561758107869",
                            "text": "Dulu pecandu sekarang pemilik 🤣",
                            "created_time": "1499831401",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 48
                        },
                        "tags": [],
                        "filter": "Rise",
                        "comments": {
                            "count": 11
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BWbpnKBDdLE/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1556653251004183739_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c180.0.719.719/19932857_1460672390906143_8884278708068679680_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 213,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19932857_1460672390906143_8884278708068679680_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 426,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19932857_1460672390906143_8884278708068679680_n.jpg"
                            }
                        },
                        "created_time": "1499787549",
                        "caption": {
                            "id": "17876394484096488",
                            "text": "bang tamvan deh! \"Aduh sorry gua gak bawa recehan adanya buat parkir\"...",
                            "created_time": "1499787549",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 37
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 1
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BWaV-Jgj7S7/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1555857299292897551_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.607.607/19932560_151761115395377_876367417956106240_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 179,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/19932560_151761115395377_876367417956106240_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 359,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19932560_151761115395377_876367417956106240_n.jpg"
                            }
                        },
                        "created_time": "1499692665",
                        "caption": {
                            "id": "17887937758013911",
                            "text": "mau nyobain tukeran nama jadi gua? check this out 😳😂",
                            "created_time": "1499692665",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 26
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 9
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BWXg_htjUEP/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20021657_1775400052476625_4447360346344128512_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20021657_1775400052476625_4447360346344128512_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/20021657_1775400052476625_4447360346344128512_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1554593803557209891_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.607.607/19931558_348551775575589_9137204560421453824_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 179,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/19931558_348551775575589_9137204560421453824_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 359,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19931558_348551775575589_9137204560421453824_n.jpg"
                            }
                        },
                        "created_time": "1499542044",
                        "caption": {
                            "id": "17847380263194133",
                            "text": "DEEP WEB [Do you think you save on the internet ? ] 💀\n\nTahukah anda ? Sekalipun anda menghapus data dari device anda. Itu tidak akan terhapus. Bisa jadi orang lain mengirim virus untuk mengirim foto anda ke komputernya dia! Pikir kembali jika anda ingin memotert hal sensitif seperti rumah,kunci,foto syur, sidik jari, dokumen dll. Karena bisa jadi diluar sana ada orang selalu mengawasi anda !\n#deepweb #developers #developer #programmer #coding #programming #c #web #hackerindonesia #hacker #hackers #indovidgram @indovidgram #IVGselasArt",
                            "created_time": "1499542044",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 56
                        },
                        "tags": [
                            "hackers",
                            "programmer",
                            "indovidgram",
                            "coding",
                            "developer",
                            "hacker",
                            "programming",
                            "hackerindonesia",
                            "deepweb",
                            "ivgselasart",
                            "developers",
                            "web",
                            "c"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 2
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BWTBtPnDQcj/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19950938_321098028316304_3381476551559217152_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19950938_321098028316304_3381476551559217152_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19950938_321098028316304_3381476551559217152_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1554519805188130496_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.608.608/19955650_439280306443001_871619713862467584_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/19955650_439280306443001_871619713862467584_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19955650_439280306443001_871619713862467584_n.jpg"
                            }
                        },
                        "created_time": "1499533223",
                        "caption": {
                            "id": "17907270502030046",
                            "text": "Your life just a mirror of your soul. #gagalHidup #episode2 youtube.com/agitnaeta",
                            "created_time": "1499533223",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 30
                        },
                        "tags": [
                            "episode2",
                            "gagalhidup"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 5
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BWSw4bQjEbA/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19958093_821892757973106_6278501768749907968_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19958093_821892757973106_6278501768749907968_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19958093_821892757973106_6278501768749907968_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1553728087073332540_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c236.0.607.607/19762057_910699352402163_5846154649744179200_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 179,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/19762057_910699352402163_5846154649744179200_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 359,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19762057_910699352402163_5846154649744179200_n.jpg"
                            }
                        },
                        "created_time": "1499438843",
                        "caption": {
                            "id": "17878716331072705",
                            "text": "#ndeso #kaesang parody lv Asyudah lah 😂😂😂😂 #indovidgram #IVGComedy @indovidgram",
                            "created_time": "1499438843",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 169
                        },
                        "tags": [
                            "ivgcomedy",
                            "ndeso",
                            "indovidgram",
                            "kaesang"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 5
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BWP83aTjZ08/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19952417_1996237097277791_1279318492297822208_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19952417_1996237097277791_1279318492297822208_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 269,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19952417_1996237097277791_1279318492297822208_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1551538883539141815_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/c235.0.609.609/19625034_1690012687973436_4654251858750078976_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 180,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e15/19625034_1690012687973436_4654251858750078976_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 360,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19625034_1690012687973436_4654251858750078976_n.jpg"
                            }
                        },
                        "created_time": "1499177869",
                        "caption": {
                            "id": "17887554388015371",
                            "text": "#flyinMoney cobain ngeRap kalo ada headset selalu berasa BISA , padahal wtf",
                            "created_time": "1499177869",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 44
                        },
                        "tags": [
                            "flyinmoney"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "video",
                        "link": "https://www.instagram.com/p/BWILGTojoS3/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [],
                        "videos": {
                            "standard_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19719856_1218344554960445_4039863495796195328_n.mp4"
                            },
                            "low_bandwidth": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19719856_1218344554960445_4039863495796195328_n.mp4"
                            },
                            "low_resolution": {
                                "width": 480,
                                "height": 270,
                                "url": "https://scontent.cdninstagram.com/t50.2886-16/19719856_1218344554960445_4039863495796195328_n.mp4"
                            }
                        }
                    },
                    {
                        "id": "1551340370754713572_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c213.0.547.547/19623442_1877529389235951_6068353618866601984_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 179,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19623442_1877529389235951_6068353618866601984_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 359,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19623442_1877529389235951_6068353618866601984_n.jpg"
                            }
                        },
                        "created_time": "1499154205",
                        "caption": {
                            "id": "17887394578033359",
                            "text": "debat masalah bagaimana seharusnya menjalani kuliah, harus idealis atau haru cum laude ?\nKalo kalian yang mana ? #mahasiswa #beasiswa #beasiswa2017 #skripsi \nhttps://youtu.be/dAlbIylJkyo #kuliah",
                            "created_time": "1499154205",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 115
                        },
                        "tags": [
                            "mahasiswa",
                            "skripsi",
                            "beasiswa",
                            "beasiswa2017",
                            "kuliah"
                        ],
                        "filter": "Normal",
                        "comments": {
                            "count": 2
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BWHd9kMjrfk/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": [
                            {
                                "user": {
                                    "id": "318122326",
                                    "full_name": "Doni Saputra",
                                    "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/19050629_453526758341040_9014069351283687424_a.jpg",
                                    "username": "doni_s"
                                },
                                "position": {
                                    "x": 0.8611016,
                                    "y": 0.4768022
                                }
                            },
                            {
                                "user": {
                                    "id": "4042526763",
                                    "full_name": "mul hatten",
                                    "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/14718519_1863862657233777_8873657241060769792_a.jpg",
                                    "username": "hattenmul"
                                },
                                "position": {
                                    "x": 0.4374791,
                                    "y": 0.5484223
                                }
                            }
                        ]
                    },
                    {
                        "id": "1550116882253393489_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c160.0.640.640/19762002_121962451740765_4196157690705084416_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 213,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19762002_121962451740765_4196157690705084416_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 426,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19762002_121962451740765_4196157690705084416_n.jpg"
                            }
                        },
                        "created_time": "1499008353",
                        "caption": {
                            "id": "17861977768180685",
                            "text": "no caption needed, your mind has been describing it.",
                            "created_time": "1499008353",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 133
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BWDHxdvDK5R/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    },
                    {
                        "id": "1547117526395059421_1808902243",
                        "user": {
                            "id": "1808902243",
                            "full_name": "Agit Naeta",
                            "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                            "username": "agitnaeta"
                        },
                        "images": {
                            "thumbnail": {
                                "width": 150,
                                "height": 150,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c160.0.640.640/19534148_443960965969910_317824070915719168_n.jpg"
                            },
                            "low_resolution": {
                                "width": 320,
                                "height": 213,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/19534148_443960965969910_317824070915719168_n.jpg"
                            },
                            "standard_resolution": {
                                "width": 640,
                                "height": 426,
                                "url": "https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/19534148_443960965969910_317824070915719168_n.jpg"
                            }
                        },
                        "created_time": "1498650802",
                        "caption": {
                            "id": "17874110092110895",
                            "text": "the caption was written in photo",
                            "created_time": "1498650802",
                            "from": {
                                "id": "1808902243",
                                "full_name": "Agit Naeta",
                                "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/18382281_1532091470176921_9069548869775261696_a.jpg",
                                "username": "agitnaeta"
                            }
                        },
                        "user_has_liked": true,
                        "likes": {
                            "count": 24
                        },
                        "tags": [],
                        "filter": "Normal",
                        "comments": {
                            "count": 0
                        },
                        "type": "image",
                        "link": "https://www.instagram.com/p/BV4dzF6jvzd/",
                        "location": null,
                        "attribution": null,
                        "users_in_photo": []
                    }
                ],
                "meta": {
                    "code": 200
                }
            }';
            return json_decode($json);
		}
		public function instagram()
		{
	      
			foreach($this->data_pribadi()->data as $row){
				$arr=(array)$row;
				$keys=array_keys($arr);
				if (in_array("videos", $keys)) {
						echo '<video width="400" controls>
								  <source src="'.$row->videos->low_bandwidth->url.'" type="video/mp4">
								  <source src="'.$row->videos->low_bandwidth->url.'" type="video/ogg">				  
								</video>';
				}else{
					echo "<img src=".$row->images->low_resolution->url.">";
				}
			}
			
		}
        public function detect()
        {
          // $tpl=$this->load->view('')
        }
        public function fb($value='')
        {
            echo "string";
           // $this->fb->fb();
        }
	}