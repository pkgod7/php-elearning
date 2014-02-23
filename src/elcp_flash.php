<script>
function ajax1(p1,p2)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_flash_ajax.php?param1_1="+p1+"&param2_1="+p2,true);
	x1.send();
}
function ajax2(p1,p2)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_flash_ajax.php?param1_2="+p1+"&param2_2="+p2,true);
	x1.send();
}
function ajax3(p1,p2)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_flash_ajax.php?param1_3="+p1+"&param2_3="+p2,true);
	x1.send();
}
function ajax4(p1,p2)
{
	x1=new XMLHttpRequest();
	x1.open("GET","elcp_flash_ajax.php?param1_4="+p1+"&param2_4="+p2,true);
	x1.send();
}
</script>
<div align='center' >
<link rel="stylesheet" type="text/css" href="dynamicdrive.css">
<ul class="flatflipbuttons">
<li><a href="elcp_home.php"><span><img src='hyHome.png'/></span></a> <b>Home</b></li>
<li><a href="elcp_upload.php"><span><img src='hyUpload.png'/></span></a> <b>Upload</b></li>
<li><a href="elcp_flash.php"><span><img src='hyTutorial.png'/></span></a> <b>My Flash</b></li>
<li><a href="elcp_profile.php"><span><img src='hyProfile.png'/></span></a> <b>Profile</b></li>
<li><a href="elcp.php"><span><img src='hyLogout.png'/></span></a> <b>Logout</b></li>
</ul>
<div align='left' style=' height: 502px; width: 600px; font-size: 12px; overflow: auto;'>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: elcp.php");
}
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from flash where flash_author='".$_SESSION['id']."' order by flash_title";
if(mysqli_connect_errno($mysql))
{
	echo "cannot connect to database";
}
else
{
	$output=mysqli_query($mysql,$sql);
	while($raw=mysqli_fetch_array($output))
	{
		echo "<div style='width:500px;'>";
		echo "<div style='background-color:#D8D8D8;'><hr>";
		echo "<h3>Tutorial # ".$raw['flash_id']."&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;";
		$b=array("public","private");
		echo "<select onchange='ajax3(".$raw['flash_id'].",this.value)'>";
		for($i=0; $i<sizeof($b); $i++)
		{
			if($b[$i]==$raw['flash_privacy'])
			{
				$pk2=$b[$i];
				echo "<option selected>".$b[$i]."</option>";
			}
			else
			{
				echo "<option>".$b[$i]."</option>";
			}
		}
		echo "</select>";
		$a=array("easy","medium","xpert");
		echo "<select onchange='ajax2(".$raw['flash_id'].",this.value)'>";
		for($i=0; $i<sizeof($a); $i++)
		{
			if($a[$i]==$raw['flash_level'])
			{
				$pk1=$a[$i];
				echo "<option selected>".$a[$i]."</option>";
			}
			else
			{
				echo "<option>".$a[$i]."</option>";
			}
		}
		echo "</select>";
		echo "</h3><hr></div>";
		echo "<table bgcolor='#C0C0C0'><tr><td bgcolor='#FFFFFF'><object width='500' height='400' data='flash/".$raw['flash_file']."' ></object></td></tr></table>";
		echo "<b>Title&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; : </b><input type='text' size='50' onkeyup='ajax1(".$raw['flash_id'].",this.value)' value='".$raw['flash_title']."'/></br>";
		echo "<b>Description&#160; : </b><input type='text' size='50' onkeyup='ajax4(".$raw['flash_id'].",this.value)' value='".$raw['flash_note']."' /></br></br></br></br></br>";
		echo "</div>";
	}
}
mysqli_close($mysql);
?>
</div>
<font size="2" color="#FF9900">E-Learning For C Programming&trade; 2013</font>
</div>