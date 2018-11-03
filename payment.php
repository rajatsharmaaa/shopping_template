<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<head>
		<style>
			*{margin:0px;padding:0px;font-family:sans-sarif;}
		</style>
	</head>
</head>
<body>
	
</body>
</html>
<?php
error_reporting(0);
session_start();
extract($_GET);
extract($_SESSION);
require_once("Assest/main.php");
$obj= new front_end();
$db=$obj->Db_conn("amazone");
extract($_POST);
if(isset($final_idd))
{
	$pipe=explode(',',$final_idd);
	for($i=0;$i<count($pipe)-1;$i++)
	{
	mysqli_query($db,"update cart set buy_status=1 where cart_id='$pipe[$i]'");
	
	}
?>

<head>
<style>
	 
</style>
</head>
<center>
	<div class="Profile_detail">
		<h2 style='background:#334455;padding:30px;color:white;'>Payment Detail's1</h2><br>
		<h3><?php echo "Name on card : ".$_POST['x'][0]; ?></h3><br>
		<p><b>Card no : </b>&nbsp; <?php echo $_POST['x'][1]; ?></p><br>
		<p><b>Amount :</b>&nbsp; <?php echo 'Rs. '.$_POST['x'][4]; ?></p><br>
		<h2 style='color:red;'> Payment Successfully Done . . . . .</h2><br><br>
		 <p><a href='index.php'><input type="button" value='Back to home' style='padding:15px 30px;border:none;color:white;border-radius:6px;cursor:pointer;box-shadow:2px 3px 7px gray;background-color: rgba(0,0,70,0.7)'></a></p>
	</div>
</center>
<?php
}
else if(isset($buy_idd))
{
	
		$kilo=mysqli_query($db,"select * from product where p_id='$buy_idd'");
		$fogg=mysqli_fetch_array($kilo);
		if(mysqli_num_rows($kilo)!==0)
		{
				$dat=date('Y-m-d');
				mysqli_query($db,"insert into cart values('','$buy_idd','$usr_id','$user','$fogg[3]','$fogg[4]','$fogg[6]',1,1,'$dat')");	
		}
		else{
			echo "<script>
				alert('Buy Now Query Error !')
				window.location='index.php'
			</script>";
		}
	?>
	<center>
	<div class="Profile_detail">
		<h2 style='background:#334455;padding:30px;color:white;'>Payment Detail's</h2><br>
		<h3><?php echo "Name on card : ".$_POST['x'][0]; ?></h3><br>
		<p><b>Card no : </b>&nbsp; <?php echo $_POST['x'][1]; ?></p><br>
		<p><b>Amount :</b>&nbsp; <?php echo 'Rs. '.$_POST['x'][4]; ?></p><br>
		<h2 style='color:red;'> Payment Successfully Done . . . . .</h2><br><br>
		 <p><a href='index.php'><input type="button" value='Back to home' style='padding:15px 30px;border:none;color:white;border-radius:6px;cursor:pointer;box-shadow:2px 3px 7px gray;background-color: rgba(0,0,70,0.7)'></a></p>
	</div>
</center>
<?php
}
else
{
	echo "<script>
		alert('Invalid Entry pls. Try Again')
		window.location='index.php'
	</script>";
}
?>
	