<?php
include 'dp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO INVENTORY (product_name, category, quantity, price) 
            VALUES ('$product_name', '$category', $quantity, $price)";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST" action="">
        <label>Product Name:</label><br>
        <input type="text" name="product_name" required><br>
        <label>Category:</label><br>
        <input type="text" name="category" required><br>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>
        <button type="submit">Add Product</button>
    </form>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
