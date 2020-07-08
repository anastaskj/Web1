<?php

if (isset($_POST['submit'])) 
{
	include_once 'dbh_inc.php';
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//empty field check
	if ( empty($firstName) || empty($lastName) || empty($age) || empty($email) || empty($password) )
	{
		header("Location: ../SignUp.php?signup=empty");
		exit();
	} 
	else 
	{
		//valid input check
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName) || !preg_match("/^[0-9]*$/", $age)) 
		{
			header("Location: ../SignUp.php?signup=invalid");
			exit();
		} 
		else 
		{
			//valid email check
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../SignUp.php?signup=email");
			exit();
			} 
			else 
			{
				//unique user check
				$sql = "SELECT * FROM users WHERE user_email = '$email';";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0) 
				{
					header("Location: ../SignUp.php?signup=usertaken");
					exit();
				} 
				else 
				{
					//password hashing
					$hashedPass = password_hash($password, PASSWORD_DEFAULT);
					//insert new user into database
					$ins = "INSERT INTO users (user_first, user_last, user_email, user_age, user_pass) VALUES ('$firstName', '$lastName', '$email', '$age', '$hashedPass');";
					mysqli_query($conn, $ins);

					$selectUser = "SELECT * FROM users WHERE user_email = '$email';";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$userid = $row['user_id'];
							$ins = "INSERT INTO profile_image (userid, picstatus) VALUES ('$userid', 1);";
							$result = mysqli_query($conn, $ins);
							header("Location: ../SignUp.php?signup=success");
							//exit();
						}
					}
					
					
				}
			}
		}
	}
} 
else 
{
	header("Location: ../SignUp.php");
	exit();
}