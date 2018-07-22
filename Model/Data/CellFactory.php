<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\CellFactory
 */
class CellFactory implements \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
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
        $instanceName = '\\Zemljanoj\\GoogleClient\\Api\\Data\\CellInterface'
    ) {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * {@inheritdoc}
     */
    public function create(
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $address
    ):\Zemljanoj\GoogleClient\Api\Data\CellInterface {
        return $this->_objectManager->create($this->_instanceName, ['address' => $address]);
    }
}
