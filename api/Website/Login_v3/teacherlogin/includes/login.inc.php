<?php
if ( isset($_POST['login-submit'])){

	require 'dbh.inc.php';
	$RollNo=$_POST['teacherName'];
	$password=$_POST['teacherPassword'];
	
	if (empty($RollNo) || empty($password))
	{
		header("Location: ../index.php?error=emptyfileds");
		exit();
	}	
	else
	{
		$sql="SELECT * from teachersdata WHERE teacherName='$RollNo'  OR teacherPassword='$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = $result->fetch_assoc();
			session_start();
			$_SESSION['teacherId']=$row['teacherID'];
			$_SESSION['teacherUid']=$row['teacherName'];

			header("Location: ../../docs/studentDetails.php");
			exit();
		}
		else {
			header("Location: ../index.php?error=nouser");
			exit();
		}


		// $stmt=mysqli_stmt_init($conn);
		// if(!mysqli_stmt_prepare($stmt,$sql)){
		// 	header("Location: ../index.php?error=sqlerror");
		// 	exit();	
		// }
		// else
		// {
		// 	mysqli_stmt_bind_param($stmt,"ss",$RollNo,$RollNo);
		// 	mysqli_stmt_execute($stmt);
		// 	$result= mysqli_stmt_get_result($stmt);
		// 	if($row= mysqli_fetch_assoc($result))
		// 	{
		// 		$pwdCheck= password_verify($password,$row['Password']);
		// 		if($pwdCheck == false)
		// 		{
		// 			session_start();
		// 			$_SESSION['userId']=$row['RollNo'];
		// 			$_SESSION['userUid']=$row['Name'];

		// 			header("Location: ../index.php? login=success");
		// 			exit();
		// 		}
		// 		else if($pwdCheck ==true)
		// 		{
		// 			session_start();
		// 			$_SESSION['userId']=$row['RollNo'];
		// 			$_SESSION['userUid']=$row['Name'];

		// 			header("Location: ../index.php? login=success");
		// 			exit();	
		// 		}
		// 	}
		// 	else
		// 	{
		// 		header("Location: ../index.php?error=nouser");
		// 		exit();
		// 	}

		//}
	}
}	
else
{
	header("Location: ../index.php");
	exit();
}

