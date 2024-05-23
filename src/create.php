<?php
include_once 'database/crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    if (create($name, $description, $price, $stock, $category)) {
        header("Location: index.php");
        exit();
    }
}

$categories = ["Electronics", "Books", "Clothing", "Sports", "Home"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="css/create.css">
</head>
<body>
<h1 class="title">Create Product</h1>
<div class="form-container">
    <form method="post" class="product-form">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="" disabled selected>Select a category</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="btn-group">
            <input type="submit" value="Submit" class="btn btn-submit">
            <a class="btn btn-cancel" href="index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
