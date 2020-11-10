<?php
	session_start();
	include("../class/DBconnection.php");
	include("../class/GUID.php");
	$obj = new DBconnection();
	$guidObj = new GUID();
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$mobile_number = $_POST['mobile_number'];
	$blood_group = $_POST['blood_group'];


	$gender = $_POST['gender'];
	$division = $_POST['division'];
	$district = $_POST['district'];
	$thana = $_POST['thana'];
	$birth_date = $_POST['birth_date'];
	$occupation = $_POST['occupation'];
	$social_link =  $_POST['social_link'];
	$last_donated_date = $_POST['last_donated_date'];
	$profile_pic = $_POST['profile_pic'];


	$gender = empty($gender)?"NULL":"'$gender'";
	$division = empty($division)?"NULL":"'$division'";
	$district = empty($district)?"NULL":"'$district'";
	$thana = empty($thana)?"NULL":"'$thana'";
	$birth_date = empty($birth_date)?"NULL":"'$birth_date'";
	$occupation = empty($occupation)?"NULL":"'$occupation'";
	$social_link =  empty($social_link)?"NULL":"'$social_link'";
	$last_donated_date = empty($last_donated_date)?"NULL":"'$last_donated_date'";
	$profile_pic = empty($profile_pic)?"NULL":"'$profile_pic'";
	$ready_to_donate = $_POST['ready_to_donate'];

	$hashedPassword = md5(trim($password)); 

	// $info = pathinfo($_FILES['profile_pic']['name']);

	// if(!empty($info)){
	// 	$ext = $info['extension'];
	// 	$guid = $guidObj->newGuid();
	// 	$newname = $guid.$ext; 
	// 	$target = '../Images/'.$newname;
	// 	move_uploaded_file( $_FILES['profile_pic']['tmp_name'], $target);
	// 	$profile_pic = $target;
	// }



	header("Location:../Views/donoradd.php");
	$data = $obj->getAllData("SELECT email FROM donor WHERE email='$email'");

	if(count($data) > 0)
	{
		$_SESSION['msg'] = "<div class='alert alert-danger'>This email already registered!</div>";
		exit();
	}

	$user_id = $obj->insertData("INSERT INTO donor(full_name, email, password, mobile_number, blood_group, gender, division, district, thana, birth_date, occupation, social_link, last_donated_date, profile_pic, ready_to_donate) VALUES('$full_name', '$email', '$hashedPassword', '$mobile_number', '$blood_group', $gender, $division, $district, $thana, $birth_date, $occupation, $social_link, $last_donated_date, $profile_pic, '$ready_to_donate')");

	if($user_id)
	{
		$_SESSION['msg'] = "<div class='alert alert-success'>Thanks for registration! You are now a donor of Blood Quest </div>";
		header("Location:../Views/login.php");
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Oops! Please try again.</div>";
		header("Location:../Views/donoradd.php");
	}


?>