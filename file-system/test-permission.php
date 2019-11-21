<?php
//测试php删除目录外文件权限
$filePath = '/home/yangliuan/Code/abc.xls';
if (file_exists($filePath)) {
    echo '删除结果:', unlink($filePath);
}
//结论linux系统下是按多用户权限划分的，只要运行php的用户具有文件或目录的权限那么php就可以操作
