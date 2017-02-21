<?php 

if($_GET['filename']) $filename=$_GET['filename'].'jpg';
else $filename='photo.jpg';
header('Content-Type: image/png');
header("Content-Disposition: inline;filename='".$filename."'");
header("Pragma: no-cache");
header("Expires: 0");

$ctx = stream_context_create(array(   
   'http' => array(   
       'timeout' => 1 
       )   
   )   
);  

//$content = file_get_contents(urldecode($_GET['url'],0,$ctx);
$fp = fopen(urldecode($_GET['url']),"rb",false, $ctx);
fpassthru($fp); 

