<?php
error_reporting(E_ERROR|E_PARSE);
session_start();
$id=$_GET['p1'];
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from flash where flash_id=$id";
$sql2="select * from forum where forum_file=$id";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	$output=mysqli_query($mysql,$sql);
	$output2=mysqli_query($mysql,$sql2);
	while($raw=mysqli_fetch_array($output))
	{
		if($raw['flash_id']==$id)
		{
			echo "<table><tr><td><object width='500' height='400' data='flash/".$raw['flash_file']."'></object></td><td valign='baseline'><table><tr><td><div class='rightarrowdiv'><b>Title :</b></br>".$raw['flash_title']."</div></td></tr><tr><td><div class='rightarrowdiv'><b>Description :</b></br>".$raw['flash_note']."</div></td></tr></table></td></tr></table>";
		}
	}
	echo "</br><div id='demo'>";
	while($raw2=mysqli_fetch_array($output2))
	{
		echo "<div class='leftarrowdiv'><img width='35' height='35' src='user/".$raw2['forum_sender_id'].".jpg' /> ".$raw2['forum_sender']."</br>".$raw2['forum']."</div>";
	}
	echo "</div>";
	$temp2=mysqli_fetch_array(mysqli_query($mysql,"select forum_id from forum where forum_file=$id order by forum_id desc limit 1"));
	echo "<div class='leftarrowdiv'>Your opinion :</br><input type='text' id='pk1' size='100' onclick='Clear1()'/><button onclick='myFunction(".$id.",".($temp2[0]+1).",document.getElementById(\"pk1\").value)'>Post..</button></div>";
}
mysqli_close($mysql);
?>