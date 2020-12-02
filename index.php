<?php 
  require_once './conn.php';

  if (isset($_SESSION['user']) && $user['is_staff'] == 1 ){
    header("location:dashboard.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css"/>

    <script src="font-awesome.js" crossorigin="anonymous"></script>

    <title>Shopping</title>
  </head>
  <body>
    <?php require_once "./navbar.php"; ?>

    <div class="container">
        <br/>
        <div id="alert">
            <?php require_once "./feedback.php"; ?>
        </div>
        <h2>Reccommended for you</h2>
        <hr />
        <div class="row">
            <?php require_once "./Controllers/allproducts.php";?>
        </div>
        <hr />
    </div>
    <?php require_once "./footer.php"; ?>
    
  </body>
</html>
