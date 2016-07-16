<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/7/16
 * Time: 上午10:34
 */

function search_delete_src_info()
{
    $conn = userCon();
    $sql_search_delete_src = "select * from delete_src";
    $result = $conn->query($sql_search_delete_src);
    $conn->close();
//    if ($row = $result->fetch_assoc()) {
//    } else {
//    }
}

function insert_delete_src_info($src)
{
    $conn = userCon();
    $sql_insert_delete_src = "insert into delete_src (not_delete_src) values(
    '$src')";
    if ($result = $conn->query($sql_insert_delete_src)) {
//            return array('result' => 'success');
    } else {
//            return array('result' => 'error', 'message' => 'INSERT_FAILED');
//        }
    }
}