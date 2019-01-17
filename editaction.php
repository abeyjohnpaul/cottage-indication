<?php
$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$time=$_REQUEST['time'];
$amount=$_REQUEST['amount'];
$date=$_REQUEST['date'];
$remainderid=$_REQUEST['remainderid'];
$connec=mysqli_connect("localhost","root","sa","homeremainder");

$res=mysqli_query($connec, "update tbl_remainder set title='$title',description='$description',time='$time',amount='$amount',date='$date' where tbl_remainder_id='$remainderid'");

$result=array("msg"=>"edited successfully");

echo json_encode($result);
?>
