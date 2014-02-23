<?php

/* hello world
echo "hello world";
*/

/* check submit
echo "<form method='post'>";
echo "<input type='submit' name='submit'>";
echo "</form>";
if(isset($_POST['submit']))
{
	echo "you just submit a button";
}
*/

/* $_POST value
echo "<form method='post'>";
echo "<input type='text' name='text'></br>";
echo "<input type='submit' name='submit'>";
echo "</form>";
if(isset($_POST['submit']))
{
	echo $_POST['text'];
}
*/

/* database select
$output=mysqli_query(mysqli_connect("localhost","root","","test"),"select * from user");
while($raw=mysqli_fetch_array($output))
{
	echo $raw['user_id']." x ";
}
*/

$link = mysql_connect('localhost','root','');
mysql_select_db("test",$link);
$result=mysql_query("select * from aflash order by flash_id");
while($row = mysql_fetch_array($result))
{
    echo $row["flash_id"]."</br>";
}

/* database insert
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="insert into student values('tp009','saif')";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql);
}
mysqli_close($mysql);
*/

/* database update
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="update student set student_password='123' where student_id='tp009'";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql);
}
mysqli_close($mysql);
*/

/* database delete
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="delete from student where student_id='tp009'";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	mysqli_query($mysql,$sql);
}
mysqli_close($mysql);
*/

/* student login
echo "<form method='post'>";
echo "Student ID : <input type='text' name='student_id'></br>";
echo "Password : <input type='password' name='student_password'></br>";
echo "<input type='submit' name='login'>";
echo "</form>";
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from student";
if(isset($_POST['login']))
{
	if(mysqli_connect_errno($mysql))
	{
		echo "<h1>Database connection error.</h1>";
	}
	else
	{
		$authority="false";
		$output=mysqli_query($mysql,$sql);
		while($raw=mysqli_fetch_array($output))
		{
			if($raw['student_id']==$_POST['student_id'])
			{
				if($raw['student_password']==$_POST['student_password'])
				{
					$authority="true";
				}
			}
		}
		if($authority=="true")
		{
			echo "Login success.";
		}
		else if($authority=="false")
		{
			echo "Login fail.";
		}
	}
	mysqli_close($mysql);
}
*/

/* swf
echo "<object width='100' height='200' data='a.swf'>";
*/

/* difficulty star
error_reporting(E_ERROR|E_PARSE);
$mysql=mysqli_connect("localhost","root","","test");
$sql="select * from flash";
if(mysqli_connect_errno($mysql))
{
	echo "<h1>Database connection error.</h1>";
}
else
{
	$output=mysqli_query($mysql,$sql);
	while($raw=mysqli_fetch_array($output))
	{
		echo $raw['flash_id'];
		if($raw['flash_level']=="easy")
		{
			echo "<img src='easy.png'/>";
		}
		else if($raw['flash_level']=="medium")
		{
			echo "<img src='medium.png'/>";
		}
		else if($raw['flash_level']=="hard")
		{
			echo "<img src='hard.png'/>";
		}
		echo "</br>";
	}
}
mysqli_close($mysql);
*/

/* upload
echo "<form method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='file'></br>";
echo "<input type='submit'>";
echo "</form>";
echo $_FILES['file']['name']."</br>";
echo $_FILES['file']['size']."</br>";
echo $_FILES['file']['type']."</br>";
echo $_FILES['file']['tmp_name']."</br>";
*/

/* create folder
mkdir('test1',0777,true);
*/

/* move upload
echo "<form method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='file'></br>";
echo "<input type='submit'>";
echo "</form>";
move_uploaded_file($_FILES['file']['tmp_name'],"pk.swf");
*/

/* upload type
echo "<form method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='file'></br>";
echo "<input type='submit'>";
echo "</form>";
echo $_FILES['file']['name']."</br>";
echo strtolower(substr($_FILES['file']['name'],strpos($_FILES['file']['name'],'.')));
*/

/* upload size
echo "<form method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='file'></br>";
echo "<input type='submit'>";
echo "</form>";
if($_FILES['file']['size']>1606670)
{
	echo "<h1>File size exceed 1.5MB limit.</h1>";
}
else
{
	echo $_FILES['file']['size']."</br>";
}
*/

/* session
//1st page
session_start();
$_SESSION['id']='TP007';
//2nd page
session_start();
echo $_SESSION['id'];
//3rd page
session_start();
session_destroy();
*/

/* select default
echo "<select>";
$a=array("easy","medium","hard");
for($i=0; $i<sizeof($a); $i++)
{
	if($a[$i]=="hard")
	{
		echo "<option selected>".$a[$i]."</option>";
	}
	else
	{
		echo "<option>".$a[$i]."</option>";
	}
}
echo "</select>";
*/

/* dl
echo "<form method='post' action='dl.php'>";
echo "<button type='submit' name='submit' value='hard.png'>Download!</button>";
echo "</form>";
*/

/* substring
$x="flash/2.c";
echo substr($x,6);
*/

/* md5
MD5 means a 128-bit encryption algorithm, generating a 32-character hexadecimal hash, whatever the captcha. This algorithm is not reversible, ie it is normally impossible to find the original word from the md5 hash.
MD5 (Message Digest algorithm, 5th version) is an algorithm which converts a given sequence of characters into another unique sequence of characters, with a fixed length, called "hash". For instance, the MD5 hash of the word "admin" is "21232f297a57a5a743894a0e4a801fc3".
These hashes are mostly used to validate file integrity, to encrypt sensitive data (like passwords), and to generate unique identifiers.
MD5 hashes are theoretically impossible to reverse directly, ie, it is not possible to retrieve the original string from a given hash using only mathematical operations.
Most web sites and applications store their user passwords into databases with MD5 encryption. This method appears to be safe as it seems impossible to retrieve original user passwords if, say, a hacker manages to have a look at the database content.
Unfortunately, there is a way to decrypt a MD5 hash, using a dictionary populated with strings and their MD5 counterpart. As most users use very simple passwords (like "123456", "password", "abc123", etc), MD5 dictionaries make them very easy to retrieve.
This website uses a MD5 reverse dictionary containing several millions of entries, which you can use with MD5 hashes from your application.
echo md5("a");
*/

/* remove special character
function clean($string)
{
	$string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
$x="k ,./@\-\\//";
$x=clean($x);
echo $x;
*/

/* css
echo "<link rel='stylesheet' type='text/css' href='dynamicdrive.css'>";
echo "<div class='leftarrowdiv'>This is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaaThis is a testaa</div>";
echo "<div class='leftarrowdiv'>This is a test</div>";
*/



?>