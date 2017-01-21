<?php
$subject="Password change";
$msg="www.google.com";
$from='yashbheda@ymail.com';

$email = $_POST['email'];
echo "You entered $email"."</br>";
if(empty($email))
{
	echo "Enter the email address!";
	exit();
}
	$dbc=mysqli_connect('localhost','root','','augmenteddb') or die("Error connecting to db");
	$query="SELECT email FROM LOGIN" or die ("Error querying db ($ query)");
	$result=mysqli_query($dbc,$query) or die("  Error querying db ($ result)");

				while($row=mysqli_fetch_array($result))
				{    
					
					if($email==$row['email'])
					{
						$to = $row['email'];
						$check=mail ($to,$subject,$msg,'From'.$from);
						
						echo "Please Check your email for link."."</br>";
						exit();
					}
					else
					{
						echo "Enter a registered email address!"."</br>";
						exit();
					}
				}

?>