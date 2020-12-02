<?php

require_once 'conn.php';

if(!isset($_SESSION['cart']))
    echo "No items in the cart";
else {
    foreach($_SESSION['cart'] as $product_id => $value){
        $row = fetchProduct($product_id,$DBH);
        if(!$row){
            unset($_SESSION['cart'][$product_id]);
        }
        else {
            $avatar = $row['avatar'];
            if($avatar === "" || $avatar === NULL) {
                $n = rand(0,10);
                $avatar = "blank_product".$n.".jpg";
            }

    
?>
 <tr>
    <td>
        <img src="./images/<?php echo $avatar; ?>" width="30" height="30">  
        <a class="btn btn-primary m-1" href="details.php?code=<?php echo $row['code']; ?>">
            <?php echo htmlentities($row['name']); ?>
        </a>
        <p><a class="btn btn-warning" href="./Controllers/cart.php?action=remove&code=<?php echo $row['code']; ?>">Remove </a></p>
        
    </td>
    <td>KES <?php echo htmlentities(number_format($row['unit_price'])); ?></td>
    <td><input size="2" class="form-control" type="number" value="<?= htmlentities($value) ?>"></td>
    <td><?php echo htmlentities(number_format($row['unit_price']*$value)); ?></td>
</tr>

<?php
        }
}
}


function fetchProduct($product_id, $DBH){
    try{
        
        // execute query
        $STH = $DBH->prepare("SELECT * FROM product user WHERE code=?");
        $data = array($product_id);
        $STH->execute($data);

        //check if email exists
        $rows_affected = $STH->rowCount();
        if ($rows_affected == 1){
            $row = $STH->fetch();
            return $row;
        }
        else 
            return FALSE;            
    }

    catch(PDOException $e){
        $_SESSION['error'] = "I'm sorry. I can't do that.";
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
    }
}

?>