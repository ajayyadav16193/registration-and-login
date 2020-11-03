<?php
    require_once 'connection.inc.php';

    if(isset($_POST['fname']) && !empty($_POST['fname'])){
        if(isset($_POST['lname']) && !empty($_POST['lname'])){
            if(isset($_POST['username']) && !empty($_POST['username'])){
                if(isset($_POST['email']) && !empty($_POST['email'])){
                    if(isset($_POST['password']) && !empty($_POST['password'])){
                        if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
                            $fname = mysqli_real_escape_string($conn,trim($_POST['fname']));
                            $lname = mysqli_real_escape_string($conn,trim($_POST['lname']));
                            $username = mysqli_real_escape_string($conn,trim($_POST['username']));
                            $email = mysqli_real_escape_string($conn,trim($_POST['email']));
                            $password = password_hash(mysqli_real_escape_string($conn,trim($_POST['password'])),PASSWORD_BCRYPT);
                            $mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
                            $image = mysqli_real_escape_string($conn,trim($_FILES['image']['name']));
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $img_upload = "media/".$_FILES['image']['name'];

                            if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png'){
                                $sql = "INSERT INTO user(fname,lname,username,email,password,mobile,image) VALUES ('$fname','$lname','$username','$email','$password','$mobile','$image')";
                                $result = mysqli_query($conn,$sql);
                                if (move_uploaded_file($tmp_name,$img_upload)) {
                                    if( $result > 0){
                                        echo "inserted";
                                    }else{
                                        echo "not inserted";
                                    }
                                }else{
                                    echo "not uploaded";
                                }
                            }else{
                                echo "Please select .jpeg,.jpg or .png file";
                            }
                        }else{
                            echo "mobile is not correct";
                        }
                    }else{
                        echo "password is not correct";
                    }
                }else{
                    echo "email is not correct";
                }
            }else{
                echo "username is not correct";
            }
        }else{
            echo "lastname is not correct";
        }
    }else{
        echo "firstname is not correct";
    }
?>