<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\SheetServiceFactory
 */
class SheetServiceFactory implements \Zemljanoj\GoogleClient\Api\SheetServiceFactoryInterface
{
    const CLASS_NAME = 'Google_Service_Sheets';

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
     * @return \Google_Service_Sheets
     */
    public function create(\Google_Client $client)
    {
        $service = $this->objectManager->create(self::CLASS_NAME, ['client' => $client]);

        return $service;
    }
}