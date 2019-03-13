<?php 
$str = "Have you ever gone shopping and";

function calFirst($str)
{
	$len = strlen($str);
	$arr = [];
	for ($i=0; $i < $len; $i++) { 
		if(isset($arr[$str[$i]])){
			$arr[$str[$i]]++;
		}else{
			$arr[$str[$i]] = 1;
		}
		if($arr[$str[$i]] >= 3){
			return $str[$i];
		}
	}
	return $res;
}
print_r(calFirst($str));