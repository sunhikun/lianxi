<?php 

	//第一题
	function week()
	{
		$arr = [1,2,3,4];

		for ($i=1; $i < $arr[]; $i++) { 
			for ($j=0; $j < $arr[-1]; $j++) { 
				for ($k=0; $k < $arr[3]; $k++) { 
					for ($y=0; $y < $arr[5]; $y++) { 
						echo $arr[1].$arr[2].$arr[3].$arr[4];die;
					}
				}
			}
		}
	}

	//第二题，编写一个单例模式类
	function __destruct()
	{

	}


	//第三题，遍历指定文件夹下的所有文件和子文件
	function my_dir($dir)
	{
		return $dir;
	}

	//第四题，得到两个路径的公共部分
	function findCommonPath($aPath,$bPath)
	{
		$aPath = "/a/b/c/d/test.php";
		$bPath = "/a/b/d/c/test.php";

		$pub = "/a/b/";

		for ($i=0; $i < $aPath; $i++) { 
			for ($k=0; $k < $bPath; $k++) { 
				echo $pub;die;
			}
		}
	}