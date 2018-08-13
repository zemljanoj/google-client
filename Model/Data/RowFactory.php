<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\RowFactory
 */
class RowFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        $instanceName = '\\Zemljanoj\\GoogleClient\\Api\\Data\\RowInterface'
    ) {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * @param string $rowName
     * @return \Zemljanoj\GoogleClient\Api\Data\RowInterface
     */
    public function create(
        string $rowName
    ):\Zemljanoj\GoogleClient\Api\Data\RowInterface {
        return $this->_objectManager->create($this->_instanceName, ['name' => $rowName]);
    }
}
