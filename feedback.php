<?php
	$dbhost='localhost';
	$username='root';
	$password='';
	$dbselect="foodkrafts";
	$con=mysqli_connect($dbhost,$username,$password,$dbselect);
	
	if ($con)
	{	
	echo "Database connected successfully";
 
	}
		
	$sql_stmt = "SELECT * FROM feedback"; 
    //SQL select query 
    
    $result = mysqli_query($con,$sql_stmt);
     //execute SQL statement 
     
	if (!$result)     
		die("Database access failed: " . mysqli_connect_error()); 
    	//output error message if query execution failed 
        
		$rows = mysqli_num_rows($result); 
   		// get number of rows returned 
    
	if ($rows) {     
    
	while ($row = mysqli_fetch_array($result)) {  
	echo ' ';
		echo 'ID: ' . $row['id'] . '<br>';         
		echo 'Full Names: ' . $row['name'] . '<br>';        
		echo 'Email: ' . $row['email'] . '<br>';
		echo 'Subject: ' . $row['subject'] . '<br>';
		echo 'Message: ' . $row['message'] . '<br>';
		echo '    ' ;

	} 

} 
mysqli_close($con); //close the database connection 
?>
