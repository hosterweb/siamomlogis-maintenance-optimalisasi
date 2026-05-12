  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                <form class="form-horizontal" name="trx" id="trx" method="post" action="">
                        			<h4 class="header-title m-t-0 m-b-30">Add Entry Invoice</h4>

<?php
if (isset($_POST['submit'])){
				$id=$_POST['id'];
				$shipment=$_POST['shipment'];			
				$tgl=$_POST['tgl'];
				$job_number=$_POST['job_number'];	
				$marketing=$_POST['marketing'];	
				$customer=$_POST['customer'];
				$master_bl=$_POST['master_bl'];	
				$house_bl=$_POST['house_bl'];	
				$poi=$_POST['poi'];	
				$pod=$_POST['pod'];	
				$vessel_boy=$_POST['vessel_boy'];	
				$eta_etd=$_POST['eta_etd'];	
				$agent=$_POST['agent'];	
				$container=$_POST['container'];	
				$remark=$_POST['remark'];
				$jo_number=$_POST['jo_number'];
				$invoice_number=$_POST['invoice_number'];
				$currency=$_POST['currency'];
				$customer_code=$_POST['customer_code'];
				$alamat=$_POST['alamat'];
				$condition=$_POST['condition'];
				$credit_terms=$_POST['credit_terms'];
				$kurs=$_POST['kurs'];
				$konfersi_kurs=$_POST['konfersi_kurs'];
				$container_no=$_POST['container_no'];
				$description1=$_POST['description1'];
				$description2=$_POST['description2'];
				$description3=$_POST['description3'];
				$description4=$_POST['description4'];
				$description5=$_POST['description5'];
				$description6=$_POST['description6'];
				$description7=$_POST['description7'];
				$description8=$_POST['description8'];
				$description9=$_POST['description9'];
				$description10=$_POST['description10'];
				$amount1=$_POST['amount1'];
				$amount2=$_POST['amount2'];
				$amount3=$_POST['amount3'];
				$amount4=$_POST['amount4'];
				$amount5=$_POST['amount5'];
				$amount6=$_POST['amount6'];
				$amount7=$_POST['amount7'];
				$amount8=$_POST['amount8'];
				$amount9=$_POST['amount9'];
				$amount10=$_POST['amount10'];
				$receivable1=$_POST['receivable1'];
				$receivable2=$_POST['receivable2'];
				$receivable3=$_POST['receivable3'];
				$receivable4=$_POST['receivable4'];
				$receivable5=$_POST['receivable5'];
				$receivable6=$_POST['receivable6'];
				$receivable7=$_POST['receivable7'];
				$receivable8=$_POST['receivable8'];
				$receivable9=$_POST['receivable9'];
				$receivable10=$_POST['receivable10'];
				$co_nu=$_POST['co_nu'];
				$qty=$_POST['qty'];
				$loding=$_POST['loding'];
				$destination=$_POST['destination'];
				$co_nu=$_POST['co_nu'];
				$status_invoice=$_POST['status_invoice'];
				$total_amount=$_POST['total_amount'];
				$total_receivable=$_POST['total_receivable'];
				$loss_profit=$_POST['loss_profit'];
				$pajak=$_POST['pajak'];
				
				$ex=mysqli_query($koneksi,"UPDATE create_job_copy SET 
				shipment='$shipment',			
				tgl='$tgl',
				job_number='$job_number',	
				marketing='$marketing',	
				customer='$customer',
				master_bl='$master_bl',	
				house_bl='$house_bl',	
				poi='$poi',	
				pod='$pod',	
				vessel_boy='$vessel_boy',	
				eta_etd='$eta_etd',	
				agent='$agent',	
				container='$container',	
				jo_number='$jo_number',
				invoice_number='$invoice_number',
				currency='$currency',
				customer_code='$customer_code',
				alamat='$alamat',
				kondition='$condition',
				kurs='$kurs',
				konfersi_kurs='$konfersi_kurs',
				co_nu='$co_nu',
				qty='$qty',
				loding='$loding',
				destination='$destination',
				status_invoice='$status_invoice',
				pajak='$pajak' WHERE id='$id'");
							if($ex){
												?>
												<div class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Simpan.
											</div>
											<?php	}
											else {
												mysqli_error($koneksi);
												echo mysqli_error($koneksi);
												echo $ex;
												?>
												<div class="alert alert-danger alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Maaf!</strong> Data Gagal Di Simpan.
											</div>
                                                <?php
												}
												}
												
$cariid=mysqli_query($koneksi, "SELECT invoice_number FROM create_job_copy order by id DESC LIMIT 1");	
	$w=mysqli_fetch_array($cariid);
	$q=$w['invoice_number'];
	$e=explode('/', $q);
	$ambilidmax=$e['1'];
	$ambilbulan=$e['3'];
	$blnskg=date('m');
	
	if(empty($q)){
		$idmax=1;
		}
		elseif($ambilbulan==$blnskg){
			$idmax=$ambilidmax+1;
		}
		else {
			$idmax=1; 
		}
												
												
$edit_id=$_GET['edit_id'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM create_job_copy where id='$edit_id'");
$ambil_data=mysqli_fetch_array($olahdata);											
										?>
                                  
<div style="display:none">    
	<label class="col-lg-4 control-label">ID Create Job</label>
   <div class="col-lg-8">
   <input class="form-control"  type="text" name="id" id="id"  maxlength="50" readonly="readonly" value="<?php echo $edit_id;?>">
    <input class="form-control"  type="text" name="status_invoice" id="status_invoice"  size="40" maxlength="40" readonly="readonly" value="1" style="display:none"/>
 <input type="text" class="form-control"  name="status" id="status"  size="40" maxlength="40" readonly="readonly" value="1" style="display:none"/></div></div>
 
 <div class="form-group">     
	<label class="col-lg-4 control-label">Invoice Number</label>
   <div class="col-lg-8"><input class="form-control"  type="text" name="invoice_number" id="invoice_number"  maxlength="50" value="<?php echo $ambil_data['invoice_number'];?>"></div></div>
   
 <!-- <div class="col-lg-8"><input class="form-control"  type="text" name="invoice_number" id="invoice_number"  maxlength="50" value="INV<?php //echo date("dmy");?><?php //echo $edit_id;?>"></div></div> -->

<div class="form-group">     
	<label class="col-lg-4 control-label">Tanggal</label>
   <div class="col-lg-8"><input class="form-control"  type="text" name="tgl" id="datepicker-autoclose5"  maxlength="50" value="<?php echo $ambil_data["tgl"];?>"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">JO CTRL  Number</label>
   <div class="col-lg-8"><input class="form-control"  type="text" name="co_nu" id="co_nu" value="<?php echo $ambil_data['co_nu'];?>"  maxlength="50" readonly="readonly"/></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">JO CTRL  Number</label>
   <div class="col-lg-8"><input class="form-control"  type="text" name="job_number" id="job_number" value="<?php echo $ambil_data['job_number'];?>" maxlength="50" readonly="readonly"/></label></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Marketing</label>
   <div class="col-lg-8">
  <select class="form-control"  name="marketing" id="marketing">
    <option value="<?php echo $ambil_data['marketing'];?>" selected><?php echo $ambil_data['marketing'];?></option>
    <option value="ERNIE">ERNIE</option>
    <option value="SUGENG">SUGENG</option>
    <option value="RURI">RURI</option>
    </select>
</div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Master BL</label>
   <div class="col-lg-8"><input  class="form-control" type="text" value="<?php echo $ambil_data['master_bl'];?>" name="master_bl" id="master_bl"  maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">House BL</label>
   <div class="col-lg-8">
   <input type="text" class="form-control"  name="house_bl" id="house_bl" value="<?php echo $ambil_data['house_bl'];?>"  maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Customer Name</label>
   <div class="col-lg-8"><select class="form-control select2" name="customer" id="customer">
 <option value="<?php echo $ambil_data['customer'];?>" selected><?php echo $ambil_data['customer'];?></option>
 <?php 
 $j11 = mysqli_query($koneksi, "SELECT * FROM customer");
 while($d11=mysqli_fetch_array($j11)) {?>  
 <option value='<?php echo $d11['nama_customer'];?>'><?php echo $d11['nama_customer'];?> | <?php echo $d11['alamat']; ?> </option>
 <?php }	?>
 </select>
 </div></div>
 
<div class="form-group">     
	<label class="col-lg-4 control-label">Currency</label>
   <div class="col-lg-8">
    <select class="form-control select2" name="currency" id="currency">
    <option  value="<?php echo $ambil_data['currency'];?>" selected ><?php echo $ambil_data['currency'];?> </option>
    <option value="IDR">IDR</option>
    <option value="DOLLAR">DOLLAR</option>
    </select></div></div>
    
<div class="form-group">     
	<label class="col-lg-4 control-label">Shipment</label>
   <div class="col-lg-8">
   <select class="form-control select2" name="shipment" id="shipment">
    <option>Pilih Shipment</option>
    <option  value="<?php echo $ambil_data['shipment'];?>" selected><?php echo $ambil_data['shipment'];?></option> 
    <option value="EXPORT LCL">EXPORT LCL</option>
    <option value="EXPORT FCL">EXPORT FCL</option>
    <option value="IMPORT LCL">IMPORT LCL</option>
    <option value="IMPORT FCL">IMPORT FCL</option>
    <option value="DOMESTIC ">DOMESTIC </option>
    <option value="EMKL ">EMKL </option>
    </select>
</div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">condition</label>
   <div class="col-lg-8">
     <select class="form-control select2" name="condition" id="condition">
    <option value="<?php echo $ambil_data['kondition'];?>" selected><?php echo $ambil_data['kondition'];?></option> 
    <option value="Cash">Cash</option>
    <option value="Kredit">Kredit</option>
    </select>
</div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Container Qty</label>
   <div class="col-lg-8">
   <input class="form-control"  type="text" value="<?php echo $ambil_data['qty'];?>" name="qty" id="qty"  size="40" maxlength="40"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">P.O.L</label>
   <div class="col-lg-8"><input class="form-control"  type="text" name="poi" id="poi"  value="<?php echo $ambil_data['poi'];?>"  maxlength="50"></div></div>
</tr>
<div class="form-group">     
	<label class="col-lg-4 control-label">P.O.D</label>
   <div class="col-lg-8">
   <input type="text" class="form-control"  name="pod" id="pod" value="<?php echo $ambil_data['pod'];?>"   maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Vessel &amp; Voy</label>
   <div class="col-lg-8"><input type="text" class="form-control"  name="vessel_boy"  value="<?php echo $ambil_data['vessel_boy'];?>"  id="vessel_boy"  maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">ETA / ETD</label>
   <div class="col-lg-8">
    <input type="text" class="form-control"   value="<?php echo $ambil_data['eta_etd'];?>"  name="eta_etd" id="eta_etd"  maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Container Number</label>
   <div class="col-lg-8">
   <input type="text" class="form-control"  name="container" id="container"  value="<?php echo $ambil_data['container'];?>"   maxlength="50"></div></div>

<div class="form-group">     
	<label class="col-lg-4 control-label">Kurs</label>
   <div class="col-lg-8">
   <input type="text" class="form-control"  name="kurs" id="kurs"  size="40" maxlength="40"  value="<?php echo $ambil_data['kurs'];?>" ></div></div>
</tr>
<div class="form-group">     
	<label class="col-lg-4 control-label">Konfersi Kurs</label>
   <div class="col-lg-8">
   <input type="text" class="form-control"  name="konfersi_kurs" id="konfersi_kurs"  size="40" maxlength="40"  value="<?php echo $ambil_data['konfersi_kurs'];?>" ></div></div>
</tr>
<div class="form-group">     
	<label class="col-lg-4 control-label">Destination</label>
   <div class="col-lg-8">
<input type="text" name="destination"  class="form-control" id="destination" value="<?php echo $ambil_data['destination'];?>"   maxlength="50"></div></div>
</tr>
<div class="form-group">     
	<label class="col-lg-4 control-label">loading</label>
   <div class="col-lg-8">
<input  class="form-control" type="text" name="loding" id="loding"  value="<?php echo $ambil_data['loding'];?>"   maxlength="50"></div></div>
</tr>

<div class="form-group">     
	<label class="col-lg-4 control-label">Pajak/Tax (%)</label>
   <div class="col-lg-8">
<input  class="form-control" type="text" name="pajak" id="pajak"  value="<?php echo $ambil_data['pajak'];?>"   maxlength="3"></div></div>


<div style="display:none">     
	<label class="col-lg-4 control-label">Agent</label>
   <div class="col-lg-8">
    <select class="form-control"  class="form-control" name="agent" id="agent">
<option  value="<?php echo $ambil_data['agent'];?>" selected><?php echo $ambil_data['agent'];?> </option> 
                                    <?php 
                                    $j111 = mysqli_query($koneksi, "SELECT * FROM agent");
                                    while($d111=mysqli_fetch_array($j111)){  
                                    ?>
                                    <option value="<?php echo $d111['nama_agent'];?>"><?php echo $d111['nama_agent'];?> | <?php echo $d111['alamat'];?></option>
                                    <?php }	?>
                                        </select></div></div>
                                        
<div style="display:none">    
	<label class="col-lg-4 control-label">Remark</label>
   <div class="col-lg-8">
    <label class="col-lg-4 control-label"><input type="text" name="remark" id="remark"  maxlength="50"></div></div>

<br><br>
<div style="clear:both"></div>

 <div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=entry_invoice">
<button id="addToTable" class="btn btn-primary waves-effect waves-dark" type="button" value="Kembali" name="kembali"><i class="fa fa-minus">&nbsp; Kembali</i></button>
</a>
</div></div>

        </form>                                        
<!--
<tr>
<td colspan="2">Total</td>
<td><input class="form-control" type="text" name="total_receivable" id="total_receivable" size="20" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" /></td>
<td><input  class="form-control" type="text" name="total_amount" id="total_amount" size="20" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" /></div></div>
<div class="form-group">    
                                    <label class="col-lg-4 control-label">Loss/Profit</td>
<td><input class="form-control" type="text" name="loss_profit" id="loss_profit" size="20" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" /></div></div>
</table>
</td></tr>
</table>-->

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
<script>
function NilaiRupiah(jumlah)  
{  
    var titik = ".";
    var nilai = new String(jumlah);  
    var pecah = [];  
    while(nilai.length > 3)  
    {  
        var asd = nilai.substr(nilai.length-3);  
        pecah.unshift(asd);  
        nilai = nilai.substr(0, nilai.length-3);  
    }  

    if(nilai.length > 0) { pecah.unshift(nilai); }  
    nilai = pecah.join(titik);
    return nilai;  
}
function formatNumber(input)
{
    var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
    if(num.indexOf('.') > -1){
    num = num.split('.');
    num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
    if(num[1].length > 2){
    alert('You may only enter two decimals!');
    num[1] = num[1].substring(0,num[1].length-1);
    } input.value = num[0]+'.'+num[1];
    } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    }
    else{ alert('Anda hanya diperbolehkan memasukkan angka!');
    input.value = input.value.substring(0,input.value.length-1);
    }
}

</script>
<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		$("#loading").hide();
		
		$("#shipment").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#job_number").hide(); // Sembunyikan dulu combobox kota nya
			$("#loading").show(); // Tampilkan loadingnya
		
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "http://localhost/mom_logistik_new/new/pages/cari_job_number.php", // Isi dengan url/path file php yang dituju
				data: {shipment : $("#shipment").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ // Ketika proses pengiriman berhasil
					$("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#job_number").html(response.list_kota).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.trx.amount1.value;
two = document.trx.amount2.value;
three = document.trx.amount3.value;
four = document.trx.amount4.value;
five = document.trx.amount5.value;
six = document.trx.amount6.value;
seven = document.trx.amount7.value;
eight = document.trx.amount8.value;
nine = document.trx.amount9.value;
ten = document.trx.amount10.value;

oneone = one.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
twotwo = two.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
threethree = three.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
fourfour = four.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
fivefive = five.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
sixsix = six.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
sevenseven = seven.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
eighteight = eight.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
ninenine = nine.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
tenten = ten.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');

total_amount.value = (oneone*1) + (twotwo*1) + (threethree*1) + (fourfour*1) + (fivefive*1) + (sixsix*1) + (sevenseven*1) + (eighteight*1) + (ninenine*1) + (tenten*1) ;
}

function stopCalc(){
}

function startCalc2(){
interval = setInterval("calc2()",1);}
function calc2(){
onea = document.trx.receivable1.value;
twoa = document.trx.receivable2.value;
threea = document.trx.receivable3.value;
foura = document.trx.receivable4.value;
fivea = document.trx.receivable5.value;
sixa = document.trx.receivable6.value;
sevena = document.trx.receivable7.value;
eighta = document.trx.receivable8.value;
ninea = document.trx.receivable9.value;
tena = document.trx.receivable10.value;

oneonea = onea.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
twotwoa = twoa.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
threethreea = threea.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
fourfoura = foura.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
fivefivea = fivea.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
sixsixa = sixa.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
sevensevena = sevena.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
eighteighta = eighta.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
nineninea = ninea.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
tentena = tena.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');

total_receivable.value = (oneonea*1) + (twotwoa*1) + (threethreea*1) + (fourfoura*1) + (fivefivea*1) + (sixsixa*1) + (sevensevena*1) + (eighteighta*1) + (nineninea*1) + (tentena*1) ;
}

function stopCalc2(){
}



function startCalc3(){
interval = setInterval("calc3()",1);}
function calc3(){
oneb = document.trx.total_amount.value;
twob = document.trx.total_receivable.value;

oneoneb = oneb.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');
twotwob = twob.replace(/[`~!@#$%^&*()_|+\-=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, '');


loss_profit.value = (oneoneb*1) - (twotwob*1);
}

function stopCalc3(){
}

	</script>