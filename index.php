<?php

$id = $_GET['id'];
$ch = curl_init();

if ($id != null)
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/AndroidPHP/' . $id . '.php');

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
        $name = $_POST['name'];
        $data = array('username' => $name);
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