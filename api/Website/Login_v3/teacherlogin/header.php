<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name="description" content="">
	<title></title>
	

</head>
<body">
	<header>
		<nav>
		<ul>
			<a href="index.php">Home</a>
		</ul>

		<div>
			<?php
				if(isset($_SESSION['teacherId']))
				{
				echo '<form action="includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
				}
				else
				{
				echo '
				<div style="background-color = "white";">
				<form action="includes/login.inc.php" method="post">
				<input type="text" name="teacherName" placeholder="username">
				<input type="password" name="teacherPassword" placeholder="password">
				<button type="submit" name="login-submit">Login</button>
				</form> 
				<a href ="../header.php">Student Login</a></div>';
				}
				?>

		</div>
		</nav>

	</header>

</body>
</html>