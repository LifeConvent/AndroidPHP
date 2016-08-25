<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function test(){
    	echo 'hello world!';    
    }

    //数据库连接测试
    public function getUserInfo(){
    	$user = M('user_info');//实例化user_info表模型对象
    	$user_info = $user->select();//对象查询
    	if($user_info){
    		//非空时以json对象返回查询结果
    		$this->ajaxReturn(array("code"=>"1","data"=>$user_info));
    	}else{
    		$this->ajaxReturn(array("code"=>"0","data"=>"获取信息失败！"));
    	}
    }
}