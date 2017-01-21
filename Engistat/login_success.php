<?php
session_start();
if(!$_SESSION['user']="user"){
header("location:login.html");
}
?>

<html>
<head>
			<style>
					table, th, td 
				{
   				    border: 1px solid black;
   				    border-collapse: collapse;
				}
			</style>
</head>
<body>
<input type="button" value="LOGOUT" onclick="location.href='login.html';">
<div>
<hr><center><h1>HOME</h1></center><hr>
<form name="eventinfo" action="login_success.php" method="POST">

<label for="event" name="event">Event name:</label></br>
<input type="text" name="event" id="event"></br>
 
<label for="date" name="date">Event date:</label></br>
<input type="date" name="date" id="date"></br>
 
<label for="info" name="info"> Event details:</label></br>
<textarea name="info" id="info" rows="9" cols="60"></textarea></br></br>

<input type="submit" value="Submit"></t>
<input type="button" value="Reset id" onclick="<?php 
$dbc=mysqli_connect('localhost','root','','augmenteddb') or die('Error connecting to db');
$check="ALTER TABLE event AUTO_INCREMENT=1" or die ("error querying db(check)");
$re=mysqli_query($dbc,$check) or die ("error querying at re");
?>"></br></br>
</form>
DELETE EVENT::</br>
<form name="deleteform" action="delete.php" method="POST">
<label for="delete" name="delete">EVENT ID:</label></br>
<input type="text" id="delete" name="delete"></br>
<input type="submit" value="Delete">
</form>
<hr>
</div>
<div>
	<?php
	if(isset($_POST['event']))
	{
		$name=$_POST['event'];
	}
		if(isset($_POST['date']))
	{
		$date=$_POST['date'];
	}
		if(isset($_POST['info']))
	{
		$info=$_POST['info'];
	}

	
			$dbc=mysqli_connect('localhost','root','','augmenteddb') or die('Error connecting to db');
			
			if(!empty($name) && !empty($date) && !empty($info))
			{
			echo "Last entered event:</br>";
			echo "NAME: ".$name."</t> ";
			echo "DATE: ".$date."</t></br>";
			echo "INFO: ".$info."</t>";
			$query="INSERT INTO event (name,date,info) VALUES ('$name','$date','$info')" or die('Error connecting to db(query)');
			$result=mysqli_query($dbc,$query) or die ('Error querying db(result)');
			}


			$query2="SELECT * FROM event" or die('Error connecting to db(query2)');
			$result2=mysqli_query($dbc,$query2) or die ('Error querying (result2)');
					echo '<table style="width:50%">';
					while($row=mysqli_fetch_array($result2))
					{
					echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['date']."</td></tr>";
					}
					echo '</table>';
					exit;
		?>

</div>
</body>
</html>