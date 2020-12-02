<?php 
    require_once 'conn.php';

    //  If user is not Logged in redirect to login page
    if((isset($_SESSION['user'])) && $user['is_staff'] == 0  ){ 
      header("location: ../index.php");
  
    }
    else {
      //  If user is not staff redirect to index page
      if (!isset($_SESSION['user'])){
        header("location: ../login.php");
      }
    }

    $id = $user["id"];
    try {

        $STH = $DBH->query("SELECT * FROM product where added_by=$id");
        # setting the fetch mode PDO::FETCH_ASSOC –which also is the default fetch mode if notset
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        # showing theresults
        while($row = $STH->fetch()){
          $avatar = $row['avatar'];
          if($avatar == "") {
            $n = rand(0,10);
            $avatar = "blank_product".$n.".jpg";
          }
            ?>

<tr>
    <th scope='row'> <?php echo htmlentities($row['code']); ?> </th>
    <td><img src="./images/<?php echo $avatar; ?>" width="30" height="30"></td>
    <td><?php echo htmlentities($row['name']); ?></td>
    <td><?php echo htmlentities($row['description']); ?></td>
    <td>KES <?php echo htmlentities(number_format($row['unit_price'])); ?></td>
    <td><a class="btn btn-primary m-1" href="dashboard.php?action=Edit&code=<?php echo $row['code']; ?>"><i class="far fa-edit"></i> Edit</a><a class="btn btn-danger m-1" href="dashboard.php?action=Delete&code=<?php echo $row['code']; ?>"><i class="far fa-trash-alt"></i> Delete</a></td>
</tr>


<?php
    }
}
catch(PDOException $e){
    echo "Couldn't fetch the products";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>