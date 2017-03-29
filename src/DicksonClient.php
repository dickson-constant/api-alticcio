<?php

namespace Dickson;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

class DicksonClient
{
    private $client;
    protected $key;
    public $product;
    public $asset;

    const API_URL = "https://api.dickson-constant.com";

    public function __construct($key)
    {
        $this->client = new Client();

        $this->product = new DicksonProduct($this);
        $this->asset = new DicksonAsset($this);

        $this->key = $key;
    }

    public function get($endpoint, $query)
    {
        $response = $this->client->request('GET', self::API_URL."/$endpoint", [
            'query' => $query,
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        return $this->handleResponse($response);
    }

    public function post($endpoint, $json)
    {
        $response = $this->client->request('POST', self::API_URL."/$endpoint", [
            'json' => $json,
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $this->handleResponse($response);
    }

    private function handleResponse(Response $response)
    {
        $stream = stream_for($response->getBody());
        $data = json_decode($stream->getContents());

        return $data;
    }
}