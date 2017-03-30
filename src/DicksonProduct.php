<?php

namespace Dickson;

/**
 * DicksonProduct represents an HTTP Client for using Dickson API Product
 *
 * @author Geoffrey Pécro <gpecro@dickson-constant.com>
 */
class DicksonProduct extends DicksonObject
{
    /**
     * Gets a product
     *
     * @param integer   $id       The Dickson product id
     * @param array     $options  The GET parameters
     *
     * @return stdClass[]
     */
    public function getProduct($id, $options = [])
    {
        return $this->client->get("produit/{$id}", $options);
    }

    /**
     * Gets a product
     *
     * @param array     $options  The GET parameters
     *
     * @return stdClass[]
     */
    public function getProducts($options = [])
    {
        return $this->client->get("produits", $options);
    }
}
