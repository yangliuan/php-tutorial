<?php

use Swoole\Coroutine\Http\Server;
use Swoole\Coroutine\Http\Client;
use function Swoole\Coroutine\run;

class SwhttpClientCmd
{


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        run(function () {
            $server = new Server('127.0.0.1', 4430, false);

            $server->handle('/', function ($request, $response) use ($server) {
                $response->header('Access-Control-Allow-Origin', '*', true);
                $response->header('Access-Control-Allow-Methods', '*', true);
                $response->header('Access-Control-Allow-Headers', '*', true);
                $response->header('content-type', 'application/json', true);

                if (strtolower($request->server['request_method']) == 'options') {
                    $response->status(204);
                    $response->end();

                    return;
                }

                $data = $this->parseRequestData($request);

                if (empty($data) || !isset($data['base_uri']) || !isset($data['api']) ||  !isset($data['method']) || !isset($data['params'])) {
                    $this->errorString($response, ['base_uri' => '请求参数错误']);

                    return;
                }

                $urls = parse_url($data['base_uri'] . $data['api']);

                if ($urls === false) {
                    $this->errorString($response, ['base_uri' => 'url参数错误']);

                    return;
                }

                $result = $this->httpClient($urls['host'], strtoupper($data['method']), $urls['path'], $data['params']);

                if ($result === false) {
                    $response->status(500);
                    $response->end('{}');
                } else {
                    $response->status($result['http_status_code']);
                    $response->end($result['body']);
                }

                return;
            });

            $server->start();
        });
    }

    protected function parseRequestData($request)
    {
        return array_filter(
            array_merge(
                ($request->get ?? []),
                ($request->post ?? []),
                (json_decode($request->rawContent(), true) ?? [])
            ),
            function ($value) {
                return !is_null($value) && $value != '';
            }
        );
    }

    protected function errorString($response, array $fields)
    {
        $response->status(422);
        $response->end(json_encode([
            'message' => 'The given data was invalid.',
            'errors' => $fields
        ]));
    }

    protected function httpClient(string $domain, string $method, string $path, array $data)
    {
        $data['time_stamp'] = time();

        if ($method == 'GET') {
            $path .= '?' . http_build_query($data);
        }

        $client = new Client($domain, 443, true);
        $client->setHeaders([
            'host' => $domain,
            'user-agent' => 'swoole-http2-client',
            'accept' => 'application/json',
            'accept-encoding' => 'gzip',
            'token' => 'r8ExBDEF2D0aZOXq7ifOpoOOCEcm5JaGPoyccwqcqxera1KoaS'
        ]);
        $client->set(['timeout' => 20]);
        $client->setMethod($method);

        if ($method = 'POST') {
            $client->setData(json_encode($data));
        }

        if ($client->execute($path)) {
            $result = ['http_status_code' => $client->getStatusCode(), 'body' => $client->getBody()];
            $client->close();

            return $result;
        } else {
            return false;
        }
    }
}
