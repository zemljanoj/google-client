<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\PullRangeService
 */
class PullRangeService
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\ClientFactoryInterface
     */
    private $clientFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface
     */
    private $sheetServiceFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService
     */
    private $str2ObjService;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface
     */
    private $rangeFactory;

    /**
     * PullRangeService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\ClientFactoryInterface $clientFactory
     * @param \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface $sheetServiceFactory
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface $rangeFactory
     * @param \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService $str2ObjService
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\ClientFactoryInterface $clientFactory,
        \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface $sheetServiceFactory,
        \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface $rangeFactory,
        \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService $str2ObjService
    ) {
        $this->clientFactory = $clientFactory;
        $this->sheetServiceFactory = $sheetServiceFactory;
        $this->str2ObjService = $str2ObjService;
        $this->rangeFactory = $rangeFactory;
    }

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
    ) {
        $client = $this->clientFactory->create($clientConfig);
        $sheetService = $this->sheetServiceFactory->create($client);
        $rangeValues = $sheetService->spreadsheets_values->get($spreadsheetId, $address);
        $rangeAddress = $this->str2ObjService->execute($address);
        $range = $this->rangeFactory->create($rangeAddress);
        foreach ($rangeValues as $rowNumber => $row) {
            foreach ($row as $columnNumber => $cellValue) {
                // @todo
            }
        }

        return $range;
    }
}