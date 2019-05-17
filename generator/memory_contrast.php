<?php

function makeRange($start, $end)
{
    $data = [];
    for ($i = $start; $i <= $end; ++$i) {
        $data[] = $i;
    }

    return $data;
}
function generatorRange($start, $end)
{
    for ($i = $start; $i <= $end; ++$i) {
        yield $i;
    }
}
include '../include/function.php';
print_memory_info('分配的总内存', true);
$start = print_memory_info('开始内存');
$data = makeRange(0, 100);
foreach ($data as $val) {
    echo $val;
}
$end = print_memory_info('结束内存');
echo '使用',ceil(($end - $start) / 1024),'KB','<br>';
echo '<hr>';
unset($data);
$start = print_memory_info('开始内存');
$data = generatorRange(0, 100);
foreach ($data as $val) {
    echo $val;
}
$end = print_memory_info('结束内存');
echo '使用',ceil(($end - $start) / 1024),'KB','<br>';
