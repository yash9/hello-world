<html>
<body>
<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	$to = "yashbheda3@gmail.com";
	$subject = "Feedback for Sterling Events";
	$msg = "From: $email\n".
		"Sir".
		"$comment\n".
		"Regards\n".
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