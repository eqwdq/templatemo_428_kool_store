<?php

require_once 'conn.php';

if (isset($_GET['id'])) {

    $image_id = $_GET['id'];

    $sql = "DELETE FROM `image` WHERE `id`='$image_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("location:index.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}

?>