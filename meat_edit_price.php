<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $meat_id = $_POST["meat_new_id"];
    $meat_price = $_POST["meat_price"];
    $meat_parts = $_POST["meat_parts"];
    $meat_type = $_POST["meat_type"];
    $purchased_location = $_POST["purchased_location"];
    $purchased_date = $_POST["purchased_date"];
    $supplier_id = $_POST["supplier"];
    $meat_disposed = $_POST["meat_disposed"];

    $sql_update = "UPDATE meat_db SET
                    meat_price='$meat_price',
                    meat_parts='$meat_parts',
                    meat_type='$meat_type',
                    purchased_location='$purchased_location',
                    purchased_date='$purchased_date',
                    supplier_id='$supplier_id',
                    meat_disposed='$meat_disposed'
                    WHERE id='$meat_id'";

    if ($connection->query($sql_update) === TRUE) {
        // Redirect to a page where the data is displayed
        header("Location: view_meat.php");
        exit;
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>
