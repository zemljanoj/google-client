<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Service;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Service\PushRangeServiceInterface
 */
Interface PushRangeServiceInterface
{
    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig
     * @param string $spreadsheetId
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig,
        string $spreadsheetId,
        \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
    );
}