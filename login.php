<?php 
  require_once './conn.php';
  if((isset($_SESSION['user'])) && $user['is_staff'] == 0  ){ 
    header("location:index.php");

  }
  else {
    //  If user is not staff redirect to index page
    if (isset($_SESSION['user']) && $user['is_staff'] == 1 ){
      header("location:dashboard.php");
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
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css"
    />

    <title>Shopping: register</title>
  </head>
  <body>
    <?php require_once "./navbar.php"; ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-sm-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center text-primary">Sign In</h2>

                        <?php require_once "./Controllers/login.php" ?>

                        <div id="alert">
                            <?php require_once "./feedback.php"; ?>
                        </div>

                        <form method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>

                            <p>Don't have an account? <a href="register.php">Register</a></p>
                            </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <?php require_once "./footer.php"; ?>
    <script src="./script.js">
        
    </script>
  </body>
</html>
