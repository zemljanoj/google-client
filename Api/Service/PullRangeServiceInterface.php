<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Service;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Service\PullRangeServiceInterface
 */
Interface PullRangeServiceInterface
{
    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig
     * @param string $spreadsheetId
     * @param string $range
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig,
        string $spreadsheetId,
        string $address
    ):\Zemljanoj\GoogleClient\Api\Data\RangeInterface;
}