<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    if ( !empty($_POST["name"]) && !empty($_POST["location"])) {

        $name = $_POST["name"];
        $location = $_POST["location"];

        // Prepare and bind the SQL statement
        $stmt = $connection->prepare("INSERT INTO supplier ( name, location) VALUES ( ?, ?)");
        $stmt->bind_param("ss", $name, $location);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header("Location: supplier_registration.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
$connection->close();
?>
