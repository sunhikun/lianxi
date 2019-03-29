<?php
function day15(){
    $str = "aabbccddeeYffgpg";

    echo FirstNotRepeatingChar($str);
}
function a(){
    $str = "aabbccddeeYffgpg";
    
    $arr = str_split($str);
    foreach ($arr as $k => $v) {
        if(substr_count($str,$k)==1){
            return  $k;
        }
    }
}