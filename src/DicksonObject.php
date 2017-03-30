<?php

namespace Dickson;

/**
 * DicksonObject represents an HTTP Client for using Dickson API Object
 *
 * @author Geoffrey Pécro <gpecro@dickson-constant.com>
 */
class DicksonObject
{
    /**
     * @var \Dickson\DicksonClient
     */
    protected $client;

    /**
     * Constructor
     *
     * @param \Dickson\DicksonClient  $client  The HTTP Client
     */
    public function __construct(DicksonClient $client)
    {
        $this->client = $client;
    }
}
