<?php

if(isset($_POST['order'])){

    $mobile_no = $mobile_no;
   	$fname = $_POST['fname'];
   	$lname = $_POST['lname'];
   	$email = $_POST['email'];
   	$address = $_POST['address'];
   	$city = $_POST['city'];
   	$country = $_POST['country'];
   	$zipcode = $_POST['zipcode'];
   	$tel = $_POST['tel'];
   	$ship = $_POST['shipping'];
   	$pay = $_POST['payments'];
    $qty = $_POST['qty'];
    $img - $_POST['img'];
    $date = date("d/m/y");
    $orderDate=Date("d/m/y", strtotime("+6 days"));

   	$invoice = $invoice;
    $order = $order;

$to = $email;
$subject = 'Thanks for shopping from attri.com';
$from = 'Attri.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
    $message = '<html><head></head><body><table width="1024px">
        <tbody>
            <tr>
                <td width="200px">
    <div width="200px"><img src="http://inspireworldconsultants.com/attri/img/logo.png" width="100px"><br><br>
    ATTRI RETAILS PRIVATE LIMITED<br/>
    665 - B - 8 S/F, GOVINDPURI, <br>
      New Delhi - 110019<br><br>
63/9, First Floor, Rama Road, Kirti Nagar, <br>New Delhi - 110015
    <br><br><br>
    GST No. 07AAQCA6235Q1ZY
    <br><br><br><br>
<table width="100%">
    <tbody><tr align="center">
        <td bgcolor="black">
            <font color="white">Name</font>
        </td>
        
    </tr>
    <tr align="center">
        <td>'.$fname.' '.$lname.'</td>
        
    </tr>
    <tr align="center">
        <td bgcolor="black">
           <font color="white">  Mobile Number</font>
        </td>
    </tr>
    <tr align="center">
        <td>'.$tel.'</td>
    </tr>
     <tr>
        <td bgcolor="black" align="center">
           <font color="white">  Client GST No.</font>
        </td>
    </tr>
    <tr>
        <td align="center">'.$client_gst.'</td>
    </tr>
    </tbody></table><table>
</table></div>
</td>
                                <td width="200px" align="right">
    <h3>TAX INVOICE</h3>

    <table width="100%">
        <tbody>
            <tr>
  <td>
    <table width="100%">
      <tbody align="center"><tr bgcolor="black">
      <td width="150px">
  <font color="white">Invoice No.</font>
</td><td width="150px">
<font color="white">Date</font>
</td>
      </tr>
<tr align="center">
      <td width="150px">
<font>'.$invoice.'</font>
</td><td width="150px">
<font>'.$date.'</font>
</td>
<tr bgcolor="black">
      <td colspan="2">
  <font color="white">Payment Type</font>
</td>
      </tr>
      <tr align="center">
      <td colspan="2">
<font>'.$pay.'</font>
</td>
      </tr>
            </tr>
<tr bgcolor="black">
      <td colspan="2">
  <font color="white">Tracking Number</font>
</td>
      </tr>
      <tr>
      <td colspan="2">
<font>'.'<br>'.'</font>
</td>
      </tr>
            </tr>
<tr bgcolor="black">
      <td colspan="2">
  <font color="white">Shipping Address</font>
</td>
      </tr>
<tr align="center">
      <td colspan="2">
<font>'.$address.' , '.$city.'<br>

Pin code : '.$zip_code.'
</font>
</td>
      </tr>
    </tbody></table>
  </td>
            </tr>
        </tbody>
    </table>
</td>
            </tr>
<tr>
    <td colspan="2">
  <br>
        
        <table width="100%" border="1">
            <thead bgcolor="black">
            <tr border="1" align="center"><th width="600px"><font color="white">Description</font></th>
        <th><font color="white">Design No</font></th>
        <th><font color="white">Qty</font></th>
        <th><font color="white">Unit Price</font></th>
        <th><font color="white">Tax</font></th>
        <th><font color="white">Amount</font></th>
</tr></thead>
<tbody border="1">' ?>

<?php
		include 'include/database.php';
		$query=mysqli_query($con,"select * from add_to_cart where mobile_no='$mobile_no' group by product_id having count(product_id)>0");
		$subtotle=0;
		$tqty = 0;
		while($row=mysqli_fetch_array($query)){
		$title= $row['title'];
		$size= $row['size'];
		$price= $row['price'];
		$qty= $row['qty'];
		$img= $row['img'];
		$pro= $row['product_id'];
		$weight= $row['weight'];
		$totle=$price * $qty;
		$subtotle = $subtotle+$totle;
		$tqty = $tqty+$qty;

	 $pwt = $price*100/105;
     $tax = $pwt*5/100;
     $tax = round($tax,2);
     // $ppu = $pwt/$qty;
     $ppu = $pwt;
     $ppu = round($ppu,2);

     $swt = $sc*100/105;
     $tsc = $swt*5/100;
     $tsc = round($tsc,2); 
     $scpu = $swt/$tqty;
     $scpu = round($scpu,2);


        
?>

<?php

$message .='<tr border="1" align="center">
    <td>'.$title.'</td>
    <td>'.$pro.'</td>
        <td>'.$qty.'</td>
        <td>'.$ppu.'</td>
        <td>'.$tax.'</td>
        <td>'.$price*$qty.'</td></tr>'
?>
<?php } ?>
<?php
	include 'include/database.php';
	  $qry = "SELECT * from users where mobile_no='$mobile_no'";
	  $rst = mysqli_query($con,$qry);
	  $rows = mysqli_fetch_array($rst);
	  $ret_id = $rows['ret_id'];
	  if($ret_id=='1'){
?>
<?php

$message .= '<tr border="1" align="center">
    <td>'.$offer.' % Discount for '.$pkg.' package</td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td>-'.$pkgdis.'</td></tr>'
?>
<?php } ?>
<?php
     
     $message .='<tr>
				    <td>'.'<br>'.'</td>
				    <td>'.'<br>'.'</td>
				 </tr>';
     $message .='<tr align="center">
				    <td colspan="2">Shipping Charges</td>
				    <td>'.$tqty.'</td>
				    <td>'.$scpu.'</td>
				    <td>'.$tsc.'</td>
				    <td>'.$sc.'</td>
				</tr>';

?>

<?php

$total = $subtotle-$pkgdis+$sc;
$ro = (int)$total;
$ro = $total-$ro;
$total = (int)$total;
$cgst=$tax/2;
$cgst = round($cgst,2);
$sgst=$tax/2;
$sgst = round($sgst,2);

$message .='<tr border="1" align="center">
    <td colspan="2">Thank You</td>
        <td colspan="4">
            <table width="100%" border="1" bgcolor="lightgray">
                <tbody>
                <tr>
                    <td colspan="2">CGST 2.5%</td>
                    <td>'.$cgst.'</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">SGST 2.5%</td>
                    <td>'.$sgst.'</td>
                    <td></td>
                </tr>
                 
                <tr>
                    <td colspan="2">Rounded Off</td>
                    <td></td>
                    <td>'.$ro.'</td>
                </tr>
             
                <tr>
                    <td colspan="2">Total</td>
                    <td></td>
                    <td>INR '.$total.'</td>

                </tr>
            </tbody></table><div></div>
    </td>
    

            </tr>
   
        </tbody></table>
    

    </td>
  
</tr>
<tr>
<td colspan="2">
<br><br><br>
<h3>TERMS & CONDITIONS</h3>
1. Goods once sold will not be taken back.<br/>
2. Interst @ 12% will be charged if payment is not made withiin 15 days.<br/>
3. Payment by A/c payee'."'".'s cheque/Draft only.<br/>
4. We are not responsible for damage & Breakge of goods in transit.<br/>
5. subject to Delhi Jurisdiction.
<br><br>
<br>If you have any issue or Query Regarding Our Product, Write Us : ccare@attriretails.com<br>
For more Details Please Visit us at www.attriretails.com
</td>
</tr>
<tr>
  <td colspan="4">
  <br>
    <br>
    <br>
    <hr>
  </td>
</tr>    
    </tbody>
    </table></body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    $msg = 'Your mail has been sent successfully.';
} else{
    $msg2 = 'Unable to send email. Please try again.';
}
}
?>