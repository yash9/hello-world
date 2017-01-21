<?php
	$dbc=mysqli_connect('localhost','root','','augmenteddb	') or die("Error connecting to db");
	$pass=$_POST['changepass'];
	$email=$_POST['email'];
	$flag=0;
	if(empty($pass))
	{
		//echo"Enter the password </br>";

	}
	$user=$_POST['email'];
	if (empty($email))
	{
		//echo "Enter a valid emailid";
	}
	$query1="SELECT email FROM login"or die ("Error querying database ($ query1)");
		$result1=mysqli_query($dbc,$query1) or die("  Error querying db ($ result1)");
		
		while($row=mysqli_fetch_array($result1))
		{
			if($email==$row['email'] && !empty($pass))
			{
				$flag=1;	
				$query="UPDATE login SET pass='$pass' WHERE email='$email'" or die ("Error querying database ($ query)");
				$result=mysqli_query($dbc,$query) or die("  Error querying db ($ result)");
				echo "Password succesfully changed";
			}


		}
			if($flag==0)
			{
				echo "</br>Please Enter valid emailid and password";
				?>
				</br>
				<form name="changepassword" action="changepass.php" method="POST">
				<label for="email" name="email">Enter your emailid:</label></br>
				<input type="text" name="email" id="email"></br>
				<label for="changepass" name="changepass">Enter new password:</label></br>
				<input type="text" name="changepass" id="changepass"></br>
				<input type="submit" value="change">
				</form>
				<?php

			}
	?>
