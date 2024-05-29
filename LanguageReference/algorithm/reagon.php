<?php
$reagon = [
    [
        'province' => '北京市', 'city' => '市辖区', 'area' => '丰台区', 'street' => '东铁匠营街道'
    ], [
        'province' => '北京市', 'city' => '市辖区', 'area' => '大兴区', 'street' => '高米店街道'
    ], [
        'province' => '北京市', 'city' => '市辖区', 'area' => '大兴区', 'street' => '青云店镇'
    ], [
        'province' => '山东省', 'city' => '青岛市', 'area' => '市南区', 'street' => '香港中路街道'
    ], [
        'province' => '山东省', 'city' => '潍坊市', 'area' => '奎文区', 'street' => '东关街道'
    ]
];

function reagonToList(array $hasAddress)
{
    if (empty($hasAddress)) {
        return [];
    }

    $provinces = array_unique(array_column($hasAddress, 'province'));
    $result = [];
    $i = 1;

    foreach ($provinces as $key => $province) {
        $result[] = ['id' => $i, 'pid' => 0, 'name' => $province];
        ++$i;
    }

    $citys = array_column($hasAddress, 'province', 'city');
    $provinceKeys = array_column($result, 'name', 'id');

    foreach ($citys as $key => $city) {
        $result[] = ['id' => $i, 'pid' => array_search($city, $provinceKeys), 'name' => $key];
        ++$i;
    }

    $areas = array_column($hasAddress, 'city', 'area');
    $citysKeys = array_column($result, 'name', 'id');

    foreach ($areas as $key => $area) {
        $result[] = ['id' => $i, 'pid' => array_search($area, $citysKeys), 'name' => $key];
        ++$i;
    }

    $areasKeys = array_column($result, 'name', 'id');
    $streets = array_column($hasAddress, 'area', 'street');

    foreach ($streets as $key => $street) {
        $result[] = ['id' => $i, 'pid' => array_search($street, $areasKeys), 'name' => $key];
        ++$i;
    }

    return $result;
}


function reagonTree(array $hasAddress)
{
    $items = array();

    foreach ($hasAddress as $v) {
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

$reagon = reagonToList($reagon);
$reagon = reagonTree($reagon);

echo '省市区列表转树状结构', '<pre>', PHP_EOL;
print_r($reagon);
