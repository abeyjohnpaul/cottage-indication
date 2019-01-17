<?php

$remainderid=$_REQUEST['remainderid'];
$connec=mysqli_connect("localhost","root","sa","homeremainder");

$res=mysqli_query($connec, "delete from tbl_remainder where tbl_remainder_id='$remainderid'");

$result=array("msg"=>"deleted successfully");

echo json_encode($result);
?>
