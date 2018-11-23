<?php
// 接收用户注册数据
$username=$_GET['username'];
$password=md5($_GET['password']);
$phone=$_GET['phone'];
$code=$_GET['code'];

// 从redis中获取之前存储的验证码
$redis=new Redis;
$redis->connect('127.0.0.1',6379);
$old_code=$redis->get('code');

// 判断用户输入的验证码是否和之前存储在redis中的验证码一致，如果一致，则说明用户输入对了
if($code==$old_code){
	// 入库
	$pdo=new Pdo('mysql:host=localhost;dbname=test;charset=utf8','root','root');
	$sql="insert into user1(username,password,phone,status) values('$username','$password','$phone','1')";
	if($pdo->exec($sql)){
		echo '注册成功';
	}
}else{
	echo "<script>alert('验证码输入错误！');history.go(-1);</script>";
}