<?php
require_once 'conn.php';

if (isset($_POST['update'])) {
    $image_id = $_POST['id'];
    $description = $_POST['description'];
    $title = $_POST['title'];

    $sql = "UPDATE `image` SET `title`='$title', `description`='$description' WHERE `id`='$image_id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record updated successfully.";
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $image_id = $_GET['id'];

    $sql = "SELECT * FROM `image` WHERE `id`='$image_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
            $image_id = $row['id'];

        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Update Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <?php include 'things.php'; ?>
</head>

<?php include 'header.php'; ?>
<body>
    <div class="container my-4">
        <h2 class="my-4">Update Form</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $image_id; ?>">
            <input type="submit" class="btn btn-primary round" value="Update" name="update">
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>


</html>
