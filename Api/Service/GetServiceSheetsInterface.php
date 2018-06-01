<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Service;
/**
 * Get Google Service Sheets object.
 * Interface \Zemljanoj\GoogleClient\Api\Service\GetServiceSheetsInterface
 */
interface GetServiceSheetsInterface
{
    /**
     * Execute.
     * @return \Google_Service_Sheets
     */
    public function execute();
}