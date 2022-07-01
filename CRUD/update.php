<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include_once "connection.php";
        $id = $_GET['id'];

        $req = mysqli_query($con, "SELECT * FROM crudops WHERE id = $id");
        $row = mysqli_fetch_assoc($req);

        if(isset($_POST['button'])){
            extract($_POST);
            if(isset($name) && isset($surname) && $age){
                $req = mysqli_query($con, "UPDATE crudops SET name = '$name' , surname = '$surname' , age = '$age' WHERE id = $id");
                if($req){
                    header("location:index.php");
                }
                else{
                    $message = "unmodified employee";
                }
            }
            else{
                $message = "please fill the field!";
            }
        }
    ?>

    <div class="forms">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Back</a>
        <h2>update user: <?=$row['name']?></h2>
        <p class="error_message">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>name</label>
            <input type="text" name="name" value="<?=$row['name']?>">
            <label>surname</label>
            <input type="text" name="surname" value="<?=$row['surname']?>">
            <label>age</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Update" name="button">
        </form>
    </div>
</body>
</html>