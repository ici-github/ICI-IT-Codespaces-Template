<?php
$servername = "localhost";
$username = "mariadb";
password = "mariadb";
$dbname = "mariadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Sample query
$sql = "SELECT DATABASE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Database: " . $row["DATABASE()"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
