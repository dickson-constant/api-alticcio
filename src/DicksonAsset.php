<?php

namespace Dickson;

class DicksonAsset extends DicksonObject
{
    public function getAsset($options)
    {
        return $this->client->get("asset", $options);
    }

    public function getAssets($options)
    {
        return $this->client->get("assets", $options);
    }
}
