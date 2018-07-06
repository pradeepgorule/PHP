<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	table 
	{
		border: 1px solid black;
	}
	table td,th
	{
		border-right: 1px solid black;
	}
	table th
	{
		border-bottom: 1px solid black;
	}
</style>
<body>

<html>

<script type="text/javascript">
	function validate() {
    
    if (confirm("are you want delete")) {
    
        return true;
          } 
          else {
        
        return false;
    }
   
}

</script>
<body>

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
 
  $sql ="SELECT Id,First_Name,Last_Name,email FROM INFO";
  $result = $conn->query($sql);

if($result->num_rows > 0 )
{	
	$Id = isset($_GET['Id']);
	//echo"<h4>NAME</h4>";
	$table_display = '';

	while($row = $result->fetch_assoc())
	{
	/*	echo $row["Id"]."\t".$row["First_Name"]."\t".$row["Last_Name"];
	echo '<a href="delete.php?delete='.$row["Id"].'" id="alert" onclick="return validate()">Delete</a>',"<br><br>";*/
	
	$table_display.='<tr>
					
					<td>'.$row["First_Name"].'</td>
					<td>'.$row['Last_Name'].'</td>
					<td>'.$row['email'].'</td>
					<td><a href="delete.php?delete='.$row["Id"].'" id="alert" onclick="return validate()">Delete</a>
				</tr>';
}
}
else
{
	echo"No data Found";
}




/*for ($i = 0; $i <  $result->num_rows; $i++) {
    echo '<input type="submit" name="clicked['.$i.']" value="clicked" />';
}
<input type="text" name="id">
<input type="submit" name="submit" value="delete">
<input type="text" name="id">
<input type="submit" name="submit" value="delete">
*/
?>
<table>
	<tr>
		<th >Name</th>
		<th>Last Name</th>
		<th>Email</th>

		<?php echo $table_display;?>
</table>
</body>


</html>
</body>
</html>