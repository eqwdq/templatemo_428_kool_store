
<?php
session_start();

require_once 'conn.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="signin.css">
  <?php include 'things.php'; ?>
</head>
<?php include 'header.php'; ?>
<body>
  <main class="form-signin">
    <form action = "signin.php" method = "post">
        <h1 class="h2 mb-3 fw-bold">Log in or Sign Up!</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name = "username" placeholder="Username" required >
        <label for="floatingInput">Email</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name = "pass" placeholder="Password" required >
        <label for="floatingPassword">Password</label>
      </div>

      <div style="display: flex;">
        <button class="w-50 btn btn-lg btn-primary" type="submit" name = "login" value = "Login" >Log in</button>
        <div style="width: 10px;"></div>
        <button class="w-50 btn btn-lg btn-primary" type="submit" name = "signup" value = "Signup">Sign up</button>
      </div>



    </form>
</main>
<?php


    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $select = mysqli_query($conn,"SELECT * FROM `login` where username = '$username' and pass = '$pass' ");
        $row = mysqli_fetch_array($select);

        if(is_array($row)){
            $_SESSION["username"] = $row ['username'];
            $_SESSION["pass"] = $row ['pass'];
        } else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid username or password");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
        if(isset($_SESSION["username"])) {
            header("Location: index.php");
        }
        }
    if(isset($_POST["signup"])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        if(empty($username) || empty($pass)) {
            $message = "Please fill in all the fields.";
        } else {
            $checkUsername = mysqli_query($conn, "SELECT * FROM `login` WHERE username = '$username'");
            if(mysqli_num_rows($checkUsername) > 0) {
                $message = "Username is already taken. Please choose a different username.";
            } else {
                $insertUser = mysqli_query($conn, "INSERT INTO `login` (`username`, `pass`) VALUES ('$username', '$pass')");
                if($insertUser) {
                    $_SESSION["username"] = $username;
                    header("Location: index.php");
                    alert("succesfully created user");
                    exit;
                } else {
                    $message = "An error occurred. Please try again later.";
                }
            }
        }
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php include 'footer.php'; ?>
</body>
</html>
