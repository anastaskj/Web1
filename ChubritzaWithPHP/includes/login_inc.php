<?php

session_start();

if (isset($_POST['submit'])) {
	include 'dbh_inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//empty field check
	if ( empty($email) || empty($password) )
	{
		header("Location: ../LogIn.php?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_email = '$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck<1) 
		{
			header("Location: ../LogIn.php?login=error");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result)) {
				//password de-hashing
				$hashedPassCheck = password_verify($password, $row['user_pass']);
				if (!$hashedPassCheck)
				{
					header("Location: ../LogIn.php?login=error");
					exit();
				}
				elseif($hashedPassCheck)
				{
					//logging in
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_age'] = $row['user_age'];
					header("Location: ../MyAccount.php");
					exit();
				}
			}
		}
	}	
}
else
{
	header("Location: ../index.php?login=error");
	exit();
}