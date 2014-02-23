<script>
function js1(p1)
{
	if(window.confirm('register success : '+p1))
	{
        window.location.href='elcp_home.php';
    }
}
</script>
<link rel="stylesheet" type="text/css" href="other.css">
<?php
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="select user_id from user order by user_id desc limit 1";
if(mysqli_connect_errno($mysql))
{
	echo "cannot connect to database";
}
else
{
	$output=mysqli_query($mysql,$sql);
	$raw=mysqli_fetch_array($output);
	$raw[0]=substr($raw[0],2);
	$temp=intval($raw[0]);
	$newid="tp".($temp+1);
}
?>

<div class="container" align='center'>
	<section id="content">
		<form action="" method='post' enctype='multipart/form-data'>
			<h1>Register Form</h1>
			<div>
				<?php echo "Your new ID : <b>".$newid."</b></br></br><input type='text' name='id' value='".$newid."' disabled/>"; ?>
			</div>
			<div>
				<input type='text' placeholder="Password" required="" name='password' />
			</div>
			<div>
				<input type='text'  placeholder="Full name" required="" name='name' />
			</div>
			<div>
				<input type='text'  placeholder="Phone no." required="" name='phone' />
			</div>
			<div>
				<input type='text'  placeholder="Email" required="" name='email' />
			</div>
			<div>
				Profile photo : <input type='file' name='photo' />
			</div>
			<div>
				<input type="submit" name='submit' value="Register" />
				<a href="elcp.php"><< Home</a>
			</div>
		</form><!-- form -->
		<div class="button">
		E-Learning For C Programming&trade;</br>2013
		</div><!-- button -->
	</section><!-- content -->
	</br>
<?php
if(isset($_POST['submit']))
{
	if(($_FILES['photo']['type']!="image/jpeg")||($_FILES['photo']['size']>1222333))
	{
		echo "<body onload='alert(\"please choose a valid (.jpg) photo\")'>";
	}
	else if((strlen($_POST['password'])==0)||(strlen($_POST['name'])==0)||(strlen($_POST['phone'])==0)||(strlen($_POST['email'])==0))
	{
		echo "please fill up all the field";
	}
	else
	{
		$_POST['password']=md5($_POST['password']);
		$_POST['name']=strtoupper($_POST['name']);
		$_POST['email']=strtolower($_POST['email']);
		$photo_temp_name="user/".$newid.".jpg";
		move_uploaded_file($_FILES['photo']['tmp_name'],$photo_temp_name);
		if(mysqli_connect_errno($mysql))
		{
			echo "<h1>Database connection error.</h1>";
		}
		else
		{
			mysqli_query($mysql,"insert into user values('".$newid."','".$_POST['password']."','".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$photo_temp_name."')");
			echo "<body onload='js1(\"$newid\")'></body>";
		}
	}
}
mysqli_close($mysql);
?>
</div>