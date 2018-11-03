<h3><?php echo $p; ?></h3>
	<p> 
		<center>
			<form method="post" enctype="multipart/form-data" action="Submit_section.php">
				<p>Name: <input type="text" name="a" required></p>
				<p>Email: <input type="text" name="b"></p>
				<p>Phone: <input type="text" name="c"></p>
				<p>Password: <input type="text" name="d"></p>
				<p>Male: <input type="radio" name="gender" value="Male">
				Female: <input type="radio" name="gender" value="Female"></p>
				<p><textarea name="add" cols="33" rows="3"></textarea></p>		
				<p><input type="file" name="img"></p>
				<p><input type="submit" name="save_data" value="Registration form!"/></p>
			</form>
		</center>
	  </p>