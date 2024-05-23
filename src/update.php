<?php
global $conn;
include_once 'database/crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    if (updateProduct($id, $name, $description, $price, $stock, $category)) {
        header("Location: index.php");
        exit();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM products WHERE id='$id'");
    $product = $result->fetch_assoc();
}

$categories = ["Electronics", "Books", "Clothing", "Sports", "Home"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/create.css">
</head>
<body>
<h1 class="title">Update Product</h1>
<div class="form-container">
    <form method="post" class="product-form" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" value="<?php echo $product['price']; ?>"
                   required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" value="<?php echo $product['stock']; ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="" disabled>Select a category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category; ?>" <?php echo $product['category'] == $category ? 'selected' : ''; ?>><?php echo $category; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="btn-group">
            <input type="submit" value="Update" class="btn btn-submit">
            <a class="btn btn-cancel" href="index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>

