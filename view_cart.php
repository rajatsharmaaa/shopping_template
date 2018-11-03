

<table width="100%" border="0px" cellspacing="0px">
<h3>View Cart Detail's</h3>	
		<?php
		if(isset($cart_del))
		{
			if(mysqli_query($db,"delete from cart where cart_id='$cart_del' && user_id='$usr_id'"))
			{
				echo "<script>
						alert('Item Removed !')
						window.location='?p=v_crt'
					</script>";
			}
			else
			{
					echo "<script>
						alert('Query Error Removing Error !')
						window.location='?p=v_crt'
					</script>";
			}
		}

		 $kett=mysqli_query($db,"select * from cart where user_id='$usr_id' && user_name='$user' && buy_status=0");
		 if(mysqli_num_rows($kett)!==0)
		 {
	
			 while($mop=mysqli_fetch_array($kett))
			 {
			 	$pop.=$mop[0].",";
			 	$total+=$mop[5]*$mop[7];
			 	echo "<tr style='border-bottom:1px solid gray;float:left;width:100%;'>";
			
			 	echo"<th width='10%' height='100px'><img src='Assest/Product_pic/$mop[6]' width='100%' height='100%'/></th>";
			 	echo"<th style='color:gray;width:30%;'>$mop[4]</th>";
			 	echo"<th style='color:red;'>Rs : $mop[5] INR</th>";
			 	echo "<th style='color:blue;'>Item : $mop[7]</th>";
			 	echo"<th><a href='?p=v_crt&cart_del=$mop[0]' style='border:1px solid darkblue;padding:6px;border-radius:5px;text-decoration:none;'>Delete</a></th>";
			 	echo "</tr>";
			 }
			 echo"<tr style='height:100px;'>";
			 	echo"<th colspan='5' style='color:red;font-size:25px;'><b>Total Price = </b> &nbsp; $total INR</th>";
			 echo"</tr>";
			 echo"<tr style='height:100px;'>";
			  echo "<th colspan='5'><form method='post' action='checkout.php'>
			  		<input type='hidden' name='cart_idd' value='$pop'>
			  		<input type='hidden' name='pay' value='$total'/>
					<input type='submit' style='border:0px solid darkblue; 50px;border-radius:5px;text-decoration:none;background:#392;color:white;padding:20px 50px;' value='Checkout !'/>
			  </form> </th>";
			 echo"</tr>";
		}
		else
		{
			echo"<td colspan='5'><h1 style='color:red;background:#eee;padding:40px 100px;'>Empty Cart ! . . . <a href='index.php' style='border:1px solid darkblue;padding:6px;border-radius:5px;text-decoration:none;'>Add Some Item's</a></h1></td>";
		}
		 ?>
	</table>	
	<h3>Product Buy History</h3>
<p>
	<table width="100%" border="0px" cellspacing="0px">
		 <?php
		  $kell=mysqli_query($db,"select * from cart where user_id='$usr_id' && user_name='$user' && buy_status=1");
		 if(mysqli_num_rows($kell)!==0)
		 {
	
			 while($mopp=mysqli_fetch_array($kell))
			 {
			 	$total+=$mopp[5]*$mopp[7];
			 	echo "<tr style='float:left;width:100%;opacity:0.4;background:#ddd;'>";
			
			 	echo"<th width='10%' height='100px'><img src='Assest/Product_pic/$mopp[6]' width='100%' height='100%'/></th>";
			 	echo"<th style='color:gray;width:30%;'>$mopp[4]</th>";
			 	echo"<th style='color:red;'>Rs : $mopp[5] INR </th>";
			 	echo "<th style='color:blue;'>Date : $mopp[9]<br>Quantity : $mopp[7]</th>";
			 	echo "</tr>";
			 }
			 echo"<tr style='height:100px;'>";
			 	echo"<th colspan='5' style='color:red;opacity:0.4;background:#ddd;font-size:25px;border-bottom:2px solid gray;'><b>Total Price = </b> &nbsp; $total INR</th>";
			 echo"</tr>";
			 echo"<tr style='height:100px;'>";
			   
			 echo"</tr>";
		}
		else
		{
			echo"<td colspan='5'><h1 style='color:red;background:#eee;padding:40px 100px;'>No Buy History . . <a href='index.php' style='border:1px solid darkblue;padding:6px;border-radius:5px;text-decoration:none;'>Add Some Item's</a></h1></td>";
		}
		 ?>
	</table>
</p>	

