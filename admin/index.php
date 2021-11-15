 <?php include('partials/menu.php') ?>

   <div class="main">

         <div class="wrapper">

             <h1>Dashboard</h1>
             <br><br><br>

                   <?php
                         
                        if(isset($_SESSION['login'])){

                            echo $_SESSION['login'];
                            unset ($_SESSION['login']);

                         }

                    ?>

                   <div class="boxes text-center">

                         <?php
                         
                            $sql ="SELECT * FROM tbl_category";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);
                         
                         ?>
                          <strong><?php echo $count; ?></strong>
                          <br><br>
                        Categories

                   </div>

                   <div class="boxes text-center">

                         <?php
                         
                          $sql2 = "SELECT * FROM foods";

                          $res2 = mysqli_query($conn, $sql2);

                          $count2 = mysqli_num_rows($res2);
                         
                         ?>
                           <strong><?php echo $count2; ?></strong>
                           <br><br>
                         Foods

                   </div>

                   <div class="boxes text-center">

                         <?php
                         
                          $sql3 = "SELECT * FROM ordertbl";

                          $res3 = mysqli_query($conn, $sql3);

                          $count3 = mysqli_num_rows($res3);
                         
                         ?>

                           <strong><?php echo $count3; ?></strong>
                           <br><br>
                         Total Orders

                   </div>

                   <div class="boxes text-center">

                         <?php
                         
                            $sql4 = "SELECT SUM(total) AS Total FROM ordertbl WHERE status='Delivered'";

                            $res4 = mysqli_query($conn, $sql4);

                            $row4 = mysqli_fetch_assoc($res4);

                            $total_revenue = $row4['Total'];
                         
                         ?>
                           <strong>$<?php echo $total_revenue; ?></strong>
                            <br><br>
                         Revenue Generated

                   </div>

            </div>

          <div class="clearfix"></div>

      </div>

 <?php include('partials/footer.php') ?> 