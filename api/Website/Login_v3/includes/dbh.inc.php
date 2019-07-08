<?php

$servername="Localhost";
$dBUsername="id10093143_inara";
$dBPassword="@gnels2017";
$dBName="id10093143_biometricattendance";

$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if(!$conn)
{
	echo("connected!");
	die("Connection failed: ".mysqli_connect_error());
}