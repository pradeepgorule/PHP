<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "connection successfully";
// Create database
/*$sql = "CREATE DATABASE customer";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/
/*
// Insert data into table 
$sql = "INSERT INTO Info (First_Name, Last_Name,DOB,Gender,Email,Mobile,Address)
VALUES ('John', 'Doe','2018-07-12','male', 'john@example.com','1234567890','ABCDEF')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
$name = $_POST['name'];
$lname = $_POST['lname'];
$DOB = $_POST['date'];
$Gender = $_POST['gender'];
$Email = $_POST['email'];
$Mobile = $_POST['mob'];
$Address = $_POST['add'];


if (isset($_POST['submit']))
{
$sql = "INSERT INTO Info (First_Name, Last_Name,DOB,Gender,Email,Mobile,Address)
VALUES ('$name','$lname','$DOB','$Gender','$Email','$Mobile','$Address')";
if ($conn->query($sql) === true) {
    echo "New record created successfully";
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

if (isset($_POST['update']))
{
 	$sql="UPDATE Info SET First_Name='$name',Last_Name='$lname',DOB='$DOB',Email='$Email',Address='$Address' WHERE Mobile='$Mobile'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
include('list.php');
$conn->close();
?>