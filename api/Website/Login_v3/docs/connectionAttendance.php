<?php

$connection =	mysqli_connect('Localhost' , 'id10093143_inara' ,'@gnels2017' ,'id10093143_biometricattendance');

if(isset($_POST['RollNo'])){
	
	$RollNo = $_POST['RollNo'];
	$BranchID = $_POST['BranchID'];
	$Lectures = $_POST['Lectures'];
	$extraAttendance = $_POST['extraAttendance'];


	//  query to update data 
	 echo "This is executed";
	$mysqlQuery = "UPDATE attendance19_20 SET BranchID='$BranchID' , Lectures='$Lectures' , extraAttendance = '$extraAttendance', totalAttendance = '$Lectures' + '$extraAttendance' WHERE RollNo='$RollNo'";
	$result = mysqli_query($connection, $mysqlQuery);
	if ($connection->query($mysqlQuery) === TRUE) {
		echo 'data updated';
	}
	else {
		echo "Some error occured".$mysqlQuery."<br>".$connection->error;
	}
	
}

$connection->close();
?>