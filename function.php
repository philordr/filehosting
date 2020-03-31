<?php
require 'sql/dbConnector.php';
//autodelete files with in 120 days
$pp = date("Y-m-d");

$sql = "select * from filedirectory";

$result = mysqli_query($conn, $sql);
//echo $result;
while ($row1 = mysqli_fetch_array($result))
{
  $files = $row1['fileNameS'];
  $exp = $row1['expireDate'];
  
  $fileDel = "download/";
  if (strtotime(date("Y-m-d"))>=strtotime($exp))
  {
    $sql = "delete from filedirectory where expireDate='".$exp."'";
    mysqli_query($conn, $sql);
    unlink($fileDel.$files);
  }
  
}

?>