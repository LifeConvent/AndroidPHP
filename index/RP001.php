<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/18
 * Time: 上午9:43
 */

require '../DBcon/UserSearch.php';

//$name = 'adm';
//$oldpass = '21232f297a57a5a743894a0e4a801fc3';
//$newpass= '21232f297a57a5a743894a0e4a801fc3';
$name = $_POST['username'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$response = update_user($name,$oldpass,$newpass);
echo json_encode($response);