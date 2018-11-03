
	<?php
		$p = "select * from product where cat_id='$vi_id'";
		$fin = mysqli_query($db,$p);
		if(mysqli_num_rows($fin)!==0)
		{
		$cat_nam=mysqli_fetch_array(mysqli_query($db,"select * from category where cat_id='$vi_id'"));	
	?> 
<h3><?php echo $cat_nam[1];?></h3>	
	<p>
		<?php
		while($dat=mysqli_fetch_array($fin))
			{
		?>
			<div class="box">
				<h4><?php echo $dat[3];?></h4>
				<div class="pic">
				<img src="Assest/Product_pic/<?php echo $dat[6];?>" alt="" width="100%" height="100%">
				</div>
				<p style='color:red;'>Price : &nbsp;  <?php echo $dat[4];?></p>
				<P><a href='?car_id=<?php echo $data[0];?>'><input type="button" value="Add To Cart"></a>
				<input type="button" style='background-color: #443345' value="Buy Now"></p>
			</div>
		<?php
			}
		?>		

	</p>
	<?php
		}
		else
		{
			echo"<h2 style='padding:30px;color:red;'>Product Not Found ! . . . . .  <a href='?p=cat' style='border:1px solid darkblue;padding:6px;border-radius:5px;text-decoration:none;'>Go Back</a></h2>";
		}
	?>