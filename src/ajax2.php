<?php

/* text suggestion
error_reporting(E_ERROR|E_PARSE);
$text=$_GET["text"];
$a1=array("Optimus Prime","Ollando");
$hint="";
if(strlen($text)>0)
{
	for($i=0; $i<count($a1); $i++)
	{
		if(strtolower($text)==strtolower(substr($a1[$i],0,strlen($text))))
		{
			if($hint=="")
			{
				$hint=$a1[$i];
			}
			else
			{
				$hint=$hint." , ".$a1[$i];
			}
		}
	}
}
if($hint=="")
{
	echo "no suggestion";
}
else
{
	echo $hint;
}
*/

/* database select
error_reporting(E_ERROR|E_PARSE);
$q=$_GET['text'];
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from user where user_id='".$q."'";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	$output=mysqli_query($mysql,$sql);
	while($raw=mysqli_fetch_array($output))
	{
		echo $raw['user_id']." ".$raw['user_password']."</br>";
	}
}
mysqli_close($mysql);
*/

/* database insert
error_reporting(E_ERROR|E_PARSE);
$q=$_GET['text'];
$mysql=mysqli_connect("localhost","root","","test");
$sql1="insert into student values('".$q."','123')";
$sql2="select * from student";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql1);
	$output=mysqli_query($mysql,$sql2);
	while($raw=mysqli_fetch_array($output))
	{
		echo $raw['student_id']."</br>";
	}
}
mysqli_close($mysql);
*/

/* database update
error_reporting(E_ERROR|E_PARSE);
$q=$_GET['text'];
$mysql=mysqli_connect("localhost","root","","test");
$sql1="update student set student_password='saif' where student_id='".$q."'";
$sql2="select * from student";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql1);
	$output=mysqli_query($mysql,$sql2);
	while($raw=mysqli_fetch_array($output))
	{
		echo $raw['student_id']." ".$raw['student_password']."</br>";
	}
}
mysqli_close($mysql);
*/

/* database delete
error_reporting(E_ERROR|E_PARSE);
$q=$_GET['text'];
$mysql=mysqli_connect("localhost","root","","test");
$sql1="delete from student where student_id='".$q."'";
$sql2="select * from student";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql1);
	$output=mysqli_query($mysql,$sql2);
	while($raw=mysqli_fetch_array($output))
	{
		echo $raw['student_id']." ".$raw['student_password']."</br>";
	}
}
mysqli_close($mysql);
*/

?>