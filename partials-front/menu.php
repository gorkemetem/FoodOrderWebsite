<?php include('config/constans.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seven Samurai Sushi</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>

        header {
            height: 160px;
            background-image: url("images/başlık.jpg");
			border-radius: 10px;
        }
		footer{
			background-image: url("images/footer.jpg");
		}
 
    </style>

</head>

    <body>
		<div class="page">

			<header>
				<h1></h1>
				<nav>
					<ul>

						<li><a href="<?php echo SITEURL; ?>">Home</a></li>
                        <li><a href="<?php echo SITEURL; ?>category.php">Categories</a></li>
						<li><a href="<?php echo SITEURL; ?>foods.php">All Menu</a></li>
						<li><a href="<?php echo SITEURL; ?>aboutus.php">About Us</a></li>
						
					</ul>
				</nav>
			</header>