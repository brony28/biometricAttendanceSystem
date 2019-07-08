<?php 

require "conn.php";

$RollNo = htmlentities($_GET["RollNo"]);
$zero = 0;
$mysqlQuery = "SELECT * FROM studentdata WHERE RollNo = '$RollNo'";
$result = mysqli_query($conn, $mysqlQuery);
if (mysqli_num_rows($result) > 0) {
	echo "EXISTS";
}
else {
	echo "Does NOT exist";
	$mysqlQuery = "INSERT INTO studentdata (RollNo, Password) VALUES ('$RollNo', '$RollNo')";
	if ($conn->query($mysqlQuery) === TRUE) {
		echo "Registered successfully!";
	}
	else {
		echo "Some error occured!".$mysqlQuery."<br>".$conn->error;
	}
}

$mysqlQuery = "SELECT * FROM attendance19_20 WHERE RollNo = '$RollNo'";
$result = mysqli_query($conn, $mysqlQuery);
if (mysqli_num_rows($result) > 0) {
	echo "EXISTS";
}
else {
	echo "Does NOT exist";
	$mysqlQuery = "INSERT INTO 	attendance19_20 (RollNo, extraAttendance) VALUES ('$RollNo', '$zero')";
	if ($conn->query($mysqlQuery) === TRUE) {
		echo "Registered successfully!";
	}
	else {
		echo "Some error occured!".$mysqlQuery."<br>".$conn->error;
	}
}


	$conn->close();

 ?>