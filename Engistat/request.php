<html>

<body>
<?php

	$dbc=mysqli_connect('localhost','root','','augmenteddb') or die("Error connecting to db");

    $name="";
    $email="";
    $phone="";
    $desig="";
    $org="";
    $msg="";

    if(isset($_POST['name']))
    {$name = $_POST['name'];}

	if(isset($_POST['email']))
	{$email = $_POST['email'];}

	if(isset($_POST['phone']))
	{$phone = $_POST['phone'];}

	if(isset($_POST['desig']))
	{$desig = $_POST['desig'];}

	if(isset($_POST['org']))
	{$org = $_POST['org'];}

	if(isset($_POST['msg']))
	{$msg = $_POST['msg'];}

	    echo $name;
	    echo $email;
	    echo $phone;
	    echo $desig;
	    echo $org;
	    echo $msg;

if(isset($_POST["submit"]))
{
	    echo "check submit:set";
	    echo $name;
	    echo $email;
	    echo $phone;
	    echo $desig;
	    echo $org;
	    echo $msg;
	    $query="INSERT INTO request VALUES ('$name','$email','$phone','$desig','$org','$msg')" or die ("Error Querying db ($ query)");
        $result=mysqli_query($dbc, $query) or die ("Error Querying db ($ result)");
}

	$to = "yashbheda3@gmail.com";
	$subject = "Requesting Workshop";
	$msg = "From: $email\n".
		"Phone: $phone\n".
		"Sir,\n".
		"$msg".
		"Regards\n".
		"$name\n".
		"$desig\n".
		"$org";
	$check=mail($to, $subject,$msg);

	if($check==1)
	{
		echo '<script>alert("Thank you for the Feedback");</script>';
	}
	else
	{
		echo '<script>alert("The feedback could not be sent. Please try again.");</script>';	
	}
	?>
</body>
</html>
