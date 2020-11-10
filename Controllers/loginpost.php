<?php
    session_start();
    include("../class/DBconnection.php");
    $obj = new DBconnection();
    $email = $_POST['email'];
    $password = md5(trim($_POST['password']));
    $data = $obj->getAllData("SELECT * FROM donor WHERE email='$email'");
    if($data[0]['email']==$email && $data[0]['password']==$password)
    { 
        $_SESSION['donorid'] = $data[0]['donorid']; 
        $_SESSION['email'] = $data[0]['email'];
        header("Location:../Views/index.php");
    }
    else
    {
		$_SESSION['msg'] = "<div class='alert alert-danger'>Invalid Email or Password!</div>";
		header("Location:../Views/login.php");
        exit();
	}
?>