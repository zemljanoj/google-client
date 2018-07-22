<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
use Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Range
 */
class Range implements \Zemljanoj\GoogleClient\Api\Data\RangeInterface
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
     */
    private $address;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellInterface[][]
     * [[<column>][<row>] => <cell>, ...]
     */
    private $cells = [];

    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Range\CheckAddressService
     */
    private $checkAddressService;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
     */
    private $cellFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
     */
    private $cellAddressFactory;

    /**
     * Range constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\Data\Range\Context $context
     * @param \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Data\Range\Context $context,
        \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
    ) {
        $this->address = $address;
        $this->context = $context;
        $this->checkAddressService = $context->getCheckEndRowNumberService();
        $this->cellFactory = $context->getCellFactory();
        $this->cellAddressFactory = $context->getCellAddressFactory();
    }


    /**
     * {@inheritdoc}
     */
    public function getAddress ():\Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
    {
        return $this->address;
    }

    /**
     * {@inheritdoc}
     */
    public function getCells ():array
    {
        return $this->cells;
    }

    /**
     * {@inheritdoc}
     */
    public function setCell (
        \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
    ):\Zemljanoj\GoogleClient\Api\Data\RangeInterface
    {
        $this->cells[$cell->getAddress()->getColumnName()][$cell->getAddress()->getRowName()] = $cell;
        $address = $this->checkAddressService->execute($this->address, $cell);
        $this->address = $address;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCell (string $columnName, string $rowName
    ):\Zemljanoj\GoogleClient\Api\Data\CellInterface
    {
        if (!isset($this->cells[$columnName][$rowName])) {
            $cellAddress = $this->cellAddressFactory->create($columnName, $rowName);
            $cell = $this->cellFactory->create($cellAddress);
            $this->setCell($cell);
        }

        return $this->cells[$columnName][$rowName];
    }
}