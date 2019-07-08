<?php 

require "conn.php";

$RollNo = htmlentities($_GET["RollNo"]);
$status = 1;
$mysqlQuery = "SELECT * FROM attendance19_20 WHERE RollNo = '$RollNo'";
$result = mysqli_query($conn, $mysqlQuery);
$row = $result->fetch_assoc();
$currentAttendance = (int)$row['Lectures'];


$result = mysqli_query($conn, $mysqlQuery);
if (mysqli_num_rows($result) > 0) {
	$mysqlQuery = "UPDATE attendance19_20 SET Lectures = '$currentAttendance' + '$status', totalAttendance = extraAttendance + Lectures  WHERE RollNo = '$RollNo'";

	if ($conn->query($mysqlQuery) === TRUE) {
		echo "Registered successfully!";
	}
	else {
		echo "Some error occured!".$mysqlQuery."<br>".$conn->error;
	}
}
else {
	echo "Does NOT exist";

}
	$conn->close();

 ?>