	<?php
		$v = "select * from category";
		$final = mysqli_query($db,$v);
		//echo mysqli_num_rows($final);
	?>

		<h3>Category Page</h3>
			<p>
				<?php
					while($data=mysqli_fetch_array($final))
					{
				
					 echo"<div class='box'>
						<h4>$data[1]</h4>
						<a href='?p=viw_cat&vi_id=$data[0]'><input type='button' value='View List'></a>
					</div>";
					}
				?>
			</p>
 
 