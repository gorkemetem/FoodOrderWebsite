<?php include('partials-front/menu.php'); ?>

    <section class="food-search text-center">
        <div class="container">

            <?php
                $search = $_POST['search'];
            ?>
            
            <h2>Foods on Your Search <p>"<?php echo $search; ?>"</p></h2>

        </div>
    </section>
    

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

                <?php 

                    $sql = "SELECT * FROM foods WHERE title LIKE '%$search%' OR description LIKE '&$search&'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if($count>0){

                        while($row=mysqli_fetch_assoc($res)){

                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image_name = $row['imagename'];

                            ?>

                                <div class="food-menu-box">
                                        <div class="food-menu-img">

                                            <?php 

                                                if($image_name==""){

                                                    echo "<div class='error'> Image Not Avaliable. </div>";

                                                }
                                                else{

                                                    ?>
                                                          <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive2 img-curve">
                                                    <?php

                                                }
                                            
                                            ?>
                                          
                                        </div>

                                        <div class="food-menu-desc">
                                            <h4><?php echo $title; ?></h4>
                                            <p class="food-price">$<?php echo $price ?></p>
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
                        echo "<div class='error'> Food Not Found. </div>";
                    }

                ?>

            <div class="clearfix"></div>

        </div>

    </section>

    <br><br><br>

<?php include('partials-front/footer.php'); ?>