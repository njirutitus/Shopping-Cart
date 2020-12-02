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
        
        <div class="row mt-4">
            <h1 class="col-12">Items(
                
            <?php
                if(isset($_SESSION['cart']))
                    echo count($_SESSION['cart']);
                else 
                    echo 0;
            
            ?>
            
            )</h1>
            <div class="col-12 m-auto">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ITEM</th>
                          <th scope="col">QUANTITY</th>
                          <th scope="col">UNIT PRICE</th>
                          <th scope="col">SUBTOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <!-- Code to Diplay Cart items -->
                      <?php require_once "./Controllers/cartitems.php";?>
                      </tbody>
                    </table>
              </div>
            </div>
        </div>

        <hr />
    </div>
    <?php require_once "./footer.php"; ?>
    
  </body>
</html>
