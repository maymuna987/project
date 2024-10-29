<?php 

    $con =mysqli_connect('localhost','root','','e_commerce');
    if(!$con){
        echo "Not Connected";
    }