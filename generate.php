<?php

require 'main.php';
session_start();
include "con-db.php";
$long_url = mysqli_real_escape_string($con,$_POST['long']);
// echo $long_url;
$sql = "INSERT into data(long_url) VALUES ('$long_url')" ;

//$result = mysqli_query($con,"SELECT max(id) as max from data");
//$row = mysqli_fetch_array($result,MYSQL_ASSOC);
//echo $row['max'] . '\n';

if(mysqli_query($con,$sql))
{
	// echo "yo";
}
else
{
	echo mysqli_error();
}
// printf("new id %d.\n",mysqli_insert_id($con));
$inserted_id = mysqli_insert_id($con);
// printf("Last inserted record has id %d\n", mysql_insert_id());


$con->close();


$shorten_id = base_encode($inserted_id, $alphabet);
echo 'Your shorted url for ' . $long_url . ' is ' . 'http://po.lo/' . $shorten_id;
// $decoded_id = base_decode($shorten_id, $alphabet);

// echo  "<br/>";
// echo $decoded_id;
?>

