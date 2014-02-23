<script>
function ajax1(p1)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_home_ajax.php?p1="+p1,true);
	x1.onreadystatechange=function()
	{
		document.getElementById("youtube").innerHTML=x1.responseText;
	}
	x1.send();
}
function myFunction(p1,p2,p3)
{
//document.getElementById('hide').style.display='none';
	x2=new XMLHttpRequest();
	x2.open("GET","elcp_home_forum.php?p1="+p1+"&p2="+p2+"&p3="+p3,true);
	x2.onreadystatechange=function()
	{
		document.getElementById("demo").innerHTML=x2.responseText;
	}
	x2.send();
}
function Clear1()
{
     document.getElementById("pk1").value = "";
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
<form method='post' action=''>
<img width='10' height='10' src='hyHome.png' />
<input type='text' name='q' size='25'>
<select name='l'>
<option selected>all</option>
<option>easy</option>
<option>medium</option>
<option>xpert</option>
</select>
<input type='submit' name='submit' value='Search' />
</form>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: elcp.php");
}
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
echo "<table>";
echo "<tr>";
echo "<td><div style='border:2px solid #d8d8d8; height: 450px; width: 800px; font-size: 12px; overflow: auto;'><p id='youtube'></p></div></td>";
echo "<td valign='baseline'><div style='border:2px solid #d8d8d8; height: 450px; width:200px; overflow: auto;'>";
if(isset($_POST['submit']))
{
	if($_POST['l']=="all")
	{
		$sql="select * from flash where flash_privacy='public' and flash_title like '%".$_POST[q]."%' order by flash_level,flash_title";
	}
	else
	{
		$sql="select * from flash where flash_privacy='public' and flash_title like '%".$_POST[q]."%' and flash_level='".$_POST['l']."' order by flash_level,flash_title";
	}
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		$output=mysqli_query($mysql,$sql);
		while($raw=mysqli_fetch_array($output))
		{
			echo "<button style='width:100%; text-align:left; background-color:#FFFFFF; ' onclick='ajax1(\"".$raw['flash_id']."\")'>";
			echo $raw['flash_title']."</br>";
			if($raw['flash_level']=="easy")
			{
				echo "<img width='30' height='10' src='easy.png' />";
			}
			else if($raw['flash_level']=="medium")
			{
				echo "<img width='30' height='10' src='medium.png' />";
			}
			else if($raw['flash_level']=="xpert")
			{
				echo "<img width='30' height='10' src='xpert.png' />";
			}
			echo "</button>";
		}
	}
}
else
{
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		$sql="select * from flash where flash_privacy='public' and flash_title like '%".$_POST[q]."%' order by flash_level,flash_title";
		$output=mysqli_query($mysql,$sql);
		while($raw=mysqli_fetch_array($output))
		{
			echo "<button style='width:100%; text-align:left; background-color:#FFFFFF;' onclick='ajax1(\"".$raw['flash_id']."\")'>";
			echo $raw['flash_title']."</br>";
			if($raw['flash_level']=="easy")
			{
				echo "<img width='30' height='10' src='easy.png' />";
			}
			else if($raw['flash_level']=="medium")
			{
				echo "<img width='30' height='10' src='medium.png' />";
			}
			else if($raw['flash_level']=="xpert")
			{
				echo "<img width='30' height='10' src='xpert.png' />";
			}
			echo "</button>";
		}
	}
}
echo "</div></td>";
echo "</tr>";
echo "</table>";
mysqli_close($mysql);
?>
<font size="2" color="#FF9900">E-Learning For C Programming&trade; 2013</font>
</div>