<script>
function js1(p1)
{
	if(window.confirm('upload success : '+p1))
	{
        window.location.href='elcp_home.php';
    }
}
function ClearFields1()
{
     document.getElementById("title").value = "";
}
function ClearFields2()
{
     document.getElementById("note").value = "";
}
</script>
<div align='center' border='1'>
<link rel="stylesheet" type="text/css" href="dynamicdrive.css">
<ul class="flatflipbuttons">
<li><a href="elcp_home.php"><span><img src='hyHome.png'/></span></a> <b>Home</b></li>
<li><a href="elcp_upload.php"><span><img src='hyUpload.png'/></span></a> <b>Upload</b></li>
<li><a href="elcp_flash.php"><span><img src='hyTutorial.png'/></span></a> <b>My Flash</b></li>
<li><a href="elcp_profile.php"><span><img src='hyProfile.png'/></span></a> <b>Profile</b></li>
<li><a href="elcp.php"><span><img src='hyLogout.png'/></span></a> <b>Logout</b></li>
</ul>
<div align='left' style=' height: 502px; width: 350px; font-size: 12px; overflow: auto;'>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: elcp.php");
}
error_reporting(E_ERROR|E_PARSE);
$raw=mysqli_fetch_array(mysqli_query(mysqli_connect("localhost","root","","test"),"select flash_id from flash order by flash_id desc limit 1"));
echo "<form method='post' enctype='multipart/form-data'>";
echo "File ID :</br><input type='text' value='".($raw[0]+1)."' size='1' disabled></br></br>";
echo "Title :</br><input type='text' value='Title' id='title' name='title' size='50' onclick='ClearFields1();'></br></br>";
echo "Description :</br><input type='text' value='Description' id='note' name='note' size='50' onclick='ClearFields2();'></br></br>";
echo "Flash file(.swf) :</br><input type='file' id='flash' name='flash'></br></br>";
echo "Sharing :</br><select name='privacy'>";
echo "<option value='public' checked>public</option>";
echo "<option value='private'>private</option>";
echo "</select></br></br>";
echo "Level :</br><select name='level'>";
echo "<option value='easy'>easy</option>";
echo "<option value='medium'>medium</option>";
echo "<option value='xpert'>xpert</option>";
echo "</select></br></br>";
echo "Author :</br><input type='text' value='".$_SESSION['id']."' size='1' disabled><hr>";
echo "<input type='submit' name ='submit' value='Upload'>";
echo "</form>";
if(isset($_POST['submit']))
{
	$newName=($raw[0]+1).".swf";
	/*echo ($raw[0]+1)."</br>";
	echo $_POST['title']."</br>";
	echo $_POST['note']."</br>";
	echo $newName."</br>";
	echo $_POST['privacy']."</br>";
	echo $_POST['level']."</br>";
	echo $_SESSION['id']."</br></br>";*/
	if(substr($_FILES['flash']['name'],-3)!="swf")
	{
		echo "<body onload='alert(\"please choose a valid flash file(.swf)\")'>";
	}
	else
	{
		move_uploaded_file($_FILES['flash']['tmp_name'],"flash/".$newName);
		mysqli_query(mysqli_connect("localhost","root","","test"),"insert into flash values('".($raw[0]+1)."','".$_POST['title']."','".$_POST['note']."','".$newName."','".$_POST['privacy']."','".$_POST['level']."','".$_SESSION['id']."')");
		echo "<body onload='js1(\"".$_POST['title']."\")'></body>";
	}
}
?>
</div>
<font size="2" color="#FF9900">E-Learning For C Programming&trade; 2013</font>
</div>