<?php
include_once 'database/crud.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteProduct($id)) {
        header("Location: index.php");
        exit();
    }
}
?>
