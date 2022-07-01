<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add New BY KD developer</title>
</head>
<body>
    <?php
       if(isset($_POST['button'])){
        extract($_POST);
        if(isset($name) && isset($surname) && $age){
            include_once "connection.php";
            $req = mysqli_query($con, "INSERT INTO crudops VALUES(NULL,'$name','$surname', '$age')");
            if($req){
                header("location:index.php");
            }
            else{
                $message = "failed to add new user";
            }

        }else{
            $message = "please complete all fields !";
        }
       }
       

      
    ?>
    <div class="forms">
        <a href="index.php" class="back_btn"><img src="./images/back.png" alt="">back</a>
        <h2>add user:</h2>
        <p class="error_message">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Name</label>
            <input type="text" name="name" >
            <label>Surname</label>
            <input type="text" name="surname" >
            <label>Age</label>
            <input type="number" name="age" id="">
            <input type="submit" name="button" id="" value="Add new user">

        </form>
    </div>
</body>
</html>