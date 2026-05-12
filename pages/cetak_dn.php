<?php
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}

error_reporting(1);
//function Terbilang($x) {
//if ($x < 0) return 'minus ' . Terbilang(-$x);
//else if ($x < 10) {
//switch ($x) {
//case 0: return 'zero';
//case 1: return 'one';
//case 2: return 'two';
//case 3: return 'three';
//case 4: return 'four';
//case 5: return 'five';
//case 6: return 'six';
//case 7: return 'seven';
//case 8: return 'eight';
//case 9: return 'nine';
//}
//}
//else if ($x < 100) {
//$kepala = floor($x/10);
//$sisa = $x % 10;
//if ($kepala == 1) {
//if ($sisa == 0) return 'ten';
//else if ($sisa == 1) return 'eleven';
//else if ($sisa == 2) return 'twelve';
//else if ($sisa == 3) return 'thirteen';
//else if ($sisa == 5) return 'fifteen';
//else if ($sisa == 8) return 'eighteen';
//else return Terbilang($sisa) . 'teen';
//}
//else if ($kepala == 2) $hasil = 'twenty';
//else if ($kepala == 3) $hasil = 'thirty';
//else if ($kepala == 5) $hasil = 'fifty';
//else if ($kepala == 8) $hasil = 'eighty';
//else $hasil = Terbilang($kepala) . 'ty';
//}
//else if ($x < 1000) {
//$kepala = floor($x/100);
//$sisa = $x % 100;
//$hasil = Terbilang($kepala) . ' hundred';
//}
//else if ($x < 1000000) {
//$kepala = floor($x/1000);
//$sisa = $x % 1000;
//$hasil = Terbilang($kepala) . ' thousand';
//}
//else if ($x < 1000000000) {
//$kepala = floor($x/1000000);
//$sisa = $x % 1000000;
//$hasil = Terbilang($kepala) . ' million';
//}
//else return false;

//if ($sisa > 0) $hasil .= ' ' . Terbilang($sisa);
//return $hasil;
//}
	$no=1;
	$page =1;

