<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gerai18.com</title>
     <link rel="stylesheet" type="text/css" href="<?=base_url("src/fa/css/font-awesome.css");?>">
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    .text-right{
        text-align: right;;
    }
    .text-center{
        text-align: center;
    }
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" border="1">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <!-- <img src="http://nextstepwebs.com/images/logo.png" style="width:100%; max-width:300px;"> -->
                                <h4> <i class="fa fa-shirtsinbulk"></i> Gerai18.com </h4>
                            </td>
                            
                            <td>
                                Invoice #: <?=$pesanan['id'];?><br>
                                Dibuat: <?=dateindo($pesanan['tanggal_beli']);?><br>
                                Status: <?=($status!=null)? $status : 'Belum Bayar' ;?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                              
                              <?=$all['user'][0]->nama_lengkap;?><br>
                              <?=$this->rajaongkir->detail_province($all['user'][0]->provinsi,'province');?><br>
                              <?=$this->rajaongkir->detail_city($all['user'][0]->kota,'city_name');?><br>
                              <?=$all['user'][0]->alamat;?> (<?=$all['user'][0]->kodepos;?>)<br>
                            </td>
                            
                            <td>
                             <?=$all['user'][0]->email;?><br>
                            <?=$all['user'][0]->no_telp;?>
                              
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td colspan="3">
                    Metode Bayar
                </td>
                
                <td width="25%">
                    Jumlah #
                </td>
            </tr>
            
            <tr class="details">
                <td colspan="3">
                    Transfer
                </td>
                
                <td>
                    <?=rupiah($pesanan['total_harga']+$pesanan['ongkir']);?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                <td class="text-center">Jumlah</td>
                <td class="text-center">Berat (kg)</td>
                <td>
                    Harga
                </td>
            </tr>
            <?php foreach($rincian as $row):?>

            <tr>
                <td>
                  
                    <?=$row['nama_produk'];?>
                </td>
                <td class="text-center">
                    <?=$row['jumlah'];?>
                </td>
                 <td class="text-center">
                    <?=$row['berat'];?>
                </td>
                <td>
                     <?=rupiah($row['harga']);?>
                </td>
            </tr>
               
             <?php endforeach;?>   
           
            
            <tr class="item last">
                <td colspan="3">
                    Ongkos Kirim
                </td>
                
                <td>
                   <?=rupiah($pesanan['ongkir']);?>
                </td>
            </tr>
            
            <tr class="total">
              
                
                 <td colspan="4" class="text-right">
                   <h3> Total: <?=rupiah($pesanan['total_harga']+$pesanan['ongkir']);?></h3>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>