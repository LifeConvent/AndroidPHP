<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/18
 * Time: 下午7:12
 */

require 'DBconn.php';
function search_user($username, $userpassword)
{
    $conn = userCon();
    $sql_search_user = "select userpassword from user where username = '$username'";
    $result = $conn->query($sql_search_user);
    $conn->close();
    if ($row = $result->fetch_assoc()) {
        if ($userpassword == $row["userpassword"]) {
            return array('result' => 'success');
        } else {
            return array('result' => 'error', 'message' => 'WRONG_PASSWORD');
        }
    } else {
        return array('result' => 'error', 'message' => 'ACCOUNT_NOT_EXIST');
    }
}

function insert_user($username, $userpassword)
{
    $conn = userCon();
    $sql_search_user = "select userpassword from user where username = '$username'";
    $result = $conn->query($sql_search_user);
    if ($result->fetch_assoc()) {
        return array('result' => 'error', 'message' => 'ACCOUNT_EXIST');
    }
    $sql_insert_user = "insert into user (username,userpassword) VALUES ('$username','$userpassword')";
    $result = $conn->query($sql_insert_user);
    $conn->close();
    if ($result) {
        return array('result' => 'success');
    } else if (!$result) {
        return array('result' => 'error', 'message' => 'INSERT_FAILED');
    }
}

function update_user($username, $oldpass, $newpass)
{
    $conn = userCon();
    $sql_search_user = "select userpassword from user where username = '$username'";
    $result = $conn->query($sql_search_user);
    if ($row = $result->fetch_assoc()) {
        if ($oldpass == $row['userpassword']) {
            $sql_insert_user = "update user set userpassword='$newpass' WHERE username='$username'";
            $result = $conn->query($sql_insert_user);
            $conn->close();
            if ($result) {
                return array('result' => 'success');
            } else if (!$result) {
                return array('result' => 'error', 'message' => 'UPDATE_FAILED');
            }
        }else{
            return array('result' => 'error', 'message' => 'OLD_PASS_WRONG');
        }
    }else{
        return array('result' => 'error', 'message' => 'ACCOUNT_ERROR');
    }
}