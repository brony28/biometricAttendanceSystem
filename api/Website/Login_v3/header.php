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
<body>
	<header>
		<nav>
		<ul>
			<a href="index.php">Home</a>
		</ul>

		<div>
			<?php
				if(isset($_SESSION['userId']))
				{
				echo '<form action="includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
				}
				else
				{
				echo '
				<form action="includes/login.inc.php" method="post">
				<input type="text" name="RollNo" placeholder="username">
				<input type="password" name="Password" placeholder="password">
				<button type="submit" name="login-submit">Login</button>
				</form>
				<a href="teacherlogin/header.php">Teachers Login</a>';
				}
				?>

		</div>
		</nav>

	</header>

</body>
</html>