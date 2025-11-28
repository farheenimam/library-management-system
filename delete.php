<?php
include 'db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id='$id'";

    if ($conn->query($sql) === TRUE){
        header("Location:table.php");
    } else{
        echo "Error".$sql. ' '.$conn->error;
    }

}
?>