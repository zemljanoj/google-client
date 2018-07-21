<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data\Range;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Range\Address
 */
class Address implements \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    private $startAddress;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    private $endAddress;

    /**
     * @var string
     */
    private $sheetName;

    /**
     * Address constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $startAddress
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $endAddress
     * @param string $sheetName
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $startAddress,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $endAddress,
        string $sheetName)
    {
        $this->startAddress = $startAddress;
        $this->endAddress = $endAddress;
        $this->sheetName = $sheetName;
    }

    /**
     * {@inheritdoc}
     */
    public function getStartAddress ():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
    {
        return $this->startAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndAddress ():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
    {
        return $this->endAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getSheetName ():string
    {
        return $this->sheetName;
    }
}