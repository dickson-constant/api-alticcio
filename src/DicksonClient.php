<?php

namespace Dickson;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

/**
 * DicksonClient represents an HTTP Client for using Dickson API
 *
 * @author Geoffrey Pécro <gpecro@dickson-constant.com>
 */
class DicksonClient
{
    protected $baseUrl = "https://api.dickson-constant.com";

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $language = 'en';

    /**
     * @var \Guzzle\Http\Client
     */
    private $client;

    /**
     * @var \Dickson\DicksonProduct
     */
    public $product;

    /**
     * @var \Dickson\DicksonAsset
     */
    public $asset;

    /**
     * @var \Dickson\DicksonCategory
     */
    public $category;

    /**
     * Constructor
     *
     * @param string     $key        The API key
     * @param language   $language   The API language
     */
    public function __construct($key, $language = null)
    {
        $this->client = new Client();

        $this->key = $key;
        $this->language = $language === null ? $language : $this->language;

        $this->product = new DicksonProduct($this);
        $this->asset = new DicksonAsset($this);
        $this->category = new DicksonCategory($this);
    }

    /**
     * Makes a GET request and gets the response
     *
     * @param string     $endpoint   The API endpoint
     * @param array      $query      The GET parameters
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function get($endpoint, $query)
    {
        $response = $this->client->request('GET', $this->getUri($endpoint), [
            'query' => $this->getQueryParameters($query),
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Merges API key and API language with the GET parameters
     *
     * @param array   $query   The GET parameters
     *
     * @return array
     */
    public function getQueryParameters($query)
    {
        return array_merge(['key' => $this->key, 'language' => $this->language], $query);
    }

    /**
     * Gets the request URI
     *
     * @param string   $endpoint   The API endpoint
     *
     * @return string
     */
    public function getUri($endpoint)
    {
        return $this->baseUrl.'/'.$endpoint;
    }

    /**
     * Handles response
     *
     * @param \GuzzleHttp\Psr7\Response   $response   The response
     *
     * @return stdClass[]
     */
    private function handleResponse(Response $response)
    {
        $stream = stream_for($response->getBody());
        $data = json_decode($stream->getContents());

        return $data;
    }
}