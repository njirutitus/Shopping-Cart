<?php
    $host = 'localhost'; 
    $dbname = 'shopping'; 
    $user = 'root'; 
    $pass = ''; 

    # connect to thedatabase
    try {
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
        $DBH->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);# set errorattribute

        session_start();
        
        if(isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $STH = $DBH->prepare("SELECT * FROM user WHERE id=?");
            $data = array($id);
            $STH->execute($data);

            $rows_affected = $STH->rowCount();
            if ($rows_affected == 1){
                $user = $STH->fetch();
            }
            else{
                $_SESSION['error'] = "User does not exist";
                unset($_SESSION['user']); 
            } 
        }
    }
    catch(PDOException $e){
        echo "Error 500: Internal Server Error";
        file_put_contents('PDOErrors.txt', "\n".$e->getMessage(), FILE_APPEND); # log errors to afile
    }
?>