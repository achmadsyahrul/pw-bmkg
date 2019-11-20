<?php
include "connect.php";
session_start();
foreach ($_POST as $key => $value) {
    ${$key} = $value;
}

if (isset($_GET['log'])) {
    if ($_GET['log'] == "in") {
        $query = "SELECT * from user where username='$username' and password='$password'";
        mysqli_query($link, $query) or die(mysqli_error($connect));
        if (mysqli_num_rows($query) > 0) {
            session_start();
            $_SESSION['username'] = $username;
            header("location:home_admin.php");
        } else {
            header('location:login.php?pesan=salah');
        }
    } 

    else if ($_GET['log'] == 'daftar') {
        if(empty($_POST['submit'])){
            header("location: register.php");
        }
        else if(strlen($password)<6){
            header("location: register.php?pesan=min");
        }
        else if($password!=$confirm){
            header("location: register.php?pesan=confirm");
        }
        else{
            $target_dir = "photos/";
            $hash = md5(date('Y-m-d H:i:s'));
            $target_file = $target_dir . $hash . "_" . basename($_FILES["photo"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (empty($_FILES["photo"]["name"])) {
                $target_file='DEFAULT';
            }
            else{
                if ($_FILES["photo"]["size"] > 500000) {
                    header("location:login.php?pesan=file_size");
                }
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    header("location:login.php?pesan=file_type");
                }

                if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)){
                    $target_file="'$target_file'";
                }
            }

            $password = md5($password);

            $query = "INSERT INTO user(id, nama, username, password, foto, level) VALUES('','$name', '$username', '$password', $target_file, 'user')";
            mysqli_query($link, $query) or die(mysqli_error($connect));
            if ($query) {
                header("location:login.php?pesan=terdaftar");
            }
        }
    } 
    
    else if ($_GET['log'] == "out") {
        session_start();
        session_destroy();
        header('location:login.php?pesan=logout');
    }
}
