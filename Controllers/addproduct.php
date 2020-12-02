<?php
    //  If user is not staff redirect to index page
    if((isset($_SESSION['user'])) && $user['is_staff'] == 0  ){ 
        header("location: ../index.php");
    
      }
    else {
    //  If user is not staff redirect to login page
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
    }
}
    
      // Check if the user has clicked the submit button
    if(isset($_POST['submit'])) {

        $name = $_POST['product_name'];
        $unit_price = $_POST['price'];
        $description = $_POST['description'];
        $added_by = $_SESSION['user']['id'];

        //if the action value is not set or action is add then add a new product to the database
        if(!isset($_GET['action']) || $_GET['action'] == 'Add'){

            try{
                $STH = $DBH->prepare("INSERT INTO product(name, unit_price, description,added_by) values(?,?,?,?)");
                $data = array($name,$unit_price,$description,$added_by);
                $STH->execute($data); 
                
                $_SESSION['success'] = "Product Successfully Added";
            }
            catch(PDOException $e){
                $_SESSION['error'] = "I'm sorry, $_SESSION[first_name]. I'm afraid I can't add the Product.";
                file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
            }
        }

        //If action value is set check whether its edit or delete and execute the appropriate query
        else {
            $action = $_GET['action'];
            $code = $_GET['code'];
            if($action == 'Edit'){

                // Edit product if action is edit
                try{
                    $STH = $DBH->prepare("UPDATE product SET name = ?, unit_price = ?, description=? WHERE code=? and added_by = ?");
                    $data = array($name,$unit_price,$description,$code,$added_by);
                    $STH->execute($data); 
                    
                    $_SESSION['success'] = "<strong>$name</strong> Successfully Updated";
                }
                catch(PDOException $e){
                    $_SESSION['error'] = "<strong>$name</strong> Could not be Updated";
                    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
                }
            }

            else if($action == 'Delete'){

                //delete product if action is delete
                try{
                    $STH = $DBH->prepare("DELETE FROM product WHERE code=? and added_by=?");
                    $data = array($code,$added_by);
                    $STH->execute($data); 
                    
                    $_SESSION['success'] = "<strong>$name</strong> Successfully Deleted";
                }
                catch(PDOException $e){
                    $_SESSION['error'] = "<strong>$name</strong> Could not be Deleted";
                    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
                }
            }
        }
        header("location:dashboard.php");
    }
?>