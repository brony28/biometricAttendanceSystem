<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$response = array();

if (isset($_GET['RollNo'])) {
	$RollNo = $_GET['RollNo'];
	$filepath = realpath(dirname(__FILE__));
	require_once($filepath."/db_connect.php");
	$db = new DB_CONNECT();
	$result = mysql_query("INSERT INTO studentdata(RollNo) VALUES('$rollNo')");

	if ($result) {
		$response["success"] = 1;
		$response["message"] = "New student entered";
		echo json_encode($response);
	}
}
else {
	$response["success"] = 0;
	$response["message"] = "Error. Parameters missing.";
	echo json_encode($response);
	}

?>