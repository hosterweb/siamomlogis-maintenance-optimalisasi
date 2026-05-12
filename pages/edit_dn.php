<script charset="utf-8" type="text/javascript">
function terbilang(){
    var bilangan=document.getElementById("nominal").value;
    var kalimat="";
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan = bilangan.length;
     
    /* pengujian panjang bilangan */
    if(panjang_bilangan > 15){
        kalimat = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for(i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
         
        var i = 1;
        var j = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(i <= panjang_bilangan){
            subkalimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
             
            /* untuk Ratusan */
            if(angka[i+2] != "0"){
                if(angka[i+2] == "1"){
                    kata1 = "Seratus";
                }else{
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka[i+1] != "0"){
                if(angka[i+1] == "1"){
                    if(angka[i] == "0"){
                        kata2 = "Sepuluh";
                    }else if(angka[i] == "1"){
                        kata2 = "Sebelas";
                    }else{
                        kata2 = kata[angka[i]] + " Belas";
                    }
                }else{
                    kata2 = kata[angka[i+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka[i] != "0"){
                if (angka[i+1] != "1"){
                    kata3 = kata[angka[i]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat = subkalimat + kalimat;
            i = i + 3;
            j = j + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")){
            kalimat = kalimat.replace("Satu Ribu","Seribu");
        }
    }
    document.getElementById("terbilang").value=kalimat;
}
</script>
  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                   
                    <div class="row">
							<div class="col-sm-12">
								<div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Edit Debit Note</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											
											if (isset($_POST['submit'])){
													$tgl=$_POST['tgl'];
                                                    $dn_number=str_replace("'","`",$_POST['dn_number']);
                                                    $invoice_number=str_replace("'","`",$_POST['invoice_number']);
                                                    $shipment=str_replace("'","`",$_POST['shipment']);
                                                    $job_number=str_replace("'","`",$_POST['job_number']);
                                                    $tgl=str_replace("'","`",$_POST['tgl']);
                                                    $co_number=str_replace("'","`",$_POST['co_number']);
                                                    $marketing=str_replace("'","`",$_POST['marketing']);
                                                    $customer=str_replace("'","`",$_POST['customer']);
                                                    $master_bl=str_replace("'","`",$_POST['master_bl']);
                                                    $house_bl=str_replace("'","`",$_POST['house_bl']);
                                                    $poi=str_replace("'","`",$_POST['poi']);
                                                    $pod=str_replace("'","`",$_POST['pod']);
                                                    $vessel_boy=str_replace("'","`",$_POST['vessel_boy']);
                                                    $eta_etd=str_replace("'","`",$_POST['eta_etd']);
                                                    $agent=str_replace("'","`",$_POST['agent']);
                                                    $container=str_replace("'","`",$_POST['container']);
                                                    $kondition=str_replace("'","`",$_POST['kondition']);
                                                    $remark=str_replace("'","`",$_POST['remark']);
                                                    $credit_terms=str_replace("'","`",$_POST['credit_terms']);
                                                    $currency=str_replace("'","`",$_POST['currency']);
                                                    $description1=str_replace("'","`",$_POST['description1']);
                                                    $qty1=str_replace("'","`",$_POST['qty1']);
                                                    $unit_price1=str_replace("'","`",$_POST['unit_price1']);
                                                    $amount1=str_replace("'","`",$_POST['amount1']);
                                                    $description2=str_replace("'","`",$_POST['description2']);
                                                    $qty2=str_replace("'","`",$_POST['qty2']);
                                                    $unit_price2=str_replace("'","`",$_POST['unit_price2']);
                                                    $amount2=str_replace("'","`",$_POST['amount2']);
                                                    $description3=str_replace("'","`",$_POST['description3']);
                                                    $qty3=str_replace("'","`",$_POST['qty3']);
                                                    $unit_price3=str_replace("'","`",$_POST['unit_price3']);
                                                    $amount3=str_replace("'","`",$_POST['amount3']);
                                                    $description4=str_replace("'","`",$_POST['description4']);
                                                    $qty4=str_replace("'","`",$_POST['qty4']);
                                                    $unit_price4=str_replace("'","`",$_POST['unit_price4']);
                                                    $amount4=str_replace("'","`",$_POST['amount4']);
                                                    $description5=str_replace("'","`",$_POST['description5']);
                                                    $qty5=str_replace("'","`",$_POST['qty5']);
                                                    $unit_price5=str_replace("'","`",$_POST['unit_price5']);
                                                    $amount5=str_replace("'","`",$_POST['amount5']);
                                                    $description6=str_replace("'","`",$_POST['description6']);
                                                    $qty6=str_replace("'","`",$_POST['qty6']);
                                                    $unit_price6=str_replace("'","`",$_POST['unit_price6']);
                                                    $amount6=str_replace("'","`",$_POST['amount6']);
                                                    $description7=str_replace("'","`",$_POST['description7']);
                                                    $qty7=str_replace("'","`",$_POST['qty7']);
                                                    $unit_price7=str_replace("'","`",$_POST['unit_price7']);
                                                    $amount7=str_replace("'","`",$_POST['amount7']);
                                                    $description8=str_replace("'","`",$_POST['description8']);
                                                    $qty8=str_replace("'","`",$_POST['qty8']);
                                                    $unit_price8=str_replace("'","`",$_POST['unit_price8']);
                                                    $amount8=str_replace("'","`",$_POST['amount8']);
                                                    $description9=str_replace("'","`",$_POST['description9']);
                                                    $qty9=str_replace("'","`",$_POST['qty9']);
                                                    $unit_price9=str_replace("'","`",$_POST['unit_price9']);
                                                    $amount9=str_replace("'","`",$_POST['amount9']);
                                                    $description10=str_replace("'","`",$_POST['description10']);
                                                    $qty10=str_replace("'","`",$_POST['qty10']);
                                                    $unit_price10=str_replace("'","`",$_POST['unit_price10']);
                                                    $amount10=str_replace("'","`",$_POST['amount10']);
													$container=str_replace("'","`",$_POST['container']);	
													$remark=str_replace("'","`",$_POST['remark']);
													$total_amount=str_replace("'","`",$_POST['total_amount']);
									
													$id=$_POST['id'];
												
$insert=mysqli_query($koneksi,"UPDATE dn SET shipment='$shipment', tgl='$tgl', dn_number='$dn_number', invoice_number='$invoice_number', job_number='$job_number', co_nu='$co_number', marketing='$marketing', customer='$customer', master_bl='$master_bl', house_bl='$house_bl', poi='$poi', pod='$pod', vessel_boy='$vessel_boy', eta_etd='$eta_etd', agent='$agent', container='$container', kondition='$kondition', remark='$remark', credit_terms='$credit_terms', currency='$currency', description1='$description1', qty1='$qty1', unit_price1='$unit_price1', amount1='$amount1', description2='$description2', qty2='$qty2', unit_price2='$unit_price2', amount2='$amount2', description3='$description3', qty3='$qty3', unit_price3='$unit_price3', amount3='$amount3', description4='$description4', qty4='$qty4', unit_price4='$unit_price4', amount4='$amount4', description5='$description5', qty5='$qty5', unit_price5='$unit_price5', amount5='$amount5', description6='$description6', qty6='$qty6', unit_price6='$unit_price6', amount6='$amount6', description7='$description7', qty7='$qty7', unit_price7='$unit_price7', amount7='$amount7', description8='$description8', qty8='$qty8', unit_price8='$unit_price8', amount8='$amount8', description9='$description9',qty9='$qty9', unit_price9='$unit_price9', amount9='$amount9', description10='$description10', qty10='$qty10',unit_price10='$unit_price10', amount10='$amount10', total_amount='$total_amount' WHERE id='$id'");
                                                
                                            if($insert){ ?>
												<div class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Simpan.
											</div>
											<?php	}
											else { ?>
												<div class="alert alert-danger alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Maaf!</strong> Data Gagal TerSimpan.
											</div>
                                                <?php
												}
												}
											?>
                                                                                              
                    <?php 
											$id_edit=$_GET['edit'];
                                            $ex=mysqli_query($koneksi,"SELECT * FROM dn WHERE id='$id_edit'");
                                            $data=mysqli_fetch_array($ex);
                    ?>
	        <form class="form-horizontal" name="autoSumForm" id="autoSumForm" method="post">                           
                                    <div class="form-group">    
                                    <label class="col-lg-4 control-label">DN Number</label>
                                    <div class="col-lg-8">
   <input class="form-control" readonly type="text" value="<?php echo $data['dn_number'];?>" name="dn_number" id="dn_number"  size="50" maxlength="50" />
                                    </div></div>
    <input type="text" value="<?php echo $data['id'];?>" class="form-control" name="id" id="id" style="display:none">                                        
            <div class="form-group">    
            <label class="col-lg-4 control-label">Tanggal</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" name="tgl" id="datepicker-autoclose"  size="50" maxlength="50"  value="<?php echo $data['tgl'];?>" />
            </div></div>

            <div class="form-group">    
            <label class="col-lg-4 control-label">Job Number</label>
                                     <div class="col-lg-8">
                                     <select class="form-control select2" name="job_number" onchange="cek_database()" id="job_number">
                                     <option  value="<?php echo $data['job_number'];?>"><?php echo $data['job_number'];?></option>
                                     <?php 
                                        $cariin=mysqli_query($koneksi,"SELECT job_number FROM create_job_only order by id DESC"); 
                                        while($hasil=mysqli_fetch_array($cariin)){
                                           ?>
                                           <option value="<?php echo $hasil['job_number'];?>"><?php echo $hasil['job_number'];?></option>
                                           <?php
                                        }          
                                                   ?>
                                                    </select>
                                                </div></div>

                                                <div class="form-group">     
                                                <label class="col-lg-4 control-label">Shipment</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control" name="shipment" value="<?php echo $data['shipment'];?>" id="shipment" readonly>
                                            </div></div>

                                                <div class="form-group">     
                                                <label class="col-lg-4 control-label">Marketing</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control" value="<?php echo $data['marketing'];?>" name="marketing" id="marketing" readonly>
                                            </div></div>

                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">Customer Name</label>
                                       <div class="col-lg-8">
                                    <input type="text" class="form-control" name="customer" id="customer"value="<?php echo $data['customer'];?>" readonly>
                                    </div></div>
                                    
                                    <div class="form-group">    
                                    <label class="col-lg-4 control-label">Master BL</label>
                                    <div class="col-lg-8">
                                    <input class="form-control" readonly value="<?php echo $data['master_bl'];?>" type="text" name="master_bl" id="master_bl"  size="50" maxlength="50" />
                                    </div></div>
                                    
                                    <div class="form-group">    
                                    <label class="col-lg-4 control-label">House BL</label>
                                    <div class="col-lg-8">
                                    <input class="form-control" readonly value="<?php echo $data['shipment'];?>" type="text" name="house_bl" id="house_bl"  size="50" maxlength="50" />
                                    </div></div>
                                    
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">P.O.L</label>
                                       <div class="col-lg-8">
                                      <input class="form-control" readonly type="text" value="<?php echo $data['poi'];?>" name="poi" id="poi"  size="50" maxlength="50" />
                                    </div></div>
                                    
                                    <div class="form-group">    
                                            <label class="col-lg-4 control-label">P.O.D</label>
                                           <div class="col-lg-8">
                                           <input class="form-control" readonly type="text" name="pod" id="pod" value="<?php echo $data['pod'];?>"  size="50" maxlength="50"/>
                                        </div></div>
                                <div class="form-group">    
                                    <label class="col-lg-4 control-label">Vessel &amp; Voy</label>
                                   <div class="col-lg-8">
                                   <input class="form-control" readonly type="text" name="vessel_boy" id="vessel_boy" value="<?php echo $data['vessel_boy'];?>" size="50" maxlength="50" />
                                </div></div>
                            
                                <div class="form-group">    
                                <label class="col-lg-4 control-label">ETA / ETD</label>
                               <div class="col-lg-8">
                               <input class="form-control" type="text" readonly name="eta_etd" id="eta_etd" value="<?php echo $data['eta_etd'];?>" size="50" maxlength="50" />
                            </div></div>
                            
                            <div class="form-group">    
                                    <label class="col-lg-4 control-label">Agent</label>
                                   <div class="col-lg-8">
                                   <input type="text" class="form-control" name="agent" id="agent" value="<?php echo $data['agent'];?>"  readonly>
                                </div></div>
                            
                                <div class="form-group">    
                                            <label class="col-lg-4 control-label">Container Number</label>
                                           <div class="col-lg-8">
                                            <input class="form-control" readonly value="<?php echo $data['container'];?>" type="text" name="container" id="container"  size="50" maxlength="50" />
                                        </div></div>

                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">Remark</label>
                                           <div class="col-lg-8">
                                          <input class="form-control" readonly value="<?php echo $data['remark'];?>" type="text" name="remark" id="remark"  size="50" maxlength="50" />
                                        </div></div>

                                        <div class="form-group" style="display:none">     
                                        <label class="col-lg-4 control-label">Currency</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control select2" name="currency" id="currency" value="<?php echo $data['currency'];?>" readonly >
                                       </div></div>


                                        <br><br>
<div style="clear:both"></div>
<table id="datatable-buttons" class="table table-striped table-bordered" border="0">
<tr>
<td style="text-align:center">No</td><td style="text-align:center">Description</td>
<td style="text-align:center">Qty</td><td style="text-align:center">Unit Price</td>
<td style="text-align:center">Amount</td></tr>
<tr>
<td>1</td>
<td><input class="form-control" type="text"  value="<?php echo $data['description1'];?>" name="description1" id="description1" size="100"/></td>
<td><input class="form-control"  value="<?php echo $data['qty1'];?>" type="text" name="qty1" id="qty1" size="50 "onkeyup="formatNumber(this); terbilang();" onchange="formatNumber(this); terbilang();" onclick="formatNumber(this); terbilang();" onkeypress="formatNumber(this); terbilang();"  onFocus="startCalc(); startCalc2(); terbilang();" onBlur="stopCalc(); stopCalc2(); terbilang();"></td>
<td><input class="form-control" type="text"   value="<?php echo $data['unit_price1'];?>"  name="unit_price1" id="unit_price1" size="50" onkeyup="formatNumber(this); terbilang();" onchange="formatNumber(this); terbilang();" onclick="formatNumber(this); terbilang();" onkeypress="formatNumber(this); terbilang();"  onFocus="startCalc(); startCalc2(); terbilang();" onBlur="stopCalc(); stopCalc2(); terbilang();"></td>
<td><input class="form-control" type="text" name="amount1" id="amount1" value="<?php echo $data['amount1'];?>"  size="50" onkeyup="formatNumber(this); inputTerbilang();" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="formatNumber(this);" onBlur="formatNumber(this);"></td>
</tr>

<tr>
<td>2</td>
<td><input class="form-control" type="text" name="description2"  value="<?php echo $data['description2'];?>"  id="description2" size="100"/></td>
<td><input class="form-control" type="text" name="qty2"  value="<?php echo $data['qty2'];?>"  id="qty2 "size="50"onkeyup="formatNumber(this); inputTerbilang();" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2(); inputTerbilang();" onBlur="stopCalc(); stopCalc2(); "></td>
<td><input class="form-control" type="text"  value="<?php echo $data['unit_price2'];?>"  name="unit_price2" id="unit_price2" size="50" onkeyup="formatNumber(this); inputTerbilang();" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="amount2" id="amount2"  value="<?php echo $data['amount2'];?>"  size="50" onkeyup="formatNumber(this); inputTerbilang();" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"></td>
</tr>

<tr>
<td>3</td>
<td><input class="form-control" type="text" name="description3" id="description3"  value="<?php echo $data['description3'];?>"  size="100"/></td>
<td><input class="form-control" type="text" name="qty3" id="qty3 "size="50"onkeyup="formatNumber(this);"  value="<?php echo $data['qty3'];?>"  onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="unit_price3" id="unit_price3" size="50"  value="<?php echo $data['unit_price3'];?>"  onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="amount3" id="amount3" size="50" onkeyup="formatNumber(this);"  value="<?php echo $data['amount3'];?>"  onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"></td>
</tr>

<tr>
<td>4</td>
<td><input class="form-control" type="text" name="description4" id="description4"  value="<?php echo $data['description4'];?>"  size="100"/></td>
<td><input class="form-control" type="text" name="qty4" id="qty4 "size="50"onkeyup="formatNumber(this);"  value="<?php echo $data['qty4'];?>"  onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="unit_price4" id="unit_price4" size="50"  value="<?php echo $data['unit_price4'];?>"  onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="amount4" id="amount4" size="50"  value="<?php echo $data['amount4'];?>"  onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"></td>
</tr>

<tr>
<td>5</td>
<td><input class="form-control" type="text" name="description5" id="description5"  value="<?php echo $data['description5'];?>"  size="100"/></td>
<td><input class="form-control" type="text" name="qty5" id="qty5 "size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty5'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price5" id="unit_price5"  value="<?php echo $data['unit_price5'];?>"  size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"></td>
<td><input class="form-control" type="text" name="amount5" id="amount5" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount5'];?>" ></td>
</tr>

<tr>
<td>6</td>
<td><input class="form-control" type="text" name="description6" id="description6"  value="<?php echo $data['description6'];?>"  size="100"/></td>
<td><input class="form-control" type="text" name="qty6" id="qty6" size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty6'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price6" id="unit_price6" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['unit_price6'];?>" ></td>
<td><input class="form-control" type="text" name="amount6" id="amount6" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount6'];?>" ></td>
</tr>

<tr>
<td>7</td>
<td><input class="form-control" type="text" name="description7" id="description7" size="100"  value="<?php echo $data['description7'];?>" /></td>
<td><input class="form-control" type="text" name="qty7" id="qty7" size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty7'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price7" id="unit_price7" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['unit_price7'];?>" ></td>
<td><input class="form-control" type="text" name="amount7" id="amount7" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount7'];?>" ></td>
</tr>

<tr>
<td>8</td>
<td><input class="form-control" type="text" name="description8" id="description8" size="100"  value="<?php echo $data['description8'];?>" /></td>
<td><input class="form-control" type="text" name="qty8" id="qty8" size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty8'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price8" id="unit_price8" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['unit_price8'];?>" ></td>
<td><input class="form-control" type="text" name="amount8" id="amount8" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount8'];?>" ></td>
</tr>

<tr>
<td>9</td>
<td><input class="form-control" type="text" name="description9" id="description9" size="100"  value="<?php echo $data['description9'];?>" /></td>
<td><input class="form-control" type="text" name="qty9" id="qty9" size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty9'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price9" id="unit_price9" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['unit_price9'];?>" ></td>
<td><input class="form-control" type="text" name="amount9" id="amount9" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount9'];?>" ></td>
</tr>

<tr>
<td>10</td>
<td><input class="form-control" type="text" name="description10" id="description10" size="100"  value="<?php echo $data['description10'];?>" /></td>
<td><input class="form-control" type="text" name="qty10" id="qty10" size="50"onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['qty10'];?>" ></td>
<td><input class="form-control" type="text" name="unit_price10" id="unit_price10" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" onFocus="startCalc(); startCalc2();" onBlur="stopCalc(); stopCalc2();"  value="<?php echo $data['unit_price10'];?>" ></td>
<td><input class="form-control" type="text" name="amount10" id="amount10" size="50" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);"  value="<?php echo $data['amount10'];?>" ></td>
</tr>

<tr>
<td style="text-align:center" colspan="4">Total</td>
<td><input class="form-control mata-uang"  type="text" name="total_amount" id="nominal"  value="<?php echo $data['total_amount'];?>"  size="20" onkeyup="terbilang(); formatNumber(this);" onchange="formatNumber(this); terbilang();" onclick="formatNumber(this); terbilang();" onkeypress="formatNumber(this); inputTerbilang();" /></td>
</tr>

<tr>
<td style="text-align:center" colspan="2">Say in Word</td>
<td  colspan="3"><input class="form-control" type="text" name="terbilang" id="terbilang" /></td>
</tr>
</table>                                        


<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
</div></div>                                
                                                </form>                                                
											</div>

										</div><!-- end col -->

									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div>
                        <!-- end row -->
                        </div> <!-- container -->

                </div> <!-- content -->
                <footer class="footer text-right">
                    Copryright PT. Surabaya Transmoda Jaya Developed By Hosterweb PT. MULTI OKTO MANUNGGAL Development Hosterweb Indonesia
                </footer>

</div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper --> 
    
        <script type="text/javascript">
    function cek_database(){
        var job_number = $("#job_number").val();
        $.ajax({
            url: 'ajax_cek.php',
            data:"job_number="+job_number,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#customer').val(obj.customer);
            $('#alamat').val(obj.alamat);
            $('#shipment').val(obj.shipment);
            $('#marketing').val(obj.marketing);
            $('#co_nu').val(obj.co_nu);
            $('#master_bl').val(obj.master_bl);
            $('#house_bl').val(obj.house_bl);
            $('#agent').val(obj.agent);
            $('#eta_etd').val(obj.eta_etd);
            $('#poi').val(obj.poi);
            $('#pod').val(obj.pod);
            $('#vessel_boy').val(obj.vessel_boy);
            $('#container').val(obj.container);
            $('#kondition').val(obj.kondition);
            $('#remark').val(obj.remark);
            $('#currency').val(obj.currency);

        });
    }


function to_rupiah(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}


function formatNumber(input)
{
    var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
    if(num.indexOf('.') > -1){
    num = num.split('.');
    num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
    if(num[1].length > 3){
    alert('You may only enter three decimals!');
    num[1] = num[1].substring(0,num[1].length-1);
    } input.value = num[0]+'.'+num[1];
    } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    }
    else{ alert('Anda hanya diperbolehkan memasukkan angka!');
    input.value = input.value.substring(0,input.value.length-1);
    }
}


function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.unit_price1.value;
two = document.autoSumForm.qty1.value;
three = document.autoSumForm.unit_price2.value;
four = document.autoSumForm.qty2.value;
five = document.autoSumForm. unit_price3.value;
six = document.autoSumForm. qty3.value;
seven = document.autoSumForm. unit_price4.value;
eight = document.autoSumForm. qty4.value;
nine = document.autoSumForm. unit_price5.value;
ten = document.autoSumForm. qty5.value;
eleven = document.autoSumForm. qty6.value;
twelve = document.autoSumForm. unit_price6.value;
thirteen = document.autoSumForm. qty7.value;
fourteen = document.autoSumForm. unit_price7.value;
fiveteen = document.autoSumForm. qty8.value;
sixteen = document.autoSumForm. unit_price8.value;
seventeen = document.autoSumForm. qty9.value;
eightteen = document.autoSumForm. unit_price9.value;
nineteen = document.autoSumForm. qty10.value;
twenty = document.autoSumForm. unit_price10.value;

oneone = one.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
twotwo = two.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
threethree = three.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
fourfour = four.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
fivefive = five.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
sixsix = six.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
sevenseven = seven.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
eighteight = eight.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:',"<>\{\}\[\]\\\/]/gi, '');
ninenine = nine.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
tenten = ten.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
eleveneleven = eleven.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:,'"<>\{\}\[\]\\\/]/gi, '');
twelvetwelve = twelve.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
thirteenthirteen = thirteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:',"<>\{\}\[\]\\\/]/gi, '');
fourteenfourteen = fourteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
fiveteenfiveteen = fiveteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
sixteensixteen = sixteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
seventeenseventeen = seventeen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:',"<>\{\}\[\]\\\/]/gi, '');
eightteeneightteen = eightteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
nineteennineteen = nineteen.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
twentytwenty = twenty.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');


document.autoSumForm.amount1.value = (oneone * 1) * (twotwo * 1);
document.autoSumForm.amount2.value = (threethree * 1) * (fourfour * 1);
document.autoSumForm.amount3.value = (fivefive * 1) * (sixsix * 1);
document.autoSumForm.amount4.value = (sevenseven * 1) * (eighteight * 1);
document.autoSumForm.amount5.value = (ninenine * 1) * (tenten * 1);
document.autoSumForm.amount6.value = (eleveneleven * 1) * (twelvetwelve * 1);
document.autoSumForm.amount7.value = (thirteenthirteen * 1) * (fourteenfourteen * 1);
document.autoSumForm.amount8.value = (fiveteenfiveteen * 1) * (sixteensixteen * 1);
document.autoSumForm.amount9.value = (seventeenseventeen * 1) * (eightteeneightteen * 1);
document.autoSumForm.amount10.value = (nineteennineteen * 1) * (twentytwenty * 1);
}
function stopCalc(){
clearInterval(interval);}


function startCalc2(){
interval = setInterval("calc2()",1);}
function calc2(){
aamount1 = document.autoSumForm.amount1.value;
aamount2 = document.autoSumForm.amount2.value;
aamount3 = document.autoSumForm.amount3.value;
aamount4 = document.autoSumForm.amount4.value;
aamount5 = document.autoSumForm.amount5.value;
aamount6 = document.autoSumForm.amount6.value;
aamount7 = document.autoSumForm.amount7.value;
aamount8 = document.autoSumForm.amount8.value;
aamount9 = document.autoSumForm.amount9.value;
aamount10 = document.autoSumForm.amount10.value;

aaamount1 = aamount1.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount2 = aamount2.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount3 = aamount3.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount4 = aamount4.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount5 = aamount5.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount6 = aamount6.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount7 = aamount7.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount8 = aamount8.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount9 = aamount9.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');
aaamount10 = aamount10.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",<>\{\}\[\]\\\/]/gi, '');

document.autoSumForm.total_amount.value = (aaamount1 * 1) + (aaamount2 * 1) + (aaamount3 * 1) + (aaamount4 * 1) + (aaamount5 * 1) + (aaamount6 * 1) + (aaamount7 * 1) + (aaamount8 * 1) + (aaamount9 * 1) + (aaamount10 * 1);
}
function stopCalc2(){
clearInterval(interval);}

function startCalc22()
{

    var amount1 = $('#amount1').val();
	var amount2 = $('#amount2').val();
	var amount3 = $('#amount3').val();
	var amount4 = $('#amount4').val();
	var amount5 = $('#amount5').val();
	var amount6 = $('#amount6').val();
	var amount7 = $('#amount7').val();
	var amount8 = $('#amount8').val();
	var amount9 = $('#amount9').val();
	var amount10 = $('#amount10').val();

		var Selisih = parseInt(amount1) + parseInt(amount2) + parseInt(amount3);
		$('#total_amount').val(to_rupiah(Selisih));
}

</script>
