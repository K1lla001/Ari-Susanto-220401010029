<?php
include_once 'connection.php';

$conn = dbConnection();
function create($name, $description, $price, $stock, $category) {
    global $conn;
    $sql = "INSERT INTO products (name, description, price, stock, category) VALUES ('$name', '$description', '$price', '$stock', '$category')";
    return $conn->query($sql);
}

function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    return $conn->query($sql);
}

function updateProduct($id, $name, $description, $price, $stock, $category) {
    global $conn;
    $sql = "UPDATE products SET name='$name', description='$description', price='$price', stock='$stock', category='$category' WHERE id='$id'";
    return $conn->query($sql);
}

function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id='$id'";
    return $conn->query($sql);
}