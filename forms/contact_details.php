<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(!empty($name) || !empty($email) || !empty(subject) || !empty($message))
{	
	$dbhost = 'localhost';
	$username = 'root';
	$password = '';
	$dbselect = "foodkrafts";
	
	$conn = new mysqli($dbhost, $username, $password, $dbselect );

	if(mysqli_connect_error()) {
		die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
	} else {
		$SELECT = "SELECT email From feedback Where email = ? Limit 1";
		$INSERT = "INSERT into feedback (name, email, subject, message) values(?, ?, ?, ?)";

		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$rnum = $stmt->num_rows;
       
	   if($rnum==0) {
	   	   $stmt->close();

		   $stmt = $conn->prepare($INSERT);
		   $stmt->bind_param("ssss", $name, $email, $subject, $message);
		   $stmt->execute();
		   echo " Your Query is submitted";
		} else {
			echo "Somebody already submitted with this email";
		}
		$stmt->close();
		}

} else {
	echo " All fields are required";
	die();
}

?>