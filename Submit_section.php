<?php
require_once("Assest/main.php");
$obj = new front_end;
$db = $obj->Db_conn("amazone20");
extract($_POST);
if(isset($save_data))
{
	$pic=$_FILES['img']['name'];
	
	$p="insert into user values('','$a','$b','$c','$d','$gender','$add','$pic')";
	echo $p;
	if(mysqli_query($db,$p) && move_uploaded_file($_FILES['img']['tmp_name'],"Assest/User_pic/".$_FILES['img']['name']))
	{
		//header("location:page.php");
		echo "<script>
			alert('New User Added Successfully  . . .')
			window.location='index.php'
		</script>";
	}
	echo "false";
}

?>