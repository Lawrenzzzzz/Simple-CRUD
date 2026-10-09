<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_crud";


$conn = new mysqli ($servername, $username, $password, $dbname);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 15px;
            justify-self: center
        }

        .input-area{
            width: 100%;
            text-align: center;
        }
        input{
            height: 30px;
            margin: 10px;
            padding: 5px;
        }
        button{
            height: 40px;
        }
    </style>
</head>

<body>
    <form action="insertData.php" method="POST">
    <div class="input-area">
        <input type="text" name="company" placeholder="Enter your Company" required>
        <input type="text" name="contact" placeholder="Enter your Contact" required>
        <input type="text" name="country" placeholder="Enter your Country" required>
        <button type="submit">Submit</button>
    </div>
    </form> 

    <table id="myTable" width=70%>
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * from users");

        if ($result ->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row['company'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>
                    <a href='update.php?id=" . $row['id'] . "'><button type='button'>Edit</button></a> 
                    <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this?\")'><button type='button'>Delete</button></a>
                    </td>";
                echo "</tr>";
                }
        }

        ?>
    </table>
    


</body>
</html>