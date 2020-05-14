<?php
require './aop/AopClient.php';
require './aop/request/AlipaySystemOauthTokenRequest.php';

$aop = new AopClient();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '';
$aop->rsaPrivateKey = 'MIIEogIBAAKCAQEAqyFoGb03/RktipIVSNNFtQtHDgjA2BGOy4+yTQzv57gTSJaowvaJ9Cnv5QhaYmJbWcVutKMBbyDkZiZKCBm5wqUMMxdwdIe0qlhHc3Aovd5p+/x7IkV3pcihAYd8ACtvfrtJ1u9ryBwM3MkBZ7J9BMHYttlcymvrZynEy/zfKrq66x0oAKlmQnJ4BFoVXRqYtunUYI7fID2vyi+OJ62JADUdYY3pkkFLXde45ddNfhoD0ORbRiZ6RxG95xtJpK5ShTaSazEg5nS+GMTRwbJPJ3PziB7prLVv2ji/yz+vTuYCZetmI2SQESesfFBp/L+oIXxdZptIIsICEmnPqhRdAwIDAQABAoIBACne45ygmmlX1re35HNMFhsk5j69z4lOSnTt9L87chttA3LYQfRp4/kUpbiRIaQ+0oEVeG/EDl7FWnzP039F5BiGz4RUsNQiPAcN0HWjNKS4HZBlBy+sdYjfnN1F7AYSmpYUdw2ayPFOQ6tllu1rU4FteHvMlRKF8zPrmVYbyfKnE+BYeSafTs4YaJcPmx425y5HNq2drpacXy/4okzlO33tVvhINTvRJY81vlliFbwNRk/zr8yS8rbgT0teXeu2qQCC7u+2isBQVdTPt9f57b0YjrCGGn7A5te+XHrOuOYdWlv2j6t0duV8nJRUz1S/cRYVBwr5HkBTGPXSpZj2D8kCgYEA9A7BaZOdBfZ9nctSVY0vJQOEBNAvzM7947lR/dsCOl77bmlNGDLYn5LpH1FsdD7y6dnLwnThF63+biahVvb/nZv++Y9dhZoOWnMF+pzGV8yOqB8hp5MrSqRMjdeJNJwgvILbO/P96GdUfRiywbPl/nrZh9eVEIYqtaNJiUvDy2cCgYEAs4EcxQizVQTYN1LXuTScc1CRTOR8UPnC36ZJFYkavLjvp7IZjS95w37CACMrj6lWGMe6S5MC4tD4Ai7EvV6peYSneSRI0JeYFhIfpGVoh8I/tU4flTNE3QWwWr11006eHnrog23/d4+2xCcR77gpkg/ocKChlfVNqcBQlBe4/AUCgYAW1OaNLO0MqMGZqHK8ZCfb65dHJ/7Ax0CDNEwSVpG/yjD1ZE59DAyt6P18G47s1RK+g8yHFY4VPAbIYT7ItvS01uokiJ/0JrRfC9GsX0xC3HUgD0GDvsXXBsXOozJHxK9fU1KVKj8/paMGzO+0JVNH2lBNYAKm+BY4xdzURk070wKBgHoGMA+FPZtzAqSBLWKacCw3vb5+qD/HuYCdopsAK+vU8B2YhaQjfOu3lJvRTMCJRZzs0Sik1FZp5d5d+qIc4qpX0h0Y3GLoWpvOUDJKOYfoNbTDWdbsFkkFn//fQWSW0gg4Vy1ZLkwRpxWq1ZeXIrNHGyTNHWs6aUQXFu/FPJwdAoGAflT7vufcrVllzIkQVRj5y5ZcakgzY5wCFfzmOrXr4BQBz0jz5ax96FcGMT/3nppvqSWBPZH/yWM9X75kQayhIgmil9mBD+g1XAgmZz1Mi15JvzrlU+gTKrCsQP6q7GXvX6VztdaiduN+sWVgrVSnOvrRIyARzS2BtR23xDtpFoM=';
$aop->alipayrsaPublicKey = '';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';
$request = new AlipaySystemOauthTokenRequest();
$request->setGrantType("authorization_code");
$request->setCode("4b203fe6c11548bcabd8da5bb087a83b");
$result = $aop->execute($request);
var_dump($result);
$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
$resultCode = $result->$responseNode->code;
if (!empty($resultCode) && $resultCode != 10000) {
    echo "失败";
} else {
    echo "成功";
}
