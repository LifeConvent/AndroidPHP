<?php
/**
 * SetUserInfo---SUI
 * Created by PhpStorm.
 * User: lawrance
 * Date: 16/6/19
 * Time: 下午4:39
 */

require '../DBcon/UserInfoSearch.php';

//$username = 'admin';
$username = $_POST['username'];
$method = $_POST['m'];
$base_path = "../uploads_image/"; //接收文件目录

switch ($method) {
    case'SUI':
        $response = search_user_info($username);
        break;
    case'IUI':
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $response = insert_user_info($username, $name, $sex, $age, $city, $phone, $birthday);
        break;
    case'UUI':
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $response = update_user_info($username, $name, $sex, $age, $city, $phone, $birthday);
        break;
    case'SUIM':
        $response = search_user_info_with_image_src($username);
        break;
    case'IUIM':
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];

        if ($_FILES["image"]["error"] > 0) {
            break;
        } else {
            $image_name = $_FILES["image"]["name"];//上传文件的名称
            $image_type = $_FILES["image"]["type"];
            $image_size = ($_FILES["image"]["size"] / 1024);
            $image_tmp = $_FILES["image"]["tmp_name"];//存储在服务器的文件的临时副本的名称

            $target_path = $base_path . basename($image_name);
            //失败时返回false
            move_uploaded_file($_FILES ['image'] ['tmp_name'], $target_path);
        }
        $response = insert_user_info_with_image_src($username, $name, $sex, $age, $city, $phone, $birthday, $target_path);
        break;
    case'UUIM':
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];

        if ($_FILES["image"]["error"] > 0) {
            break;
        } else {
            $image_name = $_FILES["image"]["name"];//上传文件的名称
            $image_type = $_FILES["image"]["type"];
            $image_size = ($_FILES["image"]["size"] / 1024);
            $image_tmp = $_FILES["image"]["tmp_name"];//存储在服务器的文件的临时副本的名称

            $target_path = $base_path . basename($image_name);
            //失败时返回false
            move_uploaded_file($_FILES ['image'] ['tmp_name'], $target_path);
        }
        $response = update_user_info_with_image_src($username, $name, $sex, $age, $city, $phone, $birthday,$target_path);
        break;
    /**
     *  路径重名问题待解决
     */
}



echo json_encode($response);

/**
 * 插入_更新
 */
//$response = search_user_info($username);
//$response = insert_user_info('name','nan',34,'nan','nan','nan','nan');
//$response = update_user_info($username,'gao',null,null,null,null,null);

//$fp = fopen($_FILES["image"]["tmp_name"],"rb");
//$buf_image = addslashes(fread($fp,$_FILES["image"]["size"]));

//$PicturePath = '../uploads_image/1.jpg';
//$response = update_user_info_with_image_src('name', 'nan', '23', 18, 'nan', 'nan', 'nan', $PicturePath);
/**
 *
 * $base_path = "../uploads_image/"; //接收文件目录
 * $target_path = $base_path . basename ( $_FILES ['image'] ['name'] );
 * if (move_uploaded_file ( $_FILES ['image'] ['tmp_name'], $target_path )) {
 * $array = array ("code" => "1", "message" => $_FILES ['image'] ['name'] );
 * echo json_encode ( $array );
 * } else {
 * $array = array ("code" => "0", "message" => "There was an error uploading the file, please try again!" . $_FILES ['image'] ['error'] );
 * echo json_encode ( $array );
 * }
 *
 */

/**
 *
 * 以二进制形式存储到数据库
 *
 * $blob_img = addslashes(fread(fopen($PicturePath, "rb"), filesize($PicturePath)));
 * $response = update_user_info_with_image('name','nan',34,'nan','nan','nan','nan',$blob_img);
 *
 * $conn = userCon();
 * $sql_search_user_info = "select * from user_info where user_name = 'name'";
 * $result = $conn->query($sql_search_user_info);
 * $row = $result->fetch_assoc();
 * Header( "Content-type: image/gif");
 * echo $row['image'];
 */