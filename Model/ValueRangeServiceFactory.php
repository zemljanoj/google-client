<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\ValueRangeServiceFactory
 */
class ValueRangeServiceFactory implements \Zemljanoj\GoogleClient\Api\ValueRangeServiceFactoryInterface
{
    const CLASS_NAME = 'Google_Service_Sheets_ValueRange';

    /**
     * Object Manager.
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Construct.
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * Create model.
     * @return \Google_Service_Sheets_ValueRange
     */
    public function create():\Google_Service_Sheets_ValueRange
    {
        $service = $this->objectManager->create(self::CLASS_NAME);

        return $service;
    }
}