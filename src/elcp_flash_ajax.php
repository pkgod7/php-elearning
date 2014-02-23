<?php
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$q1_1=$_GET['param1_1'];
$q2_1=$_GET['param2_1'];
$q1_2=$_GET['param1_2'];
$q2_2=$_GET['param2_2'];
$q1_3=$_GET['param1_3'];
$q2_3=$_GET['param2_3'];
$q1_4=$_GET['param1_4'];
$q2_4=$_GET['param2_4'];
if(isset($q1_1))
{
	$sql="update flash set flash_title='".$q2_1."' where flash_id='".$q1_1."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q1_2))
{
	$sql="update flash set flash_level='".$q2_2."' where flash_id='".$q1_2."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q1_3))
{
	$sql="update flash set flash_privacy='".$q2_3."' where flash_id='".$q1_3."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q1_4))
{
	$sql="update flash set flash_note='".$q2_4."' where flash_id='".$q1_4."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
mysqli_close($mysql);
?>