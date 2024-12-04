<?php
include 'dp.php';

$order_by = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$sql = "SELECT * FROM INVENTORY ORDER BY $order_by";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inventory</title>
</head>
<body>
    <h1>Inventory</h1>
    <table border="1">
        <thead>
            <tr>
                <th><a href="?sort=id">ID</a></th>
                <th><a href="?sort=product_name">Product Name</a></th>
                <th><a href="?sort=category">Category</a></th>
                <th><a href="?sort=quantity">Quantity</a></th>
                <th><a href="?sort=price">Price</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['product_name']}</td>
                            <td>{$row['category']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['price']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
