<?php include('partials/menu.php'); ?>

<div class="main">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

            <?php
            
                if(isset($_GET['id'])){

                    $id = $_GET['id'];

                    $sql = "SELECT * FROM ordertbl WHERE id=$id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count==1){

                        $row = mysqli_fetch_assoc($res);

                        $food = $row['food'];
                        $qty = $row['qty'];
                        $status = $row['status'];
                        $price = $row['price'];



                    }
                    else{
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }

                }
                else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            
            ?>

        <form action="" method="POST">
            <table class='tbl-addadmin'>

                <tr>
                    <td>Food Name:</td>
                    <td><b><?php echo $food ?></b></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td><b>$<?php echo $price ?></b></td>
                </tr>

                <tr>
                    <td>Qty:</td>
                    <td><input type="number" name="qty" value="<?php echo $qty ?>"></td>
                </tr>

                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status" >
                            <option <?php if($status=="Ordered"){ echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){ echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){ echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){ echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        
                if(isset($_POST['submit'])){

                    $id = $_POST['id'];
                    $qty = $_POST['qty'];
                    $price = $_POST['price'];
                    $total = $qty * $price;
                    $status = $_POST['status'];


                    $sql2 = "UPDATE ordertbl SET
                            qty = '$qty',
                            total = '$total',
                            status = '$status'
                            WHERE id=$id
                            ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true){

                        $_SESSION['update'] = "<div class='success'> Order Upadete Succesfully. </div>";
                        header('location:'.SITEURL.'admin/manage-order.php');

                    }
                    else{
                        
                        $_SESSION['update'] = "<div class='error'> Failed To Upadate Order. </div>";
                        header('location:'.SITEURL.'admin/manage-order.php');

                    }



                }
        
        
        ?>

    </div>
</div>


<?php include('partials/footer.php'); ?>