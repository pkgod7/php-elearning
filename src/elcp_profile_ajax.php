<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$q=$_GET['text1'];
$q2=$_GET['text2'];
$q3=$_GET['text3'];
$q4=$_GET['text4'];
if((isset($q))&&(strlen($q)>0))
{
	$q=md5($q);
	$sql="update user set user_password='".$q."' where user_id='".$_SESSION['id']."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q2))
{
	$sql="update user set user_name='".$q2."' where user_id='".$_SESSION['id']."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q3))
{
	$sql="update user set user_phone_no='".$q3."' where user_id='".$_SESSION['id']."'";
	if(mysqli_connect_errno($mysql))
	{
		echo "cannot connect to database";
	}
	else
	{
		mysqli_query($mysql,$sql);
	}
}
if(isset($q4))
{
	$sql="update user set user_email='".$q4."' where user_id='".$_SESSION['id']."'";
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