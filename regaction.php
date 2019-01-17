<?php
$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$time=$_REQUEST['time'];
$amount=$_REQUEST['amount'];
$date=$_REQUEST['date'];
$connec=mysqli_connect("localhost","root","sa","homeremainder");

$res=mysqli_query($connec, "insert into tbl_remainder(title,description,time,amount,date)values('$title','$description','$time','$amount','$date')");

    $result=array("msg"=>"inserted successfully");
    
    echo json_encode($result);
?>
