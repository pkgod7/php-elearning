<?php
error_reporting(E_ERROR|E_PARSE);
session_start();
$q1=$_GET['p1'];
$q2=$_GET['p2'];
$q3=$_GET['p3'];

if(strlen($q3)==0)
{
	$q3="null";
}
$id=$q1;
$temp=mysqli_fetch_array(mysqli_query(mysqli_connect("localhost","root","","test"),"select forum_id from forum where forum_file=$id order by forum_id desc limit 1"));
$q2=($temp[0]+1);
mysqli_query(mysqli_connect("localhost","root","","test"),"insert into forum values('".$q1."','".$q2."','".$_SESSION['id']."','".$_SESSION['name']."','".$q3."')");
$output2=mysqli_query(mysqli_connect("localhost","root","","test"),"select * from forum where forum_file=$q1");
while($raw2=mysqli_fetch_array($output2))
{
	echo "<div class='leftarrowdiv'><img width='35' height='35' src='user/".$raw2['forum_sender_id'].".jpg' /> ".$raw2['forum_sender']."</br>".$raw2['forum']."</br></div>";
}
?>