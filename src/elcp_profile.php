<script>
function ajax1(text)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_profile_ajax.php?text1="+text,true);
	x1.send();
}
function ajax2(text)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_profile_ajax.php?text2="+text.toUpperCase(),true);
	x1.send();
}
function ajax3(text)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_profile_ajax.php?text3="+text,true);
	x1.send();
}
function ajax4(text)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_profile_ajax.php?text4="+text.toLowerCase(),true);
	x1.send();
}
function ClearFields()
{
     document.getElementById("pwd").value = "";
}
</script>
<div align='center'>
<link rel="stylesheet" type="text/css" href="dynamicdrive.css">
<ul class="flatflipbuttons">
<li><a href="elcp_home.php"><span><img src='hyHome.png'/></span></a> <b>Home</b></li>
<li><a href="elcp_upload.php"><span><img src='hyUpload.png'/></span></a> <b>Upload</b></li>
<li><a href="elcp_flash.php"><span><img src='hyTutorial.png'/></span></a> <b>My Flash</b></li>
<li><a href="elcp_profile.php"><span><img src='hyProfile.png'/></span></a> <b>Profile</b></li>
<li><a href="elcp.php"><span><img src='hyLogout.png'/></span></a> <b>Logout</b></li>
</ul>
<div style=' height: 502px; width: 550px; font-size: 12px; overflow: auto;'>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: elcp.php");
}
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from user where user_id='".$_SESSION['id']."'";
if(mysqli_connect_errno($mysql))
{
	echo "cannot connect to database";
}
else
{
	$output=mysqli_query($mysql,$sql);
	while($raw=mysqli_fetch_array($output))
	{
		echo "<table bgcolor='#D8D8D8 '>";
		echo "<tr>";
		echo "<td bgcolor='#FFFFFF' align='center'><img src='".$raw['user_photo']."' width='128' height='160' /></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td bgcolor='#FFFFFF'><form method='post' enctype='multipart/form-data'><input type='file' name='file'></br><input type='submit' name='submit' value='Change Photo'/></form>";
		
		if(isset($_POST['submit']))
		{
			if(($_FILES['file']['type']!="image/jpeg")||($_FILES['file']['size']>1222333))
			{
				echo "please choose a valid \"jpeg\" photo that below 1mb</br>";
			}
			else
			{
				$photo_temp_name=$_SESSION['id'].".jpg";
				move_uploaded_file($_FILES['file']['tmp_name'],"user/".$photo_temp_name);
				mysqli_query($mysql,"update user set user_photo='user/".$photo_temp_name."' where user_id='".$_SESSION['id']."'");
				header("Location: elcp_profile.php");
			}
		}
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "<table>";
		echo "<tr>";
		echo "<td>ID</td>";
		echo "<td><input type='text' size='2' value='".$raw['user_id']."' disabled></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Full Name</td>";
		echo "<td><input type='text' size='20' value='".$raw['user_name']."' onkeyup='ajax2(this.value)' disabled/></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Password</td>";
		echo "<td><input type='text' id='pwd' size='20' value='*****************************' onclick='ClearFields();' onkeyup='ajax1(this.value)' onClick='SelectAll(\"txtfld\");'/></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Phone No.</td>";
		echo "<td><input type='text' size='20' value='".$raw['user_phone_no']."' onkeyup='ajax3(this.value)' /></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Email</td>";
		echo "<td><input type='text' size='20' value='".$raw['user_email']."' onkeyup='ajax4(this.value)' /></td>";
		echo "</tr>";
		echo "</table>";
	}
}
mysqli_close($mysql);
?>
</div>
<font size="2" color="#FF9900">E-Learning For C Programming&trade; 2013</font>
</div>