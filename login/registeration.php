<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register-table";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the registration form is submitted
if (isset($_POST['submit'])) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];


    // Prepare the SQL query with parameterized statement to prevent SQL injection
    $sql = "INSERT INTO register (fname, lname, age, email, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiss",$fname,$lname,$age,$email,$gender );

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