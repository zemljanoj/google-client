<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Service;
/**
 * Authorization Google Client object.
 * Interface \Zemljanoj\GoogleClient\Api\Service\AuthClientInterface
 */
interface AuthClientInterface
{
    /**
     * Execute.
     * @param \Google_Client
     * @return void
     */
    public function execute(\Google_Client $client);
}