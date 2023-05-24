<?php


require_once 'conn.php';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'things.php'; ?>
</head>
<body>
<?php include 'header.php'; ?>

<div id="display-image">
		 <?php
		$query = " select * from image ";
		$result = mysqli_query($conn, $query);
		?>

<div class="row">
    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3">
            <div class="product-item-1">
                <div class="product-thumb">
                    <img src="./image/<?php echo $data['filename']; ?>" alt="Product Title">
                </div>
                <div class="product-content d-flex flex-column">
                    <h5><a href="#"><?php echo $data['title']; ?></a></h5>
                    <span class="tagline">Partner Name</span>
                    <p><?php echo $data['description']; ?></p>
                    <div class="buttons mt-auto">
                        <a href="update.php?id=<?php echo $data['id']; ?>" >Update</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" >Delete</a>
                    </div>
                </div> <!-- /.product-content -->
            </div> <!-- /.product-item -->
        </div> <!-- /.col-md-3 -->
    <?php } ?>
</div> <!-- /.row -->

	</div>
	</body>
	</html>