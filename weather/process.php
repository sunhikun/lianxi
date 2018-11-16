<?php
$redis=new Redis;
$redis->connect('127.0.0.1',6379);
$city=$_GET['city'];		// 城市
if($redis->exists($city)){
	// redis中缓存有查询结果，直接从redis中读取，不调用接口
	$str=$redis->get($city);
	echo 'from redis';
	echo $str;		// $str是json数组，因为之前往redis中存放时，就是转换成json存入的
}else{
	// redis中未缓存数据，则调用接口，获取天所数据，入库，入redis
	$key='dafee26d83214794a37155037c9c69b2';
	$url="https://free-api.heweather.com/s6/weather/forecast?location=$city&key=$key";

	// 调用接口，获取数据
	$str=curl_get($url);
	//echo $str;		// $str本身就是json格式的字符串，所以别再用json_encode转换了

	// 天所数据入库
	$data=json_decode($str,true);
	$data=$data['HeWeather6'][0]['daily_forecast'];		// 三天的天气信息
	// echo '<pre/>';
	// print_r($data);
	$pdo=new PDO('mysql:host=localhost;dbname=test','root','root');
	foreach ($data as $key => $value) {
		$date=$value['date'];
		$maxTemp=$value['tmp_max'];		// 最高温度
		$minTemp=$value['tmp_min'];		// 最低温度
		$sql="insert into weather(city,date,maxtemp,mintemp) values('$city','$date','$maxTemp','$minTemp')";
		echo $sql;
		$pdo->exec($sql);
	}	

	// 天气数据入redis
	$str=json_encode($data);		// 将PHP数组转换成json格式字符串，我们是将字符串存放到redis中的
	$redis->set($city,$str);
	echo 'from db';
	echo $str;
}



// 天气数据返回前台

// cURL get 方式请求
function curl_get($url){
	// 1 初始化curl对象
	$ch=curl_init();
	// 2 设置参数
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	//curl_setopt($ch,CURLOPT_SSL_,$url);
	// 3 发送请求，获取数据
	$str=curl_exec($ch);
	// 4 关闭请求，释放资源
	curl_close($ch);
	// 5 返回查询结果
	return $str;
}