?>
<?php ob_start(); 
include "../components/koneksi.php";
$cetak_id=$_GET['cetak_id'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM dn where id='$cetak_id'");
$row = mysqli_num_rows($olahdata); // Ambil jumlah data dari hasil eksekusi $sql
$r_data=mysqli_fetch_array($olahdata);	
?>
<img src="../assets/images/kop.png" width="750">
<style>
		table {
			border-collapse:collapse; 
			width: 20cm;
		}
		table td {
			word-wrap:break-word;
			font-size:14px;
			padding:2px;
				}
		.description {
			width:46%;
			}
			.description1 {
			width:49%;
			}
		.k{
			width:20%;
			}
		.separo { width:50%;}			
	</style>
    
<table border="0">
<tr><td><br /></td></tr>
<tr><td style="width:100%;font-size:20px; text-align:center;"><u>DEBIT NOTE</u></td></tr>
<tr><td align="center" style="width:100%;"><?php echo $r_data['dn_number'];?></td></tr>
<tr><td><br></td></tr>

<tr><td>
<table width="100%" border="1px solid black" style="font-size:10px; padding-left:3px">
    <tr><td valign="top" style="width:50%; padding-left:20px; font-size:10pt;">
       TO :<br>
      <?php echo $r_data['agent'];?>
       </td>
       <td valign="top" style="width:50%; text-align:left;">
       <table border="0" style="font-size:10pt; text-align:left;" valign="top"> 
       <tr>
       <td valign="top" style="padding-left:20px;">DATE</td>
       <td style="width:5%;">:</td>
	   <td><?php 
		 $tgl=$r_data['tgl'];  
		 $tgl2=date('d-m-Y', strtotime($tgl));
	   echo $tgl2;  ?></td>       </tr>
      
       <tr>
       <td valign="top" style="padding-left:20px;">JOB</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['job_number'];?></td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">MBL NO</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['house_bl'];?></td>
       </tr>
   </table></td></tr></table>
</td></tr>

<tr><td>
<table style="font-size:10px; padding-left:3px;" border="1px solid black">
<tr>
  <td colspan="4">
<table width="750" border="0px solid black" style="font-size:10px; padding-left:3px;">
<tr>
<td style="width:50%; padding-left:5px">VESSEL & VOY</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['vessel_boy']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">ETA/ETD</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['eta_etd']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">POL</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['poi']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">POD</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['pod']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">CONTAINER NUMBER</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['container']; ?></td>
</tr>
</table>
</td></tr>
<?php
	$j=str_replace(",","",$r_data['amount1'])+str_replace(",","",$r_data['amount2'])+str_replace(",","",$r_data['amount3'])+str_replace(",","",$r_data['amount4'])+str_replace(",","",$r_data['amount5'])+str_replace(",","",$r_data['amount6'])+str_replace(",","",$r_data['amount7'])+str_replace(",","",$r_data['amount8'])+str_replace(",","",$r_data['amount9'])+str_replace(",","",$r_data['amount10']);

?>
<tr>
    <td style="width:55%; font-size:10pt; font-weight:bold; text-align:center;">DESCRIPTION</td>
    <td style="width:15%; font-size:10pt; font-weight:bold; text-align:center;">QTY</td>
    <td style="width:15%; font-size:10pt; font-weight:bold; text-align:center;">UNIT PRICE</td>
    <td style="width:15%; font-size:10pt; font-weight:bold; text-align:center;">AMOUNT</td>
</tr> 

<tr style="padding-left:3px;">
        <td style="width:55%; font-size:10pt; border:1px solid #000; text-align:left; padding-left:5px; font-weight:bold;">
		<?php 
		if(empty($r_data['description1'])){
		}
		else {
		echo $r_data['description1'];
		echo "<br>";
		}
		?>
        <?php 
		if(empty($r_data['description2'])){
		}
		else {
		echo $r_data['description2'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description3'])){
		}
		else {
		echo $r_data['description3'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description4'])){
		}
		else {
		echo $r_data['description4'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description5'])){
		}
		else {
		echo $r_data['description5'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description6'])){
		}
		else {
		echo $r_data['description6'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description7'])){
		}
		else {
		echo $r_data['description7'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description8'])){
		}
		else {
		echo $r_data['description8'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description9'])){
		}
		else {
		echo $r_data['description9'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description10'])){
		}
		else {
		echo $r_data['description10'];
		echo "<br>";
		}
		?>
        <br><br>
        </td>
        <td style="width:15%; font-size:10pt; border:1px solid #000; text-align:center; padding-left:5px; font-weight:bold;">
		<?php 
		if(empty($r_data['qty1'])){
		}
		else {
		echo $r_data['qty1'];
		echo "<br>";
		}
		?>
        <?php 
		if(empty($r_data['qty2'])){
		}
		else {
		echo $r_data['qty2'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty3'])){
		}
		else {
		echo $r_data['qty3'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty4'])){
		}
		else {
		echo $r_data['qty4'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty5'])){
		}
		else {
		echo $r_data['qty5'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty6'])){
		}
		else {
		echo $r_data['qty6'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty7'])){
		}
		else {
		echo $r_data['qty7'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty8'])){
		}
		else {
		echo $r_data['qty8'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty9'])){
		}
		else {
		echo $r_data['qty9'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['qty10'])){
		}
		else {
		echo $r_data['qty10'];
		echo "<br>";
		}
		?>
        <br><br>
        </td> <td style="width:15%; font-size:10pt; border:1px solid #000; text-align:center; font-weight:bold;">
		<?php 
		if(empty($r_data['unit_price1'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price1'];
		echo "<br>";
		}
		?>
        <?php 
		if(empty($r_data['unit_price2'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price2'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price3'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price3'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price4'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price4'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price5'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price5'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price6'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price6'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price7'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price7'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price8'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price8'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price9'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price9'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['unit_price10'])){
		}
		else {
		echo "$ ";		echo $r_data['unit_price10'];
		echo "<br>";
		}
		?>
        <br><br>
        </td>
        <td style="width:15%; text-align:right; font-size:10pt; font-weight:bold;">
         <?php 
		if(empty($r_data['amount1'])){
		}
		else {
		echo $r_data['currency'];	
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount1'],3,".",",");
		echo "<br>";
		}
		?>
		
         <?php 
		if(empty($r_data['amount2'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount2'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount3'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount3'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount4'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount4'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount5'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount5'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount6'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount6'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount7'])){
		}
		else {
		echo $r_data['currency'];
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount7'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount8'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount8'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount9'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount9'],3,".",",");
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount10'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo "$ ";		echo number_format($r_data['amount10'],3,".",",");
		echo "<br>";
		}
		?>
        <br><br>
	    </td>
	</tr>  

<tr>
<td colspan="3" style="font-size:10pt; padding-left:5px; width:50%;">Total</td> 
<td style="font-size:10pt; font-weight:bold; text-align:right; width:50%;">$<?php echo $r_data['currency'];  echo "&nbsp;"; echo 
number_format($j,3,".",",");?></td>
</tr>
<tr><td colspan="4" style="font-style:italic; font-size:10pt; padding-left:5px">
<?php 
$j_total=str_replace(",","",$j);
echo convertNumber($j_total);?>
</td></tr>
</table>
<table width="100%" border="0" style="font-size:11px;">
<tr><td style="font-size:10pt; width:50%;">
 For Payment by remittance, please make payable to : <br><br>
 BANK MANDIRI Cab. Indragiri Surabaya <br>
 ACCOUNT NO : 142-0016083668 (USD) <br><br>
 SWIFT CODE : bmriidja <br>
 IN FAVOUR : PT. MULTI OKTO MANUNGGAL
 
 </td>
 <td style="font-size:10pt; width:50%; padding-left:125px;"><br>Surabaya, <?php 
$tgl=$r_data['tgl'];
$tgl2 = date('d-m-Y', strtotime($tgl));
echo $tgl2;
?>
     <br>
   <p><br><br><br>
    <u>(PT. MOM LOGISTIC)</u></p></td>
 </tr>  
</table>
</td></tr></table>
<?php
$j=$r_data['dn_number'];
$html = ob_get_contents();
ob_end_clean();
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output($j.'.pdf', 'D');
?>