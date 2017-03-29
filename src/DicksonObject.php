<?php

namespace Dickson;

class DicksonObject
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}
