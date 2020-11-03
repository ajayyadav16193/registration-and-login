<?php 
    require_once 'connection.inc.php';
    if(isset($_POST['loginemail']) && !empty($_POST['loginemail'])){
        if(isset($_POST['loginpassword']) && !empty($_POST['loginpassword'])){
            $email = mysqli_real_escape_string($conn,trim($_POST['loginemail']));
            $password = mysqli_real_escape_string($conn,trim($_POST['loginpassword']));            
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($result);
            if(password_verify($password,$data['password'])){
                $_SESSION['USER_ID'] = $data['id'];
            }else{
                echo "error";
            }
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }
?>