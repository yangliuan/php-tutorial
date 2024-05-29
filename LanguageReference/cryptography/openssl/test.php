<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/9
 * Time: 21:14
 */
class RSACrypt
{
    public $privateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCqKnjchIKWrcYcihClgfjAy5xf8p1dBNBLDAJZEHAiTEK7t9eK7h40/OnKetYYFZwKn2e+H6D2htBQ8DfP11VLukJVQ+FfYfmO4jE0tGb7ywXn168aVTpHKSiV/N/fmr4oKs2lsy0wDpXW+UbO1CPtUBvKyvYMiWLn97pYPJbN0OEe8LWnLorX2trS9JucWl1uPbRtUAh0E1orxfAnSMOy0VTfXDVdBQ5wtH+eyJlpD6JZkpEcjbPrGtDtyqJvnJ9s7YcU5mKZzfG/rdRBbDJB9/4PWdJP8Qyl1SWa5f0RafUpFFPKeqqNjXOTJ0+Id2skGMwnyFIPe0e1Yo98fmB/AgMBAAECggEAG5hvqTNECjN8ITyynmSJdpqObXDm3CLftIvqBY+I38cGO3MA3WLoOyeYsmFhPt6iQ4a+SDLQ46nRNo7+PhJpnrJB95nefp1g3y8HU8i9uq+d8Y8kslyH6updzpUHqTdrBxCJ8Qkxls2GtyoNtZTpjp6jIyvu4vGUvJGMAqswuYeWe0QafDLVwT6+oDbeUuhLC6WKx2oUwCJRXVlrT5mmTzp+6sqqpB/c3DC+ABrmKGFefDfno2ytYb53qaavoMgsN42ACfj8771pT7DeDk2+Z9u0pgM94uwT1WuuJupC+AxPzN+m91pq8kj8N8NakfkNhd0n3GeuxyoSrzM24FxGoQKBgQDZBpfnL3hPoKZj8NRuyPgnr/U7yGeNNN5SDeqCZftDoeNQ1tZVG9RL1v5jSSqf5p0qTD8sdhhHUp0HqpUnnOoScrjc3anhesilnVzHFmJl/dQ2yZ2Hs0ZgJTCRxF30eckxlsDFGXZc08jL94dFKV2Q5VzwQ78oTDDuspT4IckXgwKBgQDIuZLEP1DTKBDqJGDDqnfwFY+2F4sEx8GqYHa6VAT/5oRE2GgRzqrPmzbgeyvwX60sSIXiNaBHu1+YUHLSzX/Yz5P20314VfrFH0b9MbDyYcO0u2FvwCwZ0qXXH6aH6Q95EKdJ7AuqyDjjU5D0LeAmxcA/3RwROLg82KcZDPmGVQKBgHCzRNTwSMkJAv8pRBfX005AyNfnxSaGCuGPinV24hmICxSizCDcV82ecvI6P6FTz8/0UmYTWZ5IH3WottYgXUmBO9CuZ5bI/UNLya81R5nxS2+8GUsr5OLuzR8VWzkmuT1ALRDtnRKthDuvahaXWZhyE2ZNuAoELvD12fhVCyljAoGALdmF1uIHmlQamQE6QTedMfAa5aM3FB509HAYbrNmePW03Oz5yKeGiOmRfXFlNgEE04q1WliZhgkc6vPlZpWeUG4KBGWG0YgCQijE1G0XWCZQx+XNefNRn4xoaV1HcuAfsq3FKLOMbrRRmkuqXrxj6TdelLfzA1QLcYqjkKtQDAkCgYBOsMKXQdkK8IG0G/ZIGr3GZ0lPnkv4UNgsD2ImO+fW2lHR+OnY7BGE7jJrdLxIgZl/t72BrFUdJgvylZwqVXHwapTteBXF7YZaTnEVvxsZhbC0GAHjrQLTMslgZrcj9AkW0w4kKDxA7nCzic/qj2keqBFl9LR7rowjAQbUiCLaZg==';
    //    public $publicKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCqKnjchIKWrcYcihClgfjAy5xf8p1dBNBLDAJZEHAiTEK7t9eK7h40/OnKetYYFZwKn2e+H6D2htBQ8DfP11VLukJVQ+FfYfmO4jE0tGb7ywXn168aVTpHKSiV/N/fmr4oKs2lsy0wDpXW+UbO1CPtUBvKyvYMiWLn97pYPJbN0OEe8LWnLorX2trS9JucWl1uPbRtUAh0E1orxfAnSMOy0VTfXDVdBQ5wtH+eyJlpD6JZkpEcjbPrGtDtyqJvnJ9s7YcU5mKZzfG/rdRBbDJB9/4PWdJP8Qyl1SWa5f0RafUpFFPKeqqNjXOTJ0+Id2skGMwnyFIPe0e1Yo98fmB/AgMBAAECggEAG5hvqTNECjN8ITyynmSJdpqObXDm3CLftIvqBY+I38cGO3MA3WLoOyeYsmFhPt6iQ4a+SDLQ46nRNo7+PhJpnrJB95nefp1g3y8HU8i9uq+d8Y8kslyH6updzpUHqTdrBxCJ8Qkxls2GtyoNtZTpjp6jIyvu4vGUvJGMAqswuYeWe0QafDLVwT6+oDbeUuhLC6WKx2oUwCJRXVlrT5mmTzp+6sqqpB/c3DC+ABrmKGFefDfno2ytYb53qaavoMgsN42ACfj8771pT7DeDk2+Z9u0pgM94uwT1WuuJupC+AxPzN+m91pq8kj8N8NakfkNhd0n3GeuxyoSrzM24FxGoQKBgQDZBpfnL3hPoKZj8NRuyPgnr/U7yGeNNN5SDeqCZftDoeNQ1tZVG9RL1v5jSSqf5p0qTD8sdhhHUp0HqpUnnOoScrjc3anhesilnVzHFmJl/dQ2yZ2Hs0ZgJTCRxF30eckxlsDFGXZc08jL94dFKV2Q5VzwQ78oTDDuspT4IckXgwKBgQDIuZLEP1DTKBDqJGDDqnfwFY+2F4sEx8GqYHa6VAT/5oRE2GgRzqrPmzbgeyvwX60sSIXiNaBHu1+YUHLSzX/Yz5P20314VfrFH0b9MbDyYcO0u2FvwCwZ0qXXH6aH6Q95EKdJ7AuqyDjjU5D0LeAmxcA/3RwROLg82KcZDPmGVQKBgHCzRNTwSMkJAv8pRBfX005AyNfnxSaGCuGPinV24hmICxSizCDcV82ecvI6P6FTz8/0UmYTWZ5IH3WottYgXUmBO9CuZ5bI/UNLya81R5nxS2+8GUsr5OLuzR8VWzkmuT1ALRDtnRKthDuvahaXWZhyE2ZNuAoELvD12fhVCyljAoGALdmF1uIHmlQamQE6QTedMfAa5aM3FB509HAYbrNmePW03Oz5yKeGiOmRfXFlNgEE04q1WliZhgkc6vPlZpWeUG4KBGWG0YgCQijE1G0XWCZQx+XNefNRn4xoaV1HcuAfsq3FKLOMbrRRmkuqXrxj6TdelLfzA1QLcYqjkKtQDAkCgYBOsMKXQdkK8IG0G/ZIGr3GZ0lPnkv4UNgsD2ImO+fW2lHR+OnY7BGE7jJrdLxIgZl/t72BrFUdJgvylZwqVXHwapTteBXF7YZaTnEVvxsZhbC0GAHjrQLTMslgZrcj9AkW0w4kKDxA7nCzic/qj2keqBFl9LR7rowjAQbUiCLaZg==';
    public function encrypt3DES($input, $key)
    {
        $pvKey = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
$this->privateKey
-----END RSA PRIVATE KEY-----
EOD;
        ksort($input);
        $srt = '';
        foreach ($input as $inputKey => $inputValue) {
            $srt .= $inputKey . "'";
            $srt .= $inputValue ? $inputValue : "";
            $srt .=  "^";
        }
        $srt = trim($srt);
        $srt = trim($srt, '^');
        $signature = '';
        $verify = openssl_sign($srt, $signature, $pvKey, OPENSSL_ALGO_MD5);
        return base64_encode($signature);
    }
    function http_post($url, $post_data)
    {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
    public function test()
    {
        $publicKey = <<<EOD
-----BEGIN CERTIFICATE-----
$this->publicKey
-----END CERTIFICATE-----
EOD;
        $info = [
            'paymentItemId' => 'xxxx',
            'method' => 'trade.pay.qrcode',
            'charset' => 'utf-8',
            'signType' => 'RSA',
            'returnUrl' => 'https://www.demo.com/',
            'notifyUrl' => 'https://www.demo.com/',
            'bizContent' => '{"outTradeNo":"' . time() . '","partnerId":"xxx","paymentSceneId":"xxx","tradeName":"测试支付2","tradeAmount":"0.01","moneyTypeId":"0","timeout":"15","tradeSummary":"测试","paymentChannelId":"xxx"}',
            'version' => '2.0',
        ];
        $signature = $this->encrypt3DES($info, $this->privateKey);
        var_dump('----');
        var_dump($signature);
    }
}
$a = new RSACrypt();
$a->test();
