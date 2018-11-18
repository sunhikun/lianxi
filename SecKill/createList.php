<?php
$redis=new Redis;
$redis->connect('127.0.0.1','6379');
$redis->select(10);

$pdo= new PDO('mysql:host=localhost;dbname=test;','root','root');
$sql="select id,stock from goods";
$data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $key => $value) {
    for($i=1;$i<=$value['stock'];$i++){
        $redis->lpush('goods'.$value['id'],$i);
    }
}