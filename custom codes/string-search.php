<?php

$search = $_GET['search'];                                 //enter any string
$dir = $_GET['dir2'];
$ext = $_GET['ext'];                                           // enter directory or folder location
$files = scandir($dir,1);                                                         // return list of files inside the directory
foreach ($files as $lines){
    if(strlen($lines) > 3 && strpos($lines, $ext) !== false){
        $readfile = fopen($dir.$lines, 'r');

        while(!feof($readfile)) {
            $contents = fgets($readfile);
            if(strpos($contents, $search) !== false)
                echo $lines.'<br>';
        }
        fclose($readfile);
    }
}
?>

