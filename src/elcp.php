<script>
function js1(p1)
{
	if(window.confirm('upload success : '+p1))
	{
        window.location.href='elcp_home.php';
    }
}
</script>
<link rel="stylesheet" type="text/css" href="other.css">
<div class="container" align='center'>
	<section id="content">
		<form action="" method='post'>
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name='id' />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name='pw' />
			</div>
			<div>
				<input type="submit" name='submit' value="Login" />
				<a href="elcp_0_register.php">>> Register</a>
			</div>
		</form><!-- form -->
		<div class="button">
		E-Learning For C Programming&trade;</br>2013
		</div><!-- button -->
	</section><!-- content -->
<?php
error_reporting(E_ERROR|E_PARSE);
session_start();
session_destroy();
if(isset($_POST['submit']))
{
	error_reporting(E_ERROR|E_PARSE);
	$mysql=mysqli_connect("localhost","root","","test");
	$sql="select * from user";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		$_POST['pw']=md5($_POST['pw']);
		$authority="false";
		$output=mysqli_query($mysql,$sql);
		while($raw=mysqli_fetch_array($output))
		{
			if($raw['user_id']==$_POST['id'])
			{
				if($raw['user_password']==$_POST['pw'])
				{
					$authority="true";
					session_start();
					$_SESSION['id']=$raw['user_id'];
					$_SESSION['name']=$raw['user_name'];
				}
			}
		}
		if($authority=="true")
		{
			header("Location: elcp_home.php");
		}
		else if($authority=="false")
		{
			echo "<body onload='alert(\"incorrect combination of username & password.\")'>";
		}
	}
	mysqli_close($mysql);
}
?>
</div><!-- container -->