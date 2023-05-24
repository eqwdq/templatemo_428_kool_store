<?php
session_start();
require_once 'conn.php';

error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;
    $title = $_POST['title'];
    $description = $_POST['description'];


	// Get all the submitted data from the form
	$sql = "INSERT INTO `image` (`filename`, `title`, `description`) VALUES ('$filename','$title','$description')";

	// Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
        header("location:index.php");
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<?php include 'things.php'; ?>
	<style>
		.container {
			margin-top: 50px;
		}

		.upload-form {
			width: 50%;
			margin: 0 auto;
		}

		.form-group {
			margin-bottom: 20px;
		}

		h3 {
			margin-top: 30px;
		}
	</style>
</head>
<?php include 'header.php'; ?>


<body>
	<div class="container">
		<h2 class="text-center">Image Upload</h2>
		<form class="upload-form" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="title" placeholder="Title">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="description" placeholder="Description">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">Upload</button>
			</div>
		</form>
	</div>
</body>


	<?php include 'footer.php'; ?>
</body>

</html>
