<?php 
    if(isset($_POST['submit'])) {
        try{
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['new_password'];

            //Encrypt password
            $password = password_hash($password,PASSWORD_DEFAULT);
            
            $STH = $DBH->prepare("INSERT INTO user(first_name, last_name, email,password) values(?,?,?,?)");
            $data = array($first_name,$last_name,$email,$password);
            $STH->execute($data); 
            
            $_SESSION['success'] = "Registration Successful";
        }
        catch(PDOException $e){
            $_SESSION['error'] = "I'm sorry, $first_name. I'm afraid I can't register you.";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
?>