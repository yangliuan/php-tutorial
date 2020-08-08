<?php
$category = [[
    'id' => 1,
    'pid' => 0,
    'name' => '1级分类',
], [
    'id' => 2,
    'pid' => 1,
    'name' => '2级分类',
], [
    'id' => 3,
    'pid' => 2,
    'name' => '3级分类',
], [
    'id' => 4,
    'pid' => 3,
    'name' => '4级分类',
], [
    'id' => 5,
    'pid' => 4,
    'name' => '5级分类'
], [
    'id' => 6,
    'pid' => 6,
    'name' => '6级分类'
]];

//递归成树形
function recurSionToTree(array $array = [], $pid = 0)
{
    $result = [];

    foreach ($array as $key => $value) {

        if ($value['pid'] == $pid) {
            $children = recurSionToTree($array, $value['id']);

            if ($children) {
                $value['children'] = $children;
            }

            $result[] = $value;
        }
    }

    return $result;
}

function refToTree($data)
{
    $items = array();

    foreach ($data as $v) {
        $items[$v['id']] = $v;
    }

    $tree = array();

    foreach ($items as $k => $item) {
        if (isset($items[$item['pid']])) {
            $items[$item['pid']]['children'][] = &$items[$k];
        } else {
            $tree[] = &$items[$k];
        }
    }

    return $tree;
}

function toList($data, $pid = 0, $level = 1)
{
    static $tree = [];

    foreach ($data as $val) {
        if ($val['pid'] == $pid) {
            $val['level'] = $level;
            $tree[] = $val;
            toList($data, $val['id'], $level + 1);
        }
    }

    return $tree;
}

function getParent($data, $id)
{
    $arr = array();

    foreach ($data as $v) {
        if ($v['id'] == $id) {
            $arr[] = $v;
            $arr = array_merge(getParent($data, $v['pid']), $arr);
        }
    }

    return $arr;
}

$treeCategory = recurSionToTree($category, 0);
echo '<pre>', 'recurSionToTree', PHP_EOL;
var_dump($treeCategory);

$treeCategory = recurSionToTree($category, 0);
echo '<pre>', 'recurSionToTree', PHP_EOL;
var_dump($treeCategory);

$treeCategory = toList($category, 0);
echo '<pre>', 'toList', PHP_EOL;
var_dump($treeCategory);

$parent = getParent($category, 5);
echo '<pre>', 'getParent', PHP_EOL;
var_dump($parent);
