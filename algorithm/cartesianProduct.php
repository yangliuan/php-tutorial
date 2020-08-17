<?php

$specs = [
    ['红', '黄', '蓝', '绿'],
    ['XXXL', 'XXL', 'XL', 'X'],
    ['棉', '涤纶', '尼龙']
];

/**
 * 索引数组笛卡尔积
 */
function makeSkuBySpec($specs)
{
    $result = array();

    for ($i = 0, $count = count($specs); $i < $count - 1; $i++) {

        if ($i == 0) {
            $result = $specs[$i];
        }

        // 保存临时数据
        $tmp = array();

        // 结果与下一个集合计算笛卡尔积
        foreach ($result as $rk => $res) {
            foreach ($specs[$i + 1] as $sv => $spec) {
                if ($i == 0) {
                    $tmp[] = [$rk => $res, $sv => $spec];
                } else {
                    $res[$sv] = $spec;
                    $tmp[] = $res;
                }
            }
        }

        //将笛卡尔积写入结果
        $result = $tmp;
    }

    return $result;
}

$result = makeSkuBySpec($specs);
echo '<pre>', '二维数组笛卡尔积结果' . PHP_EOL;
print_r($result);
echo '<hr>';


$specs = [
    [
        ['spec_id' => 1, 'spec_value' => '红'],
        ['spec_id' => 1, 'spec_value' => '黄'],
        ['spec_id' => 1, 'spec_value' => '蓝'],
        ['spec_id' => 1, 'spec_value' => '绿']
    ],
    [
        ['spec_id' => 2, 'spec_value' => 'XXXL'],
        ['spec_id' => 2, 'spec_value' => 'XXL'],
        ['spec_id' => 2, 'spec_value' => 'XL'],
        ['spec_id' => 2, 'spec_value' => 'X']
    ],
    [
        ['spec_id' => 3, 'spec_value' => '棉'],
        ['spec_id' => 3, 'spec_value' => '涤纶'],
        ['spec_id' => 3, 'spec_value' => '尼龙']
    ]
];

/**
 * 笛卡尔积,同一规格id下的多个规格值
 *
 * @param array $specs
 * @return array
 */
function makeSkuBySpec2($specs)
{
    $result = array();
    $count = count($specs);

    //只有一组时
    if ($count == 1) {
        foreach ($specs[0] as $key => $val) {
            $result[] = [$val];
        }
        return $result;
    }

    $h = 0;
    //多组时
    for ($i = 0, $count = count($specs); $i < $count - 1; $i++) {

        if ($i == 0) {
            $result = $specs[$i];
        }

        // 保存临时数据
        $tmp = array();

        // 结果与下一个集合计算笛卡尔
        foreach ($result as $rk => $res) {
            foreach ($specs[$i + 1] as $sk => $spec) {
                if ($i == 0) {
                    $tmp[] = [$res, $spec];
                } elseif ($i > 0) {
                    $spec_key = count($res) + 1;
                    $tmp[] = array_merge($res, [$spec_key => $spec]);
                }
            }
        }

        //将笛卡尔积写入结果
        $result = $tmp;
    }

    return $result;
}

$result = makeSkuBySpec2($specs);
echo '<pre>', '带规格id的三维数组笛卡尔积结果' . PHP_EOL;
print_r($result);
echo '<hr>';
