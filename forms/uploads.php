<?php
    $dbhost = 'localhost';
	$username = 'root';
	$password = '';
	$dbselect = "foodkrafts";
	$conn = new mysqli($dbhost, $username, $password, $dbselect );
	if($conn) {
		echo "Database successfully connected";
	}
	
	if(isset($_POST['uploadfilesub'])) {
	
	$filename = $_FILES['uploadfile']['name'];
	$filetmpname = $_FILES['uploadfile']['tmp_name'];
	$folder = 'uploads/';

	move_uploaded_file($filename, $folder.$filename);

	
	$sql = "Insert into 'shared_receipe'('pic') Values('$filename')"; 
	$qry = mysqli_query($conn, $sql);

	if($qry) {
		echo "image uploaded";
	}

	}

	/*if(isset($_POST['Submit'])) {
	$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
	}
	*/
	?>