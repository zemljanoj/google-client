<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\ServiceSheetsFactory
 */
class ServiceSheetsFactory
{
    const CLASS_NAME = 'Google_Service_Sheets';

    /**
     * Object Manager
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * Construct
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager

    ) {
        $this->_objectManager = $objectManager;
    }

    /**
     * Create model
     *
     * @param \Google_Client $client
     * @return \Google_Service_Sheets
     */
    public function create(\Google_Client $client)
    {
        $model = $this->_objectManager->create(self::CLASS_NAME, [$client]);

        return $model;
    }
}