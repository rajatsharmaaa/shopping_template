<?php
error_reporting(0);
session_start();
extract($_GET);
extract($_SESSION);
require_once("Assest/main.php");
$obj= new front_end();
$db=$obj->Db_conn("amazone20");
require_once("add_cart_page.php");
if($db)
{
$obj->top_head();
$obj->top_nav();	
	?>
		<div class="page-container">
			<?php
			if($p=="")
				{
					include"home.php";
				}
			if($p=="usr_edit")
			{
				include"user/user_edit.php";
			}
			if($p=="v_crt")
			{
				# cart section
				if(empty($user))
				{
					echo "<script>
					alert('Unknown User Access ! Enter Login Detail')
					window.location='?p=Login'
					</script>";

				}
				else
				{
					include"view_cart.php";
				}
			}
			if($p=="viw_cat")
				{
					include"View_category.php";
				}
			if($p=="Product upload")
				{
					include"upload.php";
				}
			if($p=="About")
				{
					include"about.php";
				}
			if($p=="Register")
				{
					include"register.php";
				}
			if($p=="Login")
				{
					include"login.php";
				}
			if($p=="cat")
			{
				include"category.php";
			}
			if($p=='pr')
			{
				if(empty($_SESSION['user']))
				{
					echo "<script>
						alert('Invalid  URL')
						window.location='index.php'
					</script>";
				}
				else
				{
					include"User/user_profile.php";
				}
			}
			if($p=="lo")
			{
				//header('location:index.php');
				session_destroy();
				echo "<script>
					alert('Logout Successfully. .')
					window.location='index.php'
				</script>";
				//unset($_SESSION['user']);
			}

			?>
		</div>
	<?php
$obj->footer();
}
else
{
	echo "<h2> Database Connection Error . . .</h2>";
}
?>