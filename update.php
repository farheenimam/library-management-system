<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";

    $result=$conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $author = $row['author'];
        $title = $row['title'];
        $price = $row['price'];
        $quantity = $row['quantity'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE books set author='$author', title='$title', price='$price', quantity='$quantity' WHERE id='$id'";

    if ($conn->query($sql) ===  TRUE){
        header("Location: table.php");
        exit();
    }
    else{
        echo "Error: ".$sql. ' '.$conn->error;
    }
    $conn->close();
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
    <form class="form" method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $title;?>" placeholder="Title" \required>

        <Label for="author">Author Name:</Label>
        <input type="text" name="author"value="<?php echo $author;?>" placeholder="Author Name" \required>

        <Label for="price">Price:</Label>
        <input type="number" name="price" placeholder="Price" value="<?php echo $price;?>" min="20" max="200" title="Value should be lesser than 20 or greater than 200" \required>        

        <Label for="quantity">Qauntity:</Label>
        <input type="number" name="quantity" value="<?php echo $quantity;?>" placeholder="e.g:1 or 2" \required>
        <button type="submit">Enter Book</button>
    </form>
    
</body>
</html>