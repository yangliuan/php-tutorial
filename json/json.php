<?php

$arr = [
    'token' => 'eyJpdiI6Ik1ZeVBIOGtETWZnUGUzVGl1azBvSGc9PSIsInZhbHVlIjoiM0Yxcm8wY2lIdDlcL1hQSHpLN0Z6M2duTTQ0R2tQNkcrNUdoUkp3RURmMXdRXC9vaTdlaldHbjhuaXV0eGVcL1VyZiIsIm1hYyI6IjA4ODY5Mzc3ZDVkZWMwNTE2ZmQ0YzEzNTdjZTM0MGY0NGJmMWI1MzJmY2Q5NDM5NjdmZWRiZDdlMzNiNmRlOGQifQ==',
    'business_id' => 1,
    'title' => '测试商品',
    'description' => '商品描述',
    'cover' => 'http://wap.sinmore.com.cn/images/banner.png',
    'goods_pic' => ['http://wap.sinmore.com.cn/images/banner.png', 'http://wap.sinmore.com.cn/images/banner.png'],
    'type' => 1,
    'status' => 0,
    'sort' => 0,
    'fake_sales' => 1,
    'fake_pv' => 0,
    'base_price' => 0.01,
    'market_price' => 0.01,
    'category_id' => 5,
    'recommend' => 0,
    'label_pic' => [1, 2, 3],
    'label_word' => [4, 5, 6],
    'sku' => [
        [
            'spec_id' => 2, 'value' => '规格值2', 'price' => 0.01, 'stock' => 1,
            'sku_pic' => [
                'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=2178620087,1920751148&fm=27&gp=0.jpg&tag=2', 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=2178620087,1920751148&fm=27&gp=0.jpg&tag=2',
            ],
        ],
        [
            'spec_id' => 1, 'value' => '规格值1', 'price' => 0.01, 'stock' => 1,
            'sku_pic' => [
                'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=2178620087,1920751148&fm=27&gp=0.jpg&tag=2', 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=2178620087,1920751148&fm=27&gp=0.jpg&tag=2',
            ],
        ],
    ],
    'param' => [
        ['name' => '参数1', 'value' => '参数值1', 'sort' => 0],
        ['name' => '参数2', 'value' => '参数值2', 'sort' => 1],
    ],
];
//echo json_encode($arr);
$arr = [
    'token' => 'eyJpdiI6IkljTWVNVkd6MWx4b1JzYXFKclhHc2c9PSIsInZhbHVlIjoiWUpXRFdSc05HeFVOYUFWdjFFcUE4UUhTMFZyVnBteDZzN21VYVkwZ2VlOD0iLCJtYWMiOiIxNDdmMzgxYWZhOTFkMjg5ODY3MTg2NGUxYjIwMzUxYTlhYTMxNjkyZGE0N2FmODZiMjcyNzA3Njk4NjllMjE1In0=',
    'category_id' => 7,
    'title' => '测试发帖',
    'type' => 1,
    'contact' => '联系人',
    'tel' => '18210619665',
    'province' => '北京',
    'city' => '北京',
    'area' => '丰台',
    'address' => '宋家庄庄子写字楼',
    'cover' => 'http://wap.sinmore.com.cn/images/banner.png',
    'content' => '帖子内容',
    'post_pic' => [
        'http://wap.sinmore.com.cn/images/banner.png', 'http://wap.sinmore.com.cn/images/banner.png',
    ],
    'post_param' => [
        ['key' => '小区名字', 'value' => '分钟公寓', 'cparam_id' => 1],
        ['key' => '房屋类型', 'value' => '整套出租', 'cparam_id' => 2],
    ],
];
//以字面编码多字节 Unicode 字符（默认是编码成 \uXXXX）
echo '不编码中文字符','<br>',json_encode($arr, JSON_UNESCAPED_UNICODE),'<br>';
//不要编码 /
echo '不编码/','<br>',json_encode($arr, JSON_UNESCAPED_SLASHES),'<br>';

echo '|同时','<br>',json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),'<br>';

echo '+同时','<br>',json_encode($arr, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES),'<br>';
$arr = ['a' => '测试', 'b' => [], 'c' => [['d' => 1], ['d' => 2]]];
$arr1 = ['测试', [], [[1]]];
echo '关联数组','<br>',json_encode($arr, JSON_FORCE_OBJECT),'<br>';
echo '关联数组不转对象','<br>',json_encode($arr),'<br>';
echo '索引数组','<br>',json_encode($arr1, JSON_FORCE_OBJECT),'<br>';
echo '索引数组不转对象','<br>',json_encode($arr1),'<br>';
