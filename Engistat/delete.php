<?php
$id=$_POST['delete'];
//echo $id;
	$dbc=mysqli_connect('localhost','root','','augmenteddb') or die("Error connecting to db");
	$query="DELETE FROM event WHERE id='$id'" or die("Error quering to db");
	$result=mysqli_query($dbc,$query);
	echo"Event Deleted";
	
?>