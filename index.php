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
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css"
    />

    <script src="font-awesome.js" crossorigin="anonymous"></script>

    <title>Shopping</title>
  </head>
  <body>
    <?php require_once "./navbar.php"; ?>

    <div class="container">
        <p class="text-success">
        
        </p>
        <h2>Reccommended for you</h2>
        <hr />
        <div class="row">

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/item-2.jpeg" alt="">
                        <p><a href="">Flash Drive</a></p>
                        <p>Kes. 1200</p>
                        <p><a href="">Add to Cart</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/item-4.jpeg" alt="">
                        <p><a href="">Flash Drive</a></p>
                        <p>Kes. 1200</p>
                        <p><a href="">Add to Cart</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/item-6.jpeg" alt="">
                        <p><a href="">Flash Drive</a></p>
                        <p>Kes. 1200</p>
                        <p><a href="">Add to Cart</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/item-7.jpeg" alt="">
                        <p><a href="">Flash Drive</a></p>
                        <p>Kes. 1200</p>
                        <p><a href="">Add to Cart</p>
                    </div>
                </div>
            </div>
        </div>
        
        <hr />
    </div>
    <?php require_once "./footer.php"; ?>
    
  </body>
</html>
