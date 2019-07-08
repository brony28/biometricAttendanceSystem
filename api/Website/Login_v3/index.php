<?php
require "header.php";

?>

<main>
	<?php
		if(isset($_SESSION['userId']))
		{
			$id = $_SESSION['userId'];
			echo $id;
		}
		else
		{
			echo '<p>You are logged out</p>';
		}
	?>
</main>


