<?php 

if (isset($_POST['first_name']) &&
	isset($_POST['last_name'])  &&
	isset($_POST['email'])
   ) {
	include "dbconn.php";

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];


	if (empty($first_name) || 
		empty($last_name)  || 
		empty($email)) {
		$em = "Please fill out all fields";
	   header("Location: create.php?error=$em");
	}else {
        $sql = "INSERT INTO users(first_name, last_name, email) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email]);

        $sm = "Successfully created";
	    header("Location: index.php?success=$sm");
	}
}