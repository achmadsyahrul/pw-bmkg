<!-- Create & Read Process -->

<?php
include "connect.php";
session_start();
foreach ($_POST as $key => $value) {
    ${$key} = $value;
}
$username = strtolower($username);
// $password = md5($password);
// $confirm = md5($confirm);
// $passlama = md5($passlama);
// $passbaru = md5($passbaru);

if (isset($_GET['log'])) {

    if ($_GET['log'] == "in") {
        $password = md5($password);
        $query = "SELECT * from user where username='$username' and password='$password'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        foreach ($result as $row) {
            $level = $row['level'];
        }
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $level;
            header("location:index.php");
        } else {
            header('location:login.php?pesan=salah');
        }
    } else if ($_GET['log'] == 'daftar') {
        $result = mysqli_query($link, "SELECT username FROM user");
        foreach ($result as $r) :
            if ($r['username'] == $username) {
                header("location: register.php?pesan=terdaftar");
            }
        endforeach;
        if (empty($_POST['submit'])) {
            header("location: register.php");
        } else if (strlen($password) < 6) {
            header("location: register.php?pesan=min");
        } else if ($password != $confirm) {
            header("location: register.php?pesan=confirm");
        } else {
            $password = md5($password);
            $target_dir = "photos/";
            $hash = md5(date('Y-m-d H:i:s'));
            $target_file = $target_dir . $hash . "_" . basename($_FILES["photo"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (empty($_FILES["photo"]["name"])) {
                $target_file = 'DEFAULT';
            } else {
                if ($_FILES["photo"]["size"] > 500000) {
                    header("location:register.php?pesan=file_size");
                }

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    header("location:register.php?pesan=file_type");
                }

                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $target_file = "'$target_file'";
                }
            }
            $query = "INSERT INTO user(id, nama, username, password, foto, level) VALUES('','$name', '$username', '$password', $target_file, 'user')";
            mysqli_query($link, $query) or die(mysqli_error($link));
            if ($query) {
                header("location:login.php?pesan=terdaftar");
            }
        }
    } else if ($_GET['log'] == "out") {
        session_start();
        session_destroy();
        header('location:login.php?pesan=logout');
    }
} 

else if (isset($_GET['add'])) {
    if($_GET['add']=='admin'){
        $target_dir = "photos/";
    }
    else if($_GET['add']=='data'){
        $target_dir = "uploads/";
    }
    $hash = md5(date('Y-m-d H:i:s'));
    $target_file = $target_dir . $hash . "_" . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["photo"]["name"])) {
        $target_file = 'DEFAULT';
    } 
    else {
        if ($_FILES["photo"]["size"] > 500000) {
            header("location:add.php?pesan=file_size");
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            header("location:add.php?pesan=file_type");
        }
    }

    if ($_GET['add'] == 'admin') {
        $result = mysqli_query($link, "SELECT username FROM user");
        foreach ($result as $r) :
            if ($r['username'] == $username) {
                header("location: add.php?pesan=terdaftar");
            }
        endforeach;
        if (empty($_POST['submit'])) {
            header("location: add.php");
        } else if (strlen($password) < 6) {
            header("location: add.php?pesan=min");
        } else if ($password != $confirm) {
            header("location: add.php?pesan=confirm");
        } else {
            $password = md5($password);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $target_file = "'$target_file'";
            }
            $query = "INSERT INTO user(id, nama, username, password, foto, level) VALUES('','$name', '$username', '$password', $target_file, 'admin')";
            mysqli_query($link, $query) or die(mysqli_error($link));
            if ($query) {
                header("location:add.php?pesan=sukses");
            }
        }
    } 
    
    else if ($_GET['add'] == 'data') {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $target_file = "'$target_file'";
        }
        //sementara
        //$time = $time . ":00";
        $time = $time . ":" . $sec;
        $query = "INSERT INTO gempa(id, tanggal, waktu, lat, lon, dep, mag, mountain, region, foto) VALUES('','$date', '$time', '$lat', '$lon', '$dep', '$mag', '$mountain', '$region', $target_file)";
        mysqli_query($link, $query) or die(mysqli_error($link));
        if ($query) {
            header("location:add.php?pesan=sukses");
        }
    }
} 

else if(isset($_GET['editdata'])){
    $time = $time . ":" . $sec;
    $id = $_GET['editdata'];
    $query = "UPDATE gempa SET tanggal='$date', waktu='$time', lat='$lat', lon='$lon', dep='$dep', mag='$mag', mountain='$mountain', region='$region' WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if ($query) {
        header("location:detail.php?id=$id");
    }
}

else if(isset($_GET['editfotoinfo'])){
    $id = $_GET['editfotoinfo'];
    $target_dir = "uploads/";
    $hash = md5(date('Y-m-d H:i:s'));
    $target_file = $target_dir . $hash . "_" . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["photo"]["name"])) {
        $target_file = 'DEFAULT';
    } 
    else {
        if ($_FILES["photo"]["size"] > 500000) {
            header("location:detail.php?pesan=file_size");
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            header("location:detail.php?pesan=file_type");
        }
    }
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $target_file = "'$target_file'";
    }
    $query = "UPDATE gempa SET foto=$target_file WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if ($query) {
        header("location:detail.php?id=$id");
    }
}

else if(isset($_GET['hapusdata'])){
    $id = $_GET['hapusdata'];
    $back = $_GET['from'];
    $query = "DELETE FROM gempa WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if ($query) {
        header("location:$back.php");
    }
}

else if(isset($_GET['editnama'])){
    $id = $_GET['editnama'];
    $query = "UPDATE user SET nama='$nama', username='$username' WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    if ($query) {
        $_SESSION['username']=$username;
        header("location:pengaturan.php?user=$username");
    }
}
else if(isset($_GET['editpass'])){
    $passlama = md5($passlama);
    $id = $_GET['editpass'];
    $username = $_SESSION['username'];
    $query = "SELECT password FROM user WHERE id='$id'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    if($passlama != $row['password']){
        header("location: pengaturan.php?user=$username&pesan=passlama");
    }
    else if($passbaru != $confirm){
        header("location: pengaturan.php?user=$username&pesan=confirm");
    }
    else if(strlen($passbaru)<6){
        header("location: pengaturan.php?user=$username&pesan=passbaru");
    }
    else{
        $passbaru = md5($passbaru);
        $query = "UPDATE user SET password='$passbaru' WHERE id='$id'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        header("location:pengaturan.php?user=$username");
    }
}

else if(isset($_GET['editfotoprofil'])){
    $id = $_GET['editfotoprofil'];
    $username = $_SESSION['username'];
    $target_dir = "photos/";
    $hash = md5(date('Y-m-d H:i:s'));
    $target_file = $target_dir . $hash . "_" . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["photo"]["name"])) {
        $target_file = 'DEFAULT';
    } 
    else {
        if ($_FILES["photo"]["size"] > 500000) {
            header("location:pengaturan.php?user=$username&pesan=file_size");
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            header("location:pengaturan.php?user=$username&pesan=file_type");
        }
    }
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $target_file = "'$target_file'";
    }
    $query = "UPDATE user SET foto=$target_file WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    header("location:pengaturan.php?user=$username");
}

else {
    header("location: index.php");
}
