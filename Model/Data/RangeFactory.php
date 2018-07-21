<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\RangeFactory
 */
class RangeFactory implements \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface
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
        $instanceName = '\\Zemljanoj\\GoogleClient\\Api\\Data\\Range\\AddressInterface'
    ) {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * {@inheritdoc}
     */
    public function create(
        \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
    ):\Zemljanoj\GoogleClient\Api\Data\RangeInterface {
        return $this->_objectManager->create($this->_instanceName, ['address' => $address]);
    }
}
