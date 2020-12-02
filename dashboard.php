<?php 
  require_once './conn.php';

  //  If user is not Logged in redirect to login page
  if((isset($_SESSION['user'])) && $user['is_staff'] == 0  ){ 
    header("location:index.php");

  }

  else {
    //  If user is not staff redirect to index page
    if (!isset($_SESSION['user'])){
      header("location:login.php");
    }
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
        <p class="text-success">
        
        </p>
        <div class="row mt-4">
            <div class="col-12 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        
                        <?php require_once "./Controllers/addproduct.php" ?>

                        <div id="alert">
                            <?php require_once "./feedback.php"; ?>
                        </div>

                        <?php 
                          if(isset($_GET['action']) && isset($_GET['code'])){
                            $action = $_GET['action'];
                            $code = $_GET['code'];
                            $sql = "SELECT * FROM product WHERE code= ?";
                            $STH = $DBH->prepare($sql);
                            $data = array($code);
                            $STH->execute($data);

                            $rows_affected = $STH->rowCount();

                            if ($rows_affected == 1){
                              $row = $STH->fetch();
                              $name = $row['name'];
                              $price = $row['unit_price'];
                              $description = $row['description'];
                            }
                            else {
                              $name = '';
                              $price = '';
                              $description = '';
                            }

                          }
                          else {
                            $action = 'Add';
                            $name = '';
                            $price = '';
                            $description = '';
                          }                        
                        ?>
                        <h2 class="text-center text-primary"><?php echo htmlentities($action); ?> Product</h2>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="product_name">Product Name</label>
                              <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlentities($name); ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="price">Price</label>

                              <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlentities($price); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" required><?php echo htmlentities($description); ?></textarea>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Avatar</span>
                              </div>
                              <div class="custom-file">
                                <input name="avatar" type="file" class="custom-file-input" id="avatar" aria-describedby="avatar">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                              </div>
                            </div>
                            
                            <input name="submit" type="submit" class="btn btn-primary" value="<?php echo htmlentities($action); ?>"/>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        <hr />
        <div class="row mt-4">
            <h1 class="text-center col-12">My Products</h1>
            <a id="add_product" class="btn btn-primary m-1" href="dashboard.php?action=add"><i class="far fa-plus"></i> Add New</a>
            <div class="col-12 m-auto">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">code</th>
                          <th scope="col">Avatar</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <!-- Code to Diplay the products -->
                      <?php require_once './Controllers/myproducts.php'; ?>
                      </tbody>
                    </table>
              </div>
            </div>
        </div>
    </div>

    <?php require_once "./footer.php"; ?>
    
  </body>
</html>
