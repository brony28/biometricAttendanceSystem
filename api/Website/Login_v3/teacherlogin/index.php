<?php
require "header.php";

?>

<main>
	<?php
		if(isset($_SESSION['teacherId']))
		{
			$id = $_SESSION['teacherId'];
			echo $id;
		}
		else
		{
			echo '<p>You are logged out</p>';
		}
	?>
</main>


