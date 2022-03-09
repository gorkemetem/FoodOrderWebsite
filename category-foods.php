<?php include('partials-front/menu.php'); ?>

    <?php 
    
        if(isset($_GET['category_id'])){

            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];

        }
        else{
            header('location:'.SITEURL);
        }
    
    ?>

    <section class="food-search text-center">
        <div class="container">
            
            <h2>Contents on <b>"<?php echo $category_title; ?>"</b></h2>

        </div>
    </section>


    <section class="food-menu">
        <div class="container">
            <h2 class="text-center"><?php echo $category_title; ?> Menu</h2>

            <?php
            
                $sql2 = "SELECT * FROM foods WHERE categoryid=$category_id";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2>0){

                    while($row2=mysqli_fetch_assoc($res2)){

                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['imagename'];

                        ?>

                                <div class="food-menu-box"> 
                                        <div class="food-menu-img">

                                            <?php
                                            
                                                if($image_name==""){

                                                    echo "<div class='error'> Image Not Available. </div>";

                                                }
                                                else{

                                                    ?>
                                                         <img src="<?php SITEURL ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive2 img-curve">
                                                    <?php

                                                }
                                            
                                            ?>
                                           
                                        </div>

                                        <div class="food-menu-desc">
                                            <h4><?php echo $title; ?></h4>
                                            <p class="food-price">$<?php echo $price; ?></p>
                                            <p class="food-detail">
                                                <?php echo $description; ?>
                                            </p>
                                            <br>

                                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                        </div>
                                    </div>

                        <?php


                    }

                }
                else{
                    echo "<div class='error'> Food Not Available. </div>";
                }
            
            ?>
            
         <div class="clearfix"></div>

    </div>

 </section>

<?php include('partials-front/footer.php'); ?>