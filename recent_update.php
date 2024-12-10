<?php
// Database connection
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$database = 'student_dashboard'; 

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the most recently updated clients (sorted by updated_at DESC)
$sql = "SELECT * FROM clients ORDER BY updated_at DESC LIMIT 10"; // Fetch top 10 recently updated clients
$result = $conn->query($sql);

// Close the connection after fetching the results
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recently Updated Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Main Container -->
    <div class="holder">
        <h2>Recently Updated Clients</h2>
        
        
        <a href="create2.php" class="btn-back">Back to Dashboard</a>

        <!-- Table to show recently updated clients -->
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if we have any clients
                if ($result->num_rows > 0) {
                    // Loop through and display each client
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No recent updates</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn-create-new">Create New Client</a>
    </div>

</body>
</html>
