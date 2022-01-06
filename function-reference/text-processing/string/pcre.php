<?php
/**
 * 获取<img>标签的src属性值
 */
$str = '<div class="ui-block-a" align="center">
    <a href="online-39.html" rel="external nofollow" ><img class="lazy" width="131" height="177" src="//img.jbzj.com/file_images/game/201702/2017020716154162.jpg"/>
    <h3>2014年</h3></a>
   </div>';

$imgpreg = "/<img (.*?) src=\"(.+?)\".*?>/";
preg_match($imgpreg, $str, $img);
var_dump($img);

/**
 * 验证包含变量的数据公司
 * REF:https://blog.csdn.net/notejs/article/details/20608371
 * 假如待选变量：  ID,NUM,TOTAL，AVL TEST
 * 正确的公式例子：ID*NUM+(TOTAL/AVL)*0.5
 * 错误的公式例子：ID**|0.5
 */
 $exp = 'ID*NUM+(TOTAL/AVL)*0.5';
 $params = [ 'ID' => 1,'TOTAL' => 1,'AVL' => 1,'NUM' => 1 ];

 function verifyExp(string $exp, array $params)
 {
 	$exp = trim($exp);

 	if ($exp === '') {
 		return false;
 	}
 }
