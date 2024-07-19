<?php
// Establish connection to the database
include 'db.php';

// Get data sent from AJAX
$data = json_decode(file_get_contents("php://input"), true);

$currentDate = date('Y-m-d');

// Insert data into database
foreach ($data as $item) {
    $title = $item["title"];
    $price = $item["price"];
    $quantity = $item["quantity"];
    $subtotalAmount = $item["subtotal_amount"];
    $sugarOption = $item["sugarOption"];
    $size = $item["size"]; // Get the size option

    $sql = "INSERT INTO orders (title, price, quantity, subtotal_amount, date, invoice_number, user_id, size) 
            VALUES ('$title', '$price', '$quantity', '$subtotalAmount', '$currentDate', '$item[invoice_number]', '$item[user_id]', '$size')";
    $conn->query($sql);
}

// Close connection
$conn->close();
?>
