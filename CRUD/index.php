<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud OPS by KD devloper</title>
</head>
<body>
    <div class="container">
        <a href="./add.php" class="btn_add"><img src="./images/plus.png" alt="">Add new</a>
   
        <table>
            <tr id="items">
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php 
            include_once "connection.php";

            $q = mysqli_query($con , "SELECT * FROM crudops");
            if(mysqli_num_rows($q) == 0){
                echo "no record";
            }
            else{
                while($row = mysqli_fetch_assoc($q)){
                    ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['surname']?></td>
                    <td><?=$row['age']?></td>

                    <td><a href="update.php?id=<?=$row['id']?>"><img src="./images/pen.png" alt=""></a></td>
                    <td><a href="delete.php?id=<?=$row['id']?>"><img src="./images/trash.png" alt=""></a></td>
                </tr>
           
            <?php
                     }
                    }
            ?>
          
        </table>
    </div>
</body>
</html>