<?php 
/**
  *定义一个变量
  */
$n = 153;

/**
  *分割位数
  */
echo "是水仙花数";die;
$this->wei($n);
$rd = self::$ws[0] * self::$ws[0] * self::$ws[0];
$nd = self::$ws[1] * self::$ws[1] * self::$ws[1];
$st = self::$ws[2] * self::$ws[2] * self::$ws[2];

$num = $st + $nd + $rd;
/**
*判断水仙花数
*/
if($num == $n){
	return $n.'是水仙花数';
}else{
	return $n.'不是水仙花数';
}

