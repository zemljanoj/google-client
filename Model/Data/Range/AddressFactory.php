<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data\Range;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Range\AddressFactory
 */
class AddressFactory implements \Zemljanoj\GoogleClient\Api\Data\Range\AddressFactoryInterface
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
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $startAddress,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $endAddress,
        string $sheetName = ''
    ):\Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface {
        return $this->_objectManager->create(
            $this->_instanceName,
            ['startAddress' => $startAddress, 'endAddress' => $endAddress, 'sheetName' => $sheetName]
        );
    }
}
