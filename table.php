<?php
include 'db.php';
include 'navbar.php';
// To display all info
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

$conn->close();
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
    <table>
    <thead>
        <td>ID</td>
        <td>Title</td>
        <td>Author</td>
        <td>Qauntity</td>
        <td>Price</td>
        <td>Action</td>
    </thead>
    <?php
        if ($result->num_rows > 0){
            while($rows = $result->fetch_assoc()){
                echo "<tr>
        <td>".$rows['id']."</td>
        <td>".$rows['title']."</td>
        <td>".$rows['author']."</td>
        <td>".$rows['price']."</td>
        <td>".$rows['quantity']."</td>
        <td><a class='btn btn-edit' href='update.php?id=".$rows['id']."'>Update</a>
        <a class='btn btn-delete' href='delete.php?id=".$rows['id']."'>Delete</a></td>
    </tr>";
            }
        }
        else{
            echo "data not found";
        }
    ?>
    </table>
    <a href="index.php">Go back></a>
</body>
</html>