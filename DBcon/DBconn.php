<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/18
 * Time: 下午7:01
 */


function userCon(){
    $severname = "localhost";
    $DBcount = "root";
    $DBpass = "123456";
    $DBname = "userinfo";
    $conn = new mysqli($severname, $DBcount, $DBpass,$DBname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}