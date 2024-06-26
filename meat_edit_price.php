<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $meat_id = $_POST["meat_new_id"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $name = $_POST["name"];
    $weight = $_POST["weight"];
    $received_date = $_POST["received_date"];
    $batch_number = $_POST["batch_number"];
    $expiry_date = $_POST["expiry_date"];
    $supplier = $_POST["supplier"];


    $sql_update = "UPDATE products SET
                    name='$name',
                    category='$category',
                    weight='$weight',
                    price='$price',
                    expiry_date='$expiry_date',
                    batch_number='$batch_number',
                    received_date='$received_date',
                    supplier='$supplier'

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
