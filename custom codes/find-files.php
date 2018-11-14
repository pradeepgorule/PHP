<?php
$dir = $_GET['dir'];
$exclude = array('.','..','.htaccess');
$q = (isset($_GET['q']))? strtolower($_GET['q']) : '';
$res = opendir($dir);
while(false!== ($file = readdir($res))) {
if(strpos(strtolower($file),$q)!== false &&!in_array($file,$exclude)) {
echo "<a href='$dir/$file'>$file</a>";
echo "<br>";
}
}
closedir($res);
?>
