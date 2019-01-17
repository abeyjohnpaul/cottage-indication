<?php
$date=$_REQUEST['date'];
$connec=mysqli_connect("localhost","root","sa","homeremainder");
$data=array();
$res=mysqli_query($connec, "select * from tbl_remainder where date='$date'");
while ($row=mysqli_fetch_array($res))
{
    $title=$row['title'];
    $description=$row['description'];
    $time=$row['time'];
    $amount=$row['amount'];
    $date=$row['date'];
    $remainder_id=$row['tbl_remainder_id'];
    $result=array("titlekey"=>$title,"descriptionkey"=>$description,"timekey"=>$time,"amountkey"=>$amount,"datekey"=>$date,"remainder_idkey"=>$remainder_id);
    array_push($data, $result);
    
    
}
echo json_encode($data);
?>
