<?php

$str = '<div class="ui-block-a" align="center">
    <a href="online-39.html" rel="external nofollow" ><img class="lazy" width="131" height="177" src="//img.jbzj.com/file_images/game/201702/2017020716154162.jpg"/>
    <h3>2014年</h3></a>
   </div>';

$imgpreg = "/<img (.*?) src=\"(.+?)\".*?>/";
preg_match($imgpreg, $str, $img);
var_dump($img);
