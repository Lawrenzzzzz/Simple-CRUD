<?php
// 1. Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_crud";
$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Check if an ID was sent in the URL
if (isset($_GET['id'])) {
    
    // Grab the ID from the URL
    $id = $_GET['id'];
    
    // 3. The SQL DELETE command
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// 4. Send the user back to the main table instantly
header("Location: index.php");
exit;
?>