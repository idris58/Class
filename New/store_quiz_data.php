<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name']) && isset($_POST['id'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    // Prepare SQL query to insert name and ID
    $sql = "INSERT INTO quiz_results (name, student_id) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $id);

    if ($stmt->execute()) {
        echo "Your data has been saved. Thank you!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
