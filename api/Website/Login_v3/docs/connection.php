<?php

$connection =	mysqli_connect('Localhost' , 'id10093143_inara' ,'@gnels2017' ,'id10093143_biometricattendance');

if(isset($_POST['RollNo'])){
	
	$RollNo = $_POST['RollNo'];
	$BranchID = $_POST['BranchID'];
	$Name = $_POST['Name'];
	$EmailID = $_POST['EmailID'];
	$PhoneNo = $_POST['PhoneNo'];


	//  query to update data 
	 echo "This is executed";
	$mysqlQuery = "UPDATE studentdata SET BranchID='$BranchID' , Name='$Name' , EmailID = '$EmailID', PhoneNo = '$PhoneNo' WHERE RollNo='$RollNo'";
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