<html>
<body>
<?php
	$name = $_POST['name1'];
	$email = $_POST['email1'];
	$phone = $_POST['phone1'];
	$to = "yashbheda3@gmail.com";
	$subject = "Requesting Workshop";
	$msg = "From: $email\n".
		"Phone: $phone\n".
		"Sir,\n".
		"I would like to join the workshop.".
		"Regards\n"
		"$name";
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