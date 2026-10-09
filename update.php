<?php
// 1. Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_crud";
$conn = new mysqli($servername, $username, $password, $dbname);

// ==========================================
// THE GET PART (Fills the boxes with old data)
// ==========================================
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ask the database for just this one specific row
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
} else {
    // If someone visits this page without an ID, kick them back to the main page
    header("Location: index.php");
    exit;
}


// ==========================================
// THE POST PART (Saves the changes)
// ==========================================
if (isset($_POST['update_id'])) {
    $id = $_POST['update_id'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];

    // The SQL UPDATE command
    $sql = "UPDATE users SET company='$company', contact='$contact', country='$country' WHERE id=$id";
    $conn->query($sql);

    // Send the user back to the main page
    header("Location: index.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <style>
        .input-area { width: 100%; text-align: center; margin-top: 50px; }
        input { height: 30px; margin: 10px; padding: 5px; }
        button { height: 40px; cursor: pointer; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Update Record</h2>

    <div class="input-area">
        <form action="update.php" method="POST">
            <!-- THE MAGIC TRICK: A hidden input to remember which row we are updating -->
            <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
            
            <!-- Notice the 'value' attributes. This is how we pre-fill the boxes! -->
            <input type="text" name="company" value="<?php echo $row['company']; ?>" required>
            <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required>
            <input type="text" name="country" value="<?php echo $row['country']; ?>" required>
            
            <button type="submit">Save Changes</button>
            <a href="index.php"><button type="button">Cancel</button></a>
        </form>
    </div>

</body>
</html>