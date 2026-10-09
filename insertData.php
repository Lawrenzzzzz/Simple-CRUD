<?php
$conn = new mysqli("localhost", "root", "", "simple_crud");

// 2. We completely removed include 'index.php' 

if (isset($_GET['company'])){
    $company = $_GET['company'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];

    // 3. Fixed INSER to INSERT
    // 4. Added single quotes (' ') around the variables inside the VALUES brackets
    $sql = "INSERT INTO users (company, contact, country) VALUES ('$company', '$contact', '$country')";
    
    // 5. Added the missing semicolon here
    $conn->query($sql);

    header("Location: index.php");
    exit;
}
?>