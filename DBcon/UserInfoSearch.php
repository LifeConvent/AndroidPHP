<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/19
 * Time: 下午4:15
 */

require 'DBconn.php';

function search_user_info($username)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $result = $conn->query($sql_search_user_info);
    $conn->close();
    if ($row = $result->fetch_assoc()) {
        return array('account' => $username, 'name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'city' => $row['city']
        , 'phone' => $row['phone'], 'birthday' => $row['birthday']);
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_ERROR');
    }
}

function insert_user_info($username, $name, $sex, $age, $city, $phone, $birthday)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_insert_user_info = "insert into user_info (user_name,name,sex,age,city,phone,birthday) values(
    '$username','$name','$sex','$age','$city','$phone','$birthday')";
    $result = $conn->query($sql_search_user_info);
    if (!($row = $result->fetch_assoc())) {
        //执行插入
        if ($result = $conn->query($sql_insert_user_info)) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'INSERT_FAILED');
        }
    } else {
        //用户名注册,此时数据库中已经存在该用户名的个人信息表
        return array('result' => 'error', 'message' => 'ACCOUNT_EXIST');
    }
}

function update_user_info($username, $name, $sex, $age, $city, $phone, $birthday)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_update_user_info = "update user_info set name='$name',sex='$sex',age='$age',city='$city'
    ,phone='$phone',birthday='$birthday' where user_name='$username'";
    $result = $conn->query($sql_search_user_info);
    if ($row = $result->fetch_assoc()) {
        //执行插入
        $result = $conn->query($sql_update_user_info);
        $conn->close();
        if ($result) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'UPDATE_FAILED');
        }
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_NOT_EXIST');
    }
}

function insert_user_info_with_image($username, $name, $sex, $age, $city, $phone, $birthday,$image)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_insert_user_info = "insert into user_info (user_name,name,sex,age,city,phone,birthday,image) values(
    '$username','$name','$sex','$age','$city','$phone','$birthday','$image')";
    $result = $conn->query($sql_search_user_info);
    if (!($row = $result->fetch_assoc())) {
        //执行插入
        if ($result = $conn->query($sql_insert_user_info)) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'INSERT_FAILED');
        }
    } else {
        //用户名注册,此时数据库中已经存在该用户名的个人信息表
        return array('result' => 'error', 'message' => 'ACCOUNT_EXIST');
    }
}

function update_user_info_with_image($username, $name, $sex, $age, $city, $phone, $birthday,$image)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_update_user_info = "update user_info set name='$name',sex='$sex',age='$age',city='$city'
    ,phone='$phone',birthday='$birthday',image='$image' where user_name='$username'";
    $result = $conn->query($sql_search_user_info);
    if ($row = $result->fetch_assoc()) {
        //执行插入
        $result = $conn->query($sql_update_user_info);
        if ($result) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'UPDATE_FAILED');
            echo "Error".$sql_update_user_info.$conn->error;
        }
        $conn->close();
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_NOT_EXIST');
    }
}

function insert_user_info_with_image_src($username, $name, $sex, $age, $city, $phone, $birthday,$image_src)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_insert_user_info = "insert into user_info (user_name,name,sex,age,city,phone,birthday,image_src) values(
    '$username','$name','$sex','$age','$city','$phone','$birthday','$image_src')";
    $result = $conn->query($sql_search_user_info);
    if (!($row = $result->fetch_assoc())) {
        //执行插入
        if ($result = $conn->query($sql_insert_user_info)) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'INSERT_FAILED');
        }
    } else {
        //用户名注册,此时数据库中已经存在该用户名的个人信息表
        return array('result' => 'error', 'message' => 'ACCOUNT_EXIST');
    }
}

function update_user_info_with_image_src($username, $name, $sex, $age, $city, $phone, $birthday,$image_src)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $sql_update_user_info = "update user_info set name='$name',sex='$sex',age='$age',city='$city'
    ,phone='$phone',birthday='$birthday',image_src='$image_src' where user_name='$username'";
    $result = $conn->query($sql_search_user_info);
    if ($row = $result->fetch_assoc()) {
        //执行插入
        $result = $conn->query($sql_update_user_info);
        if ($result) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'UPDATE_FAILED');
            echo "Error".$sql_update_user_info.$conn->error;
        }
        $conn->close();
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_NOT_EXIST');
    }
}

function search_user_info_with_image_src($username)
{
    $conn = userCon();
    $sql_search_user_info = "select * from user_info where user_name = '$username'";
    $result = $conn->query($sql_search_user_info);
    $conn->close();
    if ($row = $result->fetch_assoc()) {
        $blob_img = addslashes(fread(fopen($row['image_src'], "rb"), filesize($row['image_src'])));

        //返回图片地址
        return array('account' => $username, 'name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'city' => $row['city']
        , 'phone' => $row['phone'], 'birthday' => $row['birthday'],'image_src' => $row['image_src']);
//        返回二进制图片
//        return array('account' => $username, 'name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'city' => $row['city']
//        , 'phone' => $row['phone'], 'birthday' => $row['birthday'],'image' => $blob_img);
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_ERROR');
    }
}