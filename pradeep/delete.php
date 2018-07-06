<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} 


if (isset($_GET['delete'])) {
	$Id = $_GET["delete"];
	$sql="DELETE FROM Info WHERE Id=$Id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
	
}
include('list.php');

?>