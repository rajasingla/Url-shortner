<?php
//error_reporting(E_ERROR | E_PARSE);		//suppress warnings and errors
require 'con-db.php';					// database connectivity
require 'main.php';						//file having the base_encode and base_decode dode
$short = $_POST['short'];
echo $short;
echo "<br/>";
// http://po.lo/
$len = strlen($short);
if($short[$len-1] == "/")		//remove the last forward slash in the link
	$short[$len-1] = NULL;

$short = substr($short, strpos($short, '/',12) + 1);
// echo $short;
// echo "<br/>";
$short = trim($short);

echo "<br/>";
$decoded_id = base_decode($short,$alphabet);
// echo $decoded_id;
session_start();
$sql_long = "SELECT long_url from data where id = '$decoded_id'";
$update = "UPDATE data SET clicks = clicks+1 WHERE id = '$decoded_id'";
if(!mysqli_query($con,$update))
{
	echo "Err";
}
$results =  mysqli_query($con,$sql_long);
while ($result = $results->fetch_assoc())
{
    echo $result['long_url'];
    // echo "<br/>helo";
}
$con->close();

?>