<?php include('../config/constans.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="login">

            <h1 class="text-center">Login</h1>
            <br><br>

            <?php

                 if(isset($_SESSION['login'])){
                         echo $_SESSION['login'];
                         unset ($_SESSION['login']);
                     }

                if(isset($_SESSION['no-login-message'])){
                         echo $_SESSION['no-login-message'];
                         unset ($_SESSION['no-login-message']);
                     }

            ?>

            <form action="" method="POST">
                <table >

                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" id="" placeholder="Enter username"></td>
                    </tr>
                    
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" id="" placeholder="Enter username"></td>
                    </tr>

                    <tr>
                        <td><input type="submit" name="submit" id="" value="Login" class="btn-primary"></td>
                    </tr>

                </table>
            </form>
              
    </div>
        
 </body>
</html>

<?php 

        if(isset($_POST['submit'])){ 
            
            $username = $_POST['username'];
            $password = md5($_POST['password']);


            $sql = "SELECT * FROM tbl_admin WHERE
                   username = '$username' AND password = '$password'
                ";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count==1){

                $_SESSION['login'] = "<div class= 'success'> Login Successful. </div> ";
                $_SESSION['user'] = $username;
                header('location:'.SITEURL.'admin/index.php');

            }
            else{

                $_SESSION['login'] = "<div class= 'error text-center' > Login Failed. </div> ";
                header('location:'.SITEURL.'admin/login.php');
                
            }
        }
        
?>