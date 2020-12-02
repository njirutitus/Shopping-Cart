<?php

require_once '../conn.php';

$product_id = empty($_GET['code']) ? "" : $_GET['code']; //the product id from theURL
$action = empty($_GET['action']) ? "" : $_GET['action']; //the action from theURL
if(!isset($_SESSION['cart']))
    $_SESSION['cart'] =array();

//if there is an product_id and that product_id doesn't exist display an errormessage
if($product_id && !productExists($product_id, $DBH)){
    die("Error. Product Doesn't Exist");
}

switch($action) { //decide what todo
    case "add":
        if(!isset($_SESSION['cart'][$product_id]))
            $_SESSION['cart'][$product_id] =0;
            $_SESSION['success'] = "Item Successfully Added to cart";
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id$product_id
        $_SESSION['success'] = "Cart Product Successfully Updated";
        header("location: ../index.php");
        break;
    case "remove": //remove one from the quantity of the product with id$product_id
        $_SESSION['cart'][$product_id]--;
        //if the quantity is zero, remove it completely (using the 'unset' function)-
        //otherwise is will show zero, then -1, -2 etc when the user keeps removingitems.
        if($_SESSION['cart'][$product_id] ==0)
            unset($_SESSION['cart'][$product_id]);
        
        $_SESSION['success'] = "Item Successfully Removed from cart";
        header("location: ../cart.php");
        
        break;
    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty thecart.
        $_SESSION['success'] = "Cart Emptied";
        header("location: ../cart.php");
        break;
    }

function productExists($product_id, $DBH){
    try{
        
        // execute query
        $STH = $DBH->prepare("SELECT * FROM product user WHERE code=?");
        $data = array($product_id);
        $STH->execute($data);

        //check if email exists
        $rows_affected = $STH->rowCount();
        if ($rows_affected == 1){
            return TRUE;
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