<?php include('partials/menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

            <?php 

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
                    $res = mysqli_query($conn, $sql);


                    if($res==true){

                            $count = mysqli_num_rows($res);

                            if($count==1){
                                $row = mysqli_fetch_assoc($res);

                                $fullname = $row['fullname'];
                                $username = $row['username'];

                            }
                            else{
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                    }
                    
            
            ?>

        <form action="" method="POST" >

        <table class="tbl-addadmin">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="fullname" value="<?php echo $fullname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                        
                    </tr>
        </table>


        </form>
    </div>
</div>


<?php

      if(isset($_POST['submit'])){

          $id = $_POST['id'];
          $fullname = $_POST['fullname'];
          $username = $_POST['username'];


          $sql = "UPDATE tbl_admin SET
            fullname = '$fullname',
            username = '$username'
            WHERE id = '$id'
            ";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                    $_SESSION['update'] = " <div class='success'> Admin Update Succesfully. </div> ";
                    header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else{
                   $_SESSION['update'] = " <div class='error'> Failed To Update Admin </div> ";
                   header('location:'.SITEURL.'admin/manage-admin.php');
            }

      }

?>

<?php include('partials/footer.php') ?> 