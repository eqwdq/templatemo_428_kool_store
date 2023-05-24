<?php
session_start();

require_once 'conn.php';



?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!--
Kool Store Template
http://www.templatemo.com/preview/templatemo_428_kool_store
-->
<?php include 'things.php'; ?>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->


    <?php include 'header.php'; ?>

    <div class="content-section">
        <div class="container">
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



<?php include 'footer.php'; ?>


    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


</body>
</html>