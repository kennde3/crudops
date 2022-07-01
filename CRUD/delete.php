<?php 
    include_once "connection.php";
    $id = $_GET['id'];
    $q = mysqli_query($con , "DELETE FROM crudops WHERE id =$id");
    header("location:index.php")
?>