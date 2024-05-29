<?php

// 设置服务器参数
$host = '127.0.0.1';
$port = 8080;

// 创建服务器套接字
$server = stream_socket_server("tcp://$host:$port", $errno, $errstr);
if (!$server) {
    die("Error starting server: $errstr");
}

echo "Server is running on http://$host:$port\n";

// 设置非阻塞模式
stream_set_blocking($server, 0);

// 客户端流数组
$allClients = array();

while (true) {
    // 将服务器套接字添加到流数组中
    $readClients = array_merge($allClients, array($server));
    // 设置超时时间为 1 秒
    $write = null;
    $except = null;
    stream_select($readClients, $write, $except, 1);

    // 遍历所有可读的流
    foreach ($readClients as $client) {
        // 如果是服务器套接字，则表示有新客户端连接
        if ($client == $server) {
            // 接受新客户端连接
            $newClient = stream_socket_accept($server);
            if ($newClient) {
                // 将新客户端流添加到客户端流数组中
                $allClients[] = $newClient;
                echo "New client connected\n";
            }
        } else {
            // 读取客户端发来的数据
            $data = fread($client, 1024);
            if ($data) {
                // 构造响应
                $response = "HTTP/1.1 200 OK\r\n";
                $response .= "Content-Type: text/plain\r\n";
                $response .= "Content-Length: 11\r\n";
                $response .= "\r\n";
                $response .= "Hello World";
                // 发送响应给客户端
                fwrite($client, $response);
            } else {
                // 如果客户端没有发送数据，则关闭客户端连接
                $key = array_search($client, $allClients);
                if ($key !== false) {
                    unset($allClients[$key]);
                    echo "Client disconnected\n";
                }
                fclose($client);
            }
        }
    }
}
