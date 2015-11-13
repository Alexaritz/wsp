<?php
$myfile = fopen("Top500.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("Top500.txt.txt"));
fclose($myfile);
?>