<?php
$fp = popen('df -lh | grep -E "^(/)"', "r");
$rs = fread($fp, 1024);
pclose($fp);
echo '<pre>', $rs;
$rs = preg_replace("/\s{2,}/", ' ', $rs);  //把多个空格换成 “_”
$rs = explode("\n", $rs);
$diskInfo = [];
foreach ($rs as $key => $value) {
    if ($value) {
        $diskInfo[] = explode(' ', $value);
    }
}
var_dump($diskInfo);
