<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

//开启调试模式，开发阶段开启，部署时关闭
define('APP_DEBUG',True);

//定义应用目录
define('APP_PATH','./Application/');

//引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

$id = $_GET['id'];
$ch = curl_init();

if ($id != null)
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/AndroidPHP/index/' . $id . '.php');

switch ($id) {
    case 'SI001':
    case 'SU001':
        $name = $_POST['name'];
        $pass = $_POST['pass'];

        $data = array('username' => $name, 'userpass' => $pass);
        break;
    case 'RP001':
        $name = $_POST['name'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];

        $data = array('username' => $name, 'oldpass' => $oldpass, 'newpass' => $newpass);
        break;
    case 'SUI001':
        $method = $_GET['m'];
        $account = $_POST['account'];
        if ($method != 'SUI' && $method != 'SUIM') {
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $birthday = $_POST['birthday'];
            if ($_POST['image'] != null && $_POST['image'] != '') {
                $data = array('username' => $account, 'method' => $method, 'birthday' => $birthday, 'name' => $name, 'sex' => $sex, 'age' => $age, 'city' => $city, 'phone' => $phone, 'image' => $_POST{'image'});
            } else {
                $data = array('username' => $account, 'method' => $method, 'birthday' => $birthday, 'name' => $name, 'sex' => $sex, 'age' => $age, 'city' => $city, 'phone' => $phone);
            }
        }else{
            $data = array('username' => $account, 'method' => $method);
        }

//        if ($_FILES['image']['name'] != null) {
//            $cfile = curl_file_create($_FILES['image']['name'], 'image/jpeg', 'image');
//            $data = array('username' => $name, 'method' => $method, 'image' => $cfile);
//        } else {
//            $data = array('username' => $name, 'method' => $method);
//        }
        break;
    default:
        $data = null;
        break;
}

if ($data != null) {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
}

//没用的修改,区别分支