<?php

namespace Jaybizzle\CrawlerDetect\Fixtures;

abstract class AbstractProvider
{
    protected $data = array();

    public function getAll()
    {
        return $this->data;
    }
} 