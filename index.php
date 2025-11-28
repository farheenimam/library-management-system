<?php
include 'db.php';
include 'navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $author = $_POST['author'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (author, title, price, quantity) VALUES ('$author', '$title', '$price', '$quantity')";

    if ($conn->query($sql) ===  TRUE){
        header("Location: table.php");
        exit();
    }
    else{
        echo "Error: ".$sql. ' '.$conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <h2>Book management System</h2>
    <div class="container">
    <form class="form" method="post" action="index.php">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" \required>
        <br>
        <Label for="author">Author Name:</Label>
        <input type="text" name="author" placeholder="Author Name" \required>
        <br>
        <Label for="price">Price:</Label>
        <input type="number" name="price" placeholder="Price" min="20" max="200" title="Value should be lesser than 20 or greater than 200" \required>        
        <br>
        <Label for="quantity">Qauntity:</Label>
        <input type="number" name="quantity" placeholder="e.g:1 or 2" \required>
        <button type="submit">Enter Book</button>
    </form>
    <div>
</body>
</html>