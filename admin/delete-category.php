<?php

    include('../config/constans.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){

            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='error'> Failed To Remove Category. </div>";

                header('location:'.SITEURL.'/admin/manage-category.php');

                die();
            }
        }

        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true){

                $_SESSION['delete'] = "<div class='success'> Category Deleted Successfuly. </div>";
                header('location:'.SITEURL.'/admin/manage-category.php');

        }
        else{

                $_SESSION['delrte'] = "<div class='error'> Failed To Delete Category. </div>";
                header('location:'.SITEURL.'/admin/manage-category.php');

        }



    }
    else{

        header('location:'.SITEURL.'admin/manage-category.php');
    }
    



?>