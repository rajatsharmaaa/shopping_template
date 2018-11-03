 <?php
/*********add to cart************/

//car_id from get home.php
if(isset($car_id))
		{
			if(empty($_SESSION['user']))
			{
				echo "<script>
						alert('Unknown User Request. . . Please Login!')
						window.location='?p=Login'
					</script>";
			}
			else
			{
				$vip = "select * from product where p_id='$car_id'";
				$fill=mysqli_fetch_array(mysqli_query($db,$vip));
				$dat=date('Y-m-d');
				//$quant=mysqli_query($db,"select no_of_item from cart where pro_id='$fill[0]' && user_id='$usr_id'");
				  //usr_id get from login.php   this is a seession create

					if(mysqli_query($db,"ip '$usr_id','$user','$fill[3]','$fill[4]','$fill[6]',1,0,'$dat')"))

						

						{
							echo "<script>
								alert('Added To Cart')
								window.location='index.php'
							</script>";
						}
						else
						{
							echo "<script>
								alert('Query Error! pls Try Again')
								window.location='index.php'
							</script>";
						}
					
			}
		}
?>