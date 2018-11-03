  <h3><?php echo $p; ?></h3>
<?php
extract($_POST);
if(isset($login))
{ 
	$pop = "select * from user where name='$u' && password='$p'";
	$rop = mysqli_query($db,$pop);
	if(mysqli_num_rows($rop)!==0)
	{	
		$oop=mysqli_fetch_array($rop);
		$_SESSION['usr_id'] = $oop[0];
		$_SESSION['user'] = $u;  
		echo "<script>
				alert('Welcome User!')
				window.location='index.php'
			</script>";
			
	}
	else
	{
		echo "<script>
				alert('Wrong User and password!')
				window.location='index.php'
		</script>";
	}
}

?>
	<p> 
		<center>
			<form method="post">
				<p>User: <input type="text" name="u"></p>
				<p>Password: <input type="text" name="p"></p>
				<p><input type="submit" name="login" value="Login hear"></p>
			</form>
		</center>
		</p>