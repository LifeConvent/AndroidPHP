<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/18
 * Time: 上午9:42
 */

require 'DBcon/UserSearch.php';

//$name = 'adm';
//$pass = '21232f297a57a5a743894a0e4a801fc3';
$name = $_POST['username'];
$pass = $_POST['userpass'];
$response = insert_user($name,$pass);
echo json_encode($response);