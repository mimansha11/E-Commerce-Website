<?php
    $servername="localhost";
    $username="root";
    $passwrod="";
    $database="login_info";
    $conn=new mysqli($servername, $username, $passwrod,$database);
    if($conn==true){
        //echo "Connection successful";
    }
?>