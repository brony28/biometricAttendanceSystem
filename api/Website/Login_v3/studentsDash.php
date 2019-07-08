<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('bg-01.jpg');">
				<div style="background-color: white; box-shadow: 5px 5px 30px black;">
					
					<table class="table">
					    <thead>
					      <tr>
					        <th>RollNo</th>
					        <th>Branch</th>
					        <th>Lectures Attended</th>
					        <th>Extra Attendence</th>
					        <th>Total Attendance</th>
					        <th>% Attendance</th>
					      </tr>
					    </thead>
					    <tbody>
      <?php

      	  $RollNo = $_SESSION['userId'];
      	  $connection = mysqli_connect('Localhost' , 'id10093143_inara' ,'@gnels2017' ,'id10093143_biometricattendance');
      	  $sql = "SELECT MAX(Lectures) AS maximum FROM attendance19_20";
      	  $result = mysqli_query($connection, $sql);
      	  $row = $result->fetch_assoc();
      	  $maxAttendance = (int)$row['maximum'];

      	  $sql = "SELECT Lectures AS currentAtt FROM attendance19_20 WHERE RollNo = '$RollNo'";
      	  $result = mysqli_query($connection, $sql);
      	  $row = $result->fetch_assoc();
      	  $currentAttendance = (int)$row['currentAtt'];

      	  $attenPer = ($currentAttendance / $maxAttendance)*100;
      	  $atteSkipped = $maxAttendance - $currentAttendance;
          $sql = "SELECT * FROM attendance19_20 WHERE RollNo = '$RollNo'";
          $result  = mysqli_query($connection ,$sql);

          while($row  = mysqli_fetch_array($result)){ ?>
              <tr id="<?php echo $row['RollNo']; ?>">
                <td data-target="RollNo"><?php echo $row['RollNo']; ?></td>
                <td data-target="BranchID"><?php echo $row['BranchID']; ?></td>
                <td data-target="Lectures"><?php echo $row['Lectures']; ?></td>
                <td data-target="extraAttendance"><?php echo $row['extraAttendance']; ?></td>
                <td data-target="totalAttendance"><?php echo $row['totalAttendance']; ?></td>
                <td> <?php echo $attenPer; ?></td>
              </tr>
         <?php }
       ?>
       
    </tbody>
  </table>
  	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
 
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Attendance'],
          <?php 

          	$sql = "SELECT * FROM attendance19_20 WHERE RollNo = '$RollNo'";
          	$result  = mysqli_query($connection ,$sql);
          	if($result->num_rows > 0){
          		while($row = $result->fetch_assoc()){
          			$lecturesLbl = "Lectured Attended";
          			$lecturesExtra = "Extra Attendance";
          			$lecSkip = "Lectures Skipped";
            echo "['".$lecturesExtra."', ".$row['extraAttendance']."],";
            echo "['".$lecturesLbl."', ".$row['Lectures']."],";
            echo "['".$lecSkip."', ".$atteSkipped."],";
          }
      }?>
        ]);
 
        var options = {
          title: 'Attendance chart'
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
        chart.draw(data, options);
      }
    </script>


				</div>
				<div id="piechart" style="width: 900px; height: 500px;"></div>
			</div>

		</div>


</body>
</html>