<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api;
/**
 * Interface \Zemljanoj\GoogleClient\Api\ClientFactoryInterface
 */
interface ClientFactoryInterface
{
    /**
     * Create model.
     * @param \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $config
     * @return \Google_Client
     */
    public function create(\Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $config);
}