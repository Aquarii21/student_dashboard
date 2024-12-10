<?php 
include "dbconn.php";
include "read.php";
$users = read($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>
	<style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/abstract-light-background-with-some-geometric-patterns_1021219-526.jpg'); /* Specify the path to your image */
            background-size: cover; /* Ensure the image covers the entire viewport */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            background-attachment: fixed; /* Keep the background fixed during scroll */
            margin: 0;
            padding: 0;
            height: 100vh; /* Make sure the background covers the full viewport height */
        }
    </style>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="holder">
	<h2>Student Dashboard</h2>
       <a href="create.php" class="link">Add Student Name</a>
      <?php if (isset($_GET['success'])) { ?>
     	<p class="success">
     	   <?=htmlspecialchars($_GET['success'])?>
     	</p>
     <?php } ?>
       <?php if ($users != 0) { ?>
        <table>
	<tr>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Action</td>
	</tr>	
       <?php	
        foreach ($users as $user) {
       	?>
      
	<tr>
		<td><?=$user['id']?></td>
		<td><?=$user['first_name']?></td>
		<td><?=$user['last_name']?></td>
		<td><?=$user['email']?></td>
		<td>
			<a href="update.php?id=<?=$user['id']?>" class="btn btn-update">Update</a>
			<a href="delete.php?id=<?=$user['id']?>" class="btn btn-delete">Delete</a>
		</td>
	</tr>
       
       <?php } ?> 
       </table>
       <?php }else { ?>
       	<p class="error">ERROR: No data found in the Database.</p>
       <?php } ?>
       </div>
</body>
</html>