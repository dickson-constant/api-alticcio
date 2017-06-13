<?php

namespace Dickson;

/**
 * DicksonCategory represents an HTTP Client for using Dickson API Categories
 *
 * @author Geoffrey Pécro <gpecro@dickson-constant.com>
 */
class DicksonCategory extends DicksonObject
{
    /**
     * Gets a category
     *
     * @param integer   $id       The Dickson category id
     * @param array     $options  The GET parameters
     *
     * @return stdClass[]
     */
    public function getCategory($id, $options = [])
    {
        return $this->client->get("categorie/{$id}", $options);
    }

    /**
     * Gets categories
     *
     * @param array     $options  The GET parameters
     *
     * @return stdClass[]
     */
    public function getCategories($options = [])
    {
        return $this->client->get("categories", $options);
    }
}
