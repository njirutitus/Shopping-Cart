<?php
    require_once './conn.php';
    
    //Display a menu for a logged user
    if(isset($_SESSION['user'])) {
      $is_staff = $user['is_staff'];
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo $is_staff==1?'dashboard.php':'index.php'; ?>">Shopping</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo strtoupper($user['first_name'].' '.$user['last_name']); ?></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
          <?php if($is_staff == 0) {?>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"> Cart <span class="badge badge-dark">
              <?php
                if(isset($_SESSION['cart']))
                  echo count($_SESSION['cart']);
              ?>
            </span></a>
          </li>
          <?php } ?>

        </ul>
      </div>
    </nav>
<?php 
 } 
//  Display menu for a guest user
 else {
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Shopping</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"> Cart 

            <span class="badge badge-light">
              <?php
                if(isset($_SESSION['cart']))
                  echo count($_SESSION['cart']);
              ?>
            </span>

            </a>
          </li>
        </ul>
      </div>
    </nav>
 <?php } ?>