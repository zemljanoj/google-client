<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Row
 */
class Row implements \Zemljanoj\GoogleClient\Api\Data\RowInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellInterface[]
     * [[<column>] => <cell>, ...]
     */
    private $cells = [];

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
     * @param string $name
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Data\Row\Context $context,
        $name
    ) {
        $this->name = $name;
        $this->cellFactory = $context->getCellFactory();
        $this->cellAddressFactory = $context->getCellAddressFactory();
    }

    /**
     * {@inheritdoc}
     */
    public function getName ()
    : string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getCells ()
    : array
    {
        return $this->cells;
    }

    /**
     * {@inheritdoc}
     */
    public function setCell (
        \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell,
        $columnName
    ): \Zemljanoj\GoogleClient\Api\Data\RowInterface {
        $this->cells[$columnName] = $cell;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCell (
        string $columnName
    ): \Zemljanoj\GoogleClient\Api\Data\CellInterface {
        if (!isset($this->cells[$columnName])) {
            $cellAddress = $this->cellAddressFactory->create($columnName, $this->name);
            $cell = $this->cellFactory->create($cellAddress);
            $this->setCell($cell, $columnName);
        }

        return $this->cells[$columnName];
    }

    /**
     * {@inheritdoc}
     */
    public function getCellByValue(string $value):\Zemljanoj\GoogleClient\Api\Data\CellInterface
    {
        /** @var \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell */
        foreach ($this->getCells() as $cell) {
            if ($cell->getValue() == $value) {

                return $cell;
            }
        }

        throw new \Magento\Framework\Exception\NoSuchEntityException();
    }
}