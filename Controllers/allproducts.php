<?php 
    require_once 'conn.php';
    
    try {

        $STH = $DBH->query("SELECT * FROM product");
        # setting the fetch mode PDO::FETCH_ASSOC –which also is the default fetch mode if notset
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        # showing theresults
        while($row = $STH->fetch()){
            $avatar = $row['avatar'];
            if($avatar === "" || $avatar === NULL) {
                $n = rand(0,10);
                $avatar = "blank_product".$n.".jpg";
            }
            ?>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/<?php echo $avatar; ?>" alt="<?php echo htmlentities($row['name']); ?>">
                        <p><a href=""><?php echo htmlentities($row['name']); ?></a></p>
                        <p>Kes. <?php echo htmlentities(number_format($row['unit_price'])); ?></p>
                        <p><a href="./Controllers/cart.php?action=add&code=<?php echo $row['code']; ?>">Add to Cart </a></p>
                    </div>
                </div>
            </div>

<?php
    }
}
catch(PDOException $e){
    $_SESSION['error'] = "Couldn't fetch the products";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>