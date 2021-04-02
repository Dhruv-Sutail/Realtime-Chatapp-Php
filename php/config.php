<?php 
    $conn = mysqli_connect("localhost" , "root" , "" ,"chatapp");
    if(!$conn){
        echo "Database Connected" . mysqli_connect_error();
    } 
?>