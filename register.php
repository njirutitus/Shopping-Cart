<?php 
  require_once './conn.php';
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
                        <h2 class="text-center text-primary">Register</h2>

                        <?php require_once "./Controllers/register.php" ?>

                        <div id="alert">
                            <?php require_once "./feedback.php"; ?>
                            
                        </div>

                        <form method="post" onsubmit="return validate();">
                            <div class="form-group">
                              <label for="first_name">First Name</label>
                              <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>

                            <div class="form-group">
                              <label for="last_name">Last Name</label>

                              <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password">Password</label>
                                <input type="password" autocomplete="new-password" class="form-control" name="new_password" id="new_password" required>
                            </div>

                             <progress class="progress-bar" role="progressbar" max="100" value="0" id="meter"></progress>

                            <div class="strength text-info"> </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input type="password" autocomplete="new-password" class="form-control" name="confirm_password" id="confirm_password" required>
                            </div>

                            <div id="match"> </div>
                            
                            <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
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
