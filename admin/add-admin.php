<?php include('partials/menu.php'); ?>

<div class="main">
  <div class="wrapper">
        <h1>Add Admin</h1> 

              <?php
                      if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                     }
              ?>

     <form action="" method="POST">
        <table class="tbl-addadmin">

            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" placeholder="Enter your name"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="your username"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="your password"></td>
            </tr>

            <tr>
                <td colspan="3" >
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

        </table>
     </form>
  </div>
</div>


<?php include('partials/footer.php'); ?>


<?php

  if(isset($_POST['submit'])){

            $fullname=$_POST['fullname'];
            $username=$_POST['username'];
            $password=md5($_POST['password']);

            $sql = "INSERT INTO tbl_admin SET
            fullname='$fullname',
            username='$username',
            password='$password'
            ";

            $res = mysqli_query($conn,$sql);

            if($res==TRUE){
                  $_SESSION['add'] = '<div class="success"> Admin Added Suscessfuly. </div>';
                  header("location:".SITEURL.'admin/manage-admin.php');
               }
            else{
                  $_SESSION['add'] = '<div class="error"> Failed to Add Admin. </div>';
                  header("location:".SITEURL.'admin/add-admin.php');
              }

        }

?>