<?php 
require("connection.php");

function searchStores($store){
    $connect=OpenCon();
    $data=[];
    $query ="SELECT storename from stores WHERE storename LIKE: $store";

    //$result=$connect->query($query);
    if($result = mysqli_query($connect, $query)){
        if(mysqli_num_rows($result) > 0)
        {
         while($name =  $result->fetch_assoc())
         {
             array_push($data,$name["firstname"]);
         }
            // mysqli_fetch_array($result);
            // $data= $name;
          
}}


return $data;}

function DisplayStores(){
    $connect=OpenCon();
    $data=[];
    $query ="SELECT storename from stores";

    //$result=$connect->query($query);
    if($result = mysqli_query($connect, $query)){
        if(mysqli_num_rows($result) > 0)
        {
         while($name =  $result->fetch_assoc())
         {
             array_push($data,$name["storename"]);
         }
            // mysqli_fetch_array($result);
            // $data= $name;
          
}}


return $data;}
?>