<?php

		$v = "select * from product order by rand()";
		$final = mysqli_query($db,$v);
		//echo mysqli_num_rows($final);

?>
		<h3>Home page</h3>
			<p>
				<?php
					while($data=mysqli_fetch_array($final))
					{
				?>
							 <div class="box">
								<h4><?php echo $data[3];?></h4>
								<div class="pic">
									<img src="Assest/Product_pic/<?php echo $data[6];?>" alt="" width="100%" height="100%">
								</div>
								<p>Price : &nbsp;  <?php echo $data[4];?></p>
								<P><a href='?car_id=<?php echo $data[0];?>'><input type="button" value="Add To Cart"></a>
								<form method='post' action='checkout.php'>
								<input type='hidden' name='buy_id' value='<?php echo $data[0];?>'/>
			  					<input type='hidden' name='buy_price' value='<?php echo $data[4];?>'/>
								<input type="submit" name='buy_now' style='background-color: #443345' value="Buy Now">
							</form>
							</p>
							</div>
				<?php
					}

				?>
			</p>
 
 