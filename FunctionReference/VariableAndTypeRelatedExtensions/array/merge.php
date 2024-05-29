<?php
//数组合并

//一维索引数组
$one_dimen_index_a = [1, 3, 4, 5, 6, 7];
$one_dimen_index_b = [2, 4, 6, 8, 0, 9, 10];

//一维关联数组
$one_dimen_associative_a = ['a' => 1, 'b' => 2, 'c' => 0];
$one_dimen_associative_b = ['a' => 2, 'b' => 3, 'c' => 5, 'd' => 6];

//将一个数组的值附加到上一个数组的末尾
$one_dimen_index_a_merge_b_result = array_merge($one_dimen_index_a, $one_dimen_index_b);
$one_dimen_associative_a_merge_b_result = array_merge($one_dimen_associative_a, $one_dimen_associative_b);

echo 'array_merge 将一个数组的值附加到上一个数组的末尾', '<pre>';
echo '索引数组', '<pre>';
print_r($one_dimen_index_a_merge_b_result);
echo '关联数组', '<pre>';
print_r($one_dimen_associative_a_merge_b_result);

//+(联合)运算符，运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略
//少的放左边
$one_dimen_index_a_union_b_result = $one_dimen_index_a + $one_dimen_index_b;
$one_dimen_associative_a_union_b_result = $one_dimen_associative_a + $one_dimen_associative_b;

echo '+(联合)运算符，运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略', '<pre>';
echo '索引数组', '<pre>';
print_r($one_dimen_index_a_union_b_result);
echo '关联数组', '<pre>';
print_r($one_dimen_associative_a_union_b_result);

echo '<hr>';
//===================================================
//多维索引数组
$multi_dimen_index_a = [
    0 => [
        1 => [12, 3, 3]
    ],
    1 => [1, 2]
];
$multi_dimen_index_b = [
    0 => [
        1 => [5, 3, 6]
    ],
    1 => [1, 2, 4]
];

//多维关联数组
$multi_dimen_associative_a = [
    'a' => [
        'e' => [12, 3, 3]
    ],
    'b' => [1, 2]
];
$multi_dimen_associative_b = [
    'a' => [
        'f' => [5, 3, 6]
    ],
    'b' => [1, 2, 4],
    'c' => 3
];

//将一个数组的值附加到上一个数组的末尾
$multi_dimen_index_a_merge_b_result = array_merge_recursive($multi_dimen_index_a, $multi_dimen_index_b);
$multi_dimen_associative_a_merge_b_result = array_merge_recursive($multi_dimen_associative_a, $multi_dimen_associative_b);

echo 'array_merge_recursive 递归将一个数组的值附加到上一个数组的末尾', '<pre>';
echo '多维索引数组', '<pre>';
print_r($multi_dimen_index_a_merge_b_result);
echo '多维关联数组', '<pre>';
print_r($multi_dimen_associative_a_merge_b_result);

//+(联合)运算符，运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略
//少的放左边
$multi_dimen_index_a_merge_b_result = $multi_dimen_index_a + $multi_dimen_index_b;
$multi_dimen_associative_a_merge_b_result = $multi_dimen_associative_a + $multi_dimen_associative_b;

echo '+(联合)运算符，运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略', '<pre>';
echo '多维索引数组', '<pre>';
print_r($multi_dimen_index_a_merge_b_result);
echo '多维关联数组', '<pre>';
print_r($multi_dimen_associative_a_merge_b_result);
