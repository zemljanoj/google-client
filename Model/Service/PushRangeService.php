<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\PushRangeService
 */
class PushRangeService implements \Zemljanoj\GoogleClient\Api\Service\PushRangeServiceInterface
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
     * @var \Zemljanoj\GoogleClient\Model\Service\Range\Cells2ValuesService
     */
    private $cells2ValuesService;

    /**
     * PullRangeService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\Service\Range\Cells2ValuesService $cells2ValuesService
     * @param \Zemljanoj\GoogleClient\Api\ClientFactoryInterface $clientFactory
     * @param \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface $sheetServiceFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Service\Range\Cells2ValuesService $cells2ValuesService,
        \Zemljanoj\GoogleClient\Api\ClientFactoryInterface $clientFactory,
        \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface $sheetServiceFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->sheetServiceFactory = $sheetServiceFactory;
        $this->cells2ValuesService = $cells2ValuesService;
    }

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig
     * @param string $spreadsheetId
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $clientConfig,
        string $spreadsheetId,
        \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
    ) {
        $client = $this->clientFactory->create($clientConfig);
        $sheetService = $this->sheetServiceFactory->create($client);
        $rangeAddress = $range->getAddress();
        $valueRange = $this->cells2ValuesService->execute($range);
        $sheetService->spreadsheets_values->update(
            $spreadsheetId,
            $rangeAddress,
            $valueRange,
            ['valueInputOption' => 'USER_ENTERED']
        );

        return;
    }
}