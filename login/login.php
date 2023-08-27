<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login-table";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the registration form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Prepare the SQL query with parameterized statement to prevent SQL injection
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
           header('Location:home.html');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>