<?php
$id=$_GET['id'];
$redis=new Redis;
$redis->connect('127.0.0.1',6379);
$redis->select(10);
$pdo= new PDO('mysql:host=localhost;dbname=test;','root','root');

$key='goods'.$id;
if($redis->llen($key)>0){
    $redis->lpop($key);
    $sql="update goods set stock=stock-1 where id=$id";
    $order_id=date('Ymd',time()).md5(rand(100,999));
    $addtime=time();
    $sql1="insert into order(order_id,goods_id,addtime) values('$order_id',$id,$addtime)";

    if($data=$pdo->exec($sql)){
        $pdo->exec($sql1);
        echo json_encode(['code'=>1,'msg'=>'秒杀成功!']);
    }
}else{
    echo json_encode(['code'=>0,'id'=>$id,'msg'=>'秒杀结束！']);
}

