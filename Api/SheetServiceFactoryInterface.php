<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api;
/**
 * Interface \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface
 */
interface SheetServiceFactoryInterface
{
    /**
     * @param \Google_Client $client
     * @return \Google_Service_Sheets
     */
    public function create(\Google_Client $client);
}