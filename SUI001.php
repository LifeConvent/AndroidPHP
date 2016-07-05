<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/19
 * Time: 下午4:39
 */

require 'DBcon/UserInfoSearch.php';
$username = 'admin';
$username = $_POST['username'];
$response = search_user_info($username);
//$response = insert_user_info('name','nan',34,'nan','nan','nan','nan');
//$response = update_user_info($username,'gao',null,null,null,null,null);
echo json_encode($response);