<?php
include_once 'database/crud.php';
$result = getProducts();

function formatPrice($price) {
    return 'Rp' . number_format($price, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<h1 class="title">Product List</h1>
<div class="product-table-container">
    <table class="product-table">
        <thead>
        <tr>
            <th class="table-header">Name</th>
            <th class="table-header">Description</th>
            <th class="table-header">Price</th>
            <th class="table-header">Stock</th>
            <th class="table-header">Category</th>
            <th class="table-header">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr class="table-row">
                <td class="table-cell"><?php echo $row['name']; ?></td>
                <td class="table-cell"><?php echo $row['description']; ?></td>
                <td class="table-cell"><?php echo formatPrice($row['price']); ?></td>
                <td class="table-cell"><?php echo $row['stock']; ?></td>
                <td class="table-cell"><?php echo $row['category']; ?></td>
                <td class="table-cell">
                    <a class="btn btn-update" href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                    <a class="btn btn-delete" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<div>
    <a class="btn btn-add" href="create.php">Add New Product</a>
</div>
</body>
</html>
