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
//var_dump($img);

// 验证包含变量的数据公司
// REF:https://blog.csdn.net/notejs/article/details/20608371
// 假如待选变量：  ID,NUM,TOTAL，AVL TEST
// 正确的公式例子：ID*NUM+(TOTAL/AVL)*0.5
// 错误的公式例子：ID**|0.5
// $exp = 'ID*NUM+(TOTAL/AVL)*0.5';
// $params = [ 'ID' => 1,'TOTAL' => 1,'AVL' => 1,'NUM' => 1 ];

/**
 * 正则表表达式测试，匹配到数据返回true,反之false
 *
 * @param string $pattern 正则
 * @param string $subject 输入字符串
 * @return bool
 */
function preg_match_all_test($pattern, $subject)
{
	preg_match_all($pattern, $subject, $match);
	var_dump($match);
	if (count($match[0]) > 0) {
		return true;
	}

	return false;
}

/**
 * 变量数学公式验证
 *
 * @param string $exp
 * @param array $params
 * @return bool
 */
function verifyExp(string $exp, array $params)
{
	$exp = trim($exp);

	//为空
	if ($exp === '') {
		return false;
	}

	// 错误情况，运算符连续
	if (preg_match_all_test('/[\+\-\*\/]{2,}/', $exp)) {
		return false;
	}

	//空括号
	if (preg_match_all_test('/\(\)/', $exp)) {
		return false;
	}

	//错误情况，(后面是运算符
	if (preg_match_all_test('/\([\+\-\*\/]/', $exp)) {
		return false;
	}

	// 错误情况，)前面是运算符
	if (preg_match_all_test('/[\+\-\*\/]\)/', $exp)) {
		return false;
	}

	//错误情况，(前面不是运算符
	if (preg_match_all_test('/[^\+\-\*\/]\(/', $exp)) {
		return false;
	}

	//错误情况，)后面不是运算符
	if (preg_match_all_test('/\)[^\+\-\*\/]/', $exp)) {
		return false;
	}

	//错误情况，括号不配对


	//错误情况，变量没有来自“待选公式变量”
}



//echo '<pre>';
$result = verifyExp($exp, $params);
//var_dump($result);
