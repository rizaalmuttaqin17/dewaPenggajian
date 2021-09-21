<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
date_default_timezone_set('Asia/Makassar');

// initializing variables
$name   = "";
$email  = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dewa_gaji');

// REGISTER USER
if (isset($_POST['register'])) {
	// receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);

	if ($password != $password2) {
		$errors['password'] = "Password tidak sama.";
	}

	// first check the database to make sure 
	// a user does not already exist with the same name and/or email
	$user_check_query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user) { // if user exists
		if ($user['name'] === $name) {
			$errors['name'] = "name Telah Digunakan.";
		}

		if ($user['email'] === $email) {
			$errors['email'] = "Email Telah Digunakan.";
			
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password); //encrypt the password before saving in the database

		$query = "INSERT INTO users (name, email, password) 
  			  VALUES('$name', '$email', '$password')";
		mysqli_query($db, $query);
		$_SESSION['name'] = $name;
		$_SESSION['success'] = "You are now logged in";
		header("location: ../index.php");
	}
}

// LOGIN USER
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
  
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
  
	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT users.id ,users.id_jabatan,users.name,jabatan.jabatan ,users.tgl_aktif,users.email,users.email,users.foto,users.role,users.tunjangan FROM users,jabatan WHERE email='$email' AND password='$password' AND jabatan.id=users.id_jabatan";
		$results = mysqli_query($db, $query);
		while($row=$results->fetch_assoc()){
			$_SESSION['role'] = $row['role'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['users'] = $row;
			
		}
		if (mysqli_num_rows($results) == 1) {
		  $_SESSION['email'] = $email;
		  $_SESSION['success'] = "You are now logged in";
		  header('location: http://localhost/Dewa_Penggajian/index.php');
		}else {
			$errors['akun'] = "Email atau password salah!.";
		}
	}

  }
$query2 = "SELECT * FROM kantor_setting";
$results2 = mysqli_query($db, $query2);
$settingKantor = [];
while($row = mysqli_fetch_array($results2)){    
	$settingKantor = $row;
}
?>