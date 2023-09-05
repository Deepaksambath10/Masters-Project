<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish a database connection
    $conn = new mysqli("localhost", "username", "password", "database");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User exists.";
        // You can do further processing here
    } else {
        echo "User does not exist.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
