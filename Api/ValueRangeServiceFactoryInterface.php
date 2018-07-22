<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api;
/**
 * Interface \Zemljanoj\GoogleClient\Api\ValueRangeServiceFactoryInterface
 */
interface ValueRangeServiceFactoryInterface
{
    /**
     * @return \Google_Service_Sheets
     */
    public function create():\Google_Service_Sheets_ValueRange;
}