<?php
   //echo $_GET['q'];  //Output: myquery

//$overall ='';
//if(isset($_GET[""]))
//{
//$servername = $_GET['server'];
//$username = $_GET['user'];
//$password = $_GET['password'];
//$dbname = $_GET['database'];
//}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farhaan";
error_reporting(E_ALL ^ E_DEPRECATED);
   $con = mysql_connect($servername,$username,$password);

if (!$con)

  {

  die(mysql_error());

  }



if(!mysql_select_db($dbname, $con))
{
    die(mysql_error());
}
echo "<a href='display-count-ex.php?q=today&m='>Today's</a >",' ';
echo "<a href='display-count-ex.php?q=week&m='>week</a >",' ';


if(isset($_GET['q']) || isset($_GET['m'])){
$q = $_GET['q'];
$m = $_GET['m'];
$result = mysql_query("select distinct year((FROM_UNIXTIME(created)))as year from node");// query for displaying years
//get data of a year
$result2 = mysql_query("select type, count(*) as count from node where year(FROM_UNIXTIME(created))= ".$q." group by type");
$result3= mysql_query("SELECT type, Count(*) as count from node where type is not null group by type");// overall count
$result4 = mysql_query("SELECT type, Count(*) as count from node where created > UNIX_TIMESTAMP(UTC_DATE()) group by type");// current date
$result5 = mysql_query("SELECT type, Count(*) as count from node where created >= UNIX_TIMESTAMP(UTC_DATE()-7) and created <=UNIX_TIMESTAMP(UTC_DATE()) group by type");//week count
$result6 = mysql_query("select distinct monthname(FROM_UNIXTIME(created)) as month,year(FROM_UNIXTIME(created)) as year from node where year(FROM_UNIXTIME(created))=  ".$q."");// month count
$result7 = mysql_query("select type, count(*) as count from node where year(FROM_UNIXTIME(created))= ".$q." and monthname(FROM_UNIXTIME(created))= '".$m."' group by type");//get count of month
$result8 = mysql_query("SELECT type, Count(*) as count from node where changed > UNIX_TIMESTAMP(UTC_DATE()) group by type");
$result9 = mysql_query("SELECT type, Count(*) as count from node where changed >= UNIX_TIMESTAMP(UTC_DATE()-7) and changed <=UNIX_TIMESTAMP(UTC_DATE()) group by type");






while($row = mysql_fetch_array($result))

  {
//    echo "" . $row['year'] . "";
echo "<a href='display-count-ex.php?q=". $row['year'] ."&m='>".$row['year']."</a >",' ';
}
echo "<a href='display-count-ex.php?q=overall&m='>Overall</a >",' ';

if ($q !='' && $q !='overall' && $q !='today' && $q !='week' && $q != 'todayupdate' && $q != 'weekupdate' && $m =='') {
echo "<br>";
echo "<br>";
echo "<br>";


// get months
while($row = mysql_fetch_array($result6))

  {

  echo "<a href='display-count-ex.php?q=". $row['year'] ."&m=".$row['month']."'>".$row['month']."</a >",' ';
  }
  echo "<br>";
  echo "<br>";
  echo "<br>";
    echo "count of " . $q ."";
  echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Count</th>
</tr>";






while($row = mysql_fetch_array($result2))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}

// Overall Count

if ($q == 'overall' && $m=='') {
echo "<br>";
echo "<br>";
echo "<br>";
echo  "Overall Count";
echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result3))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}

// Today's Count

if ($q == 'today' && $m=='') {
echo "<br>";
echo "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "<br>";
echo "<br>";
echo "<a href='display-count-ex.php?q=todayupdate&m='>Today's Updated</a >",' ';
echo "<br>";
echo "<br>";
echo "<br>";
echo  "Today's Count";
echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result4))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}

//Today changed count

if ($q == 'todayupdate' && $m=='') {
echo "<br>";
echo "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "<br>";
echo "<br>";
echo  "Today's Count";
echo "<br>";
echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result8))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}



// Past Week Count

if ($q == 'week' && $m =='' ) {
echo "<br>";
echo "<br>";
echo "From  " . date("Y-m-d"),"    ";
echo "To  " . date('d-m-Y',strtotime("-7 days"));
echo "<br>";
echo "<br>";
echo "<a href='display-count-ex.php?q=weekupdate&m='>Week updates</a >",' ';
echo "<br>";
echo "<br>";
echo  "Week Count";
echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Week Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result5))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}

//Week changed

if ($q == 'weekupdate' && $m =='' ) {
echo "<br>";
echo "<br>";
echo "From  " . date("Y-m-d"),"    ";
echo "To  " . date('d-m-Y',strtotime("-7 days"));
echo "<br>";
echo "<br>";
echo  "Week Count";
echo "<br>";
echo "<table border='1'>

<tr>

<th>Type</th>

<th>Week Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result9))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}


//Month wise count

if ($q != '' && $m !='') {

$q1 = $_GET['q'];
$m1 = $_GET['m'];
echo "<br>";
echo "<br>";
while($row = mysql_fetch_array($result6))

  {

  echo "<a href='display-count-ex.php?q=". $row['year'] ."&m=".$row['month']."'>".$row['month']."</a >",' ';
  }
  echo "<br>";
  echo "<br>";
  echo "".$q1."";
echo "".$m1."";
  echo "<br>";

echo "<table border='1'>

<tr>

<th>Type</th>

<th>Count</th>
</tr>";



  # code...


while($row = mysql_fetch_array($result7))

  {

  echo "<tr>";

  echo "<td>" . $row['type'] . "</td>";

  echo "<td>" . $row['count'] . "</td>";


  }

echo "</table>";
}
}
mysql_close($con);

?>


