<?php 

       
        include('../config/constans.php');

         $id = $_GET['id'];

         $sql = "DELETE FROM tbl_admin WHERE id=$id";

         $res = mysqli_query($conn,$sql);

         
         if($res==true){
                $_SESSION['delete'] = " <div class='success'> Admin deleted Suscessfully. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
         }
         else{
                $_SESSION['delete'] = " <div class='error'> Failed to Deleted Admin. Try Again Later. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
         }

?>