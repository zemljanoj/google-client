<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\RangeInterface
 */
interface RangeInterface
{
    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
     */
    public function getAddress ():\Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface;

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface[][]
     */
    public function getCells ():array;

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function setCell (
        \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
    ): \Zemljanoj\GoogleClient\Api\Data\RangeInterface;

    /**
     * @param string $columnName
     * @param string $rowName
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface
     */
    public function getCell (string $columnName, string $rowName):\Zemljanoj\GoogleClient\Api\Data\CellInterface;

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\RowInterface[]
     */
    public function getRows(): array;

    /**
     * @param string $rowName
     * @return \Zemljanoj\GoogleClient\Api\Data\RowInterface
     */
    public function getRow(string $rowName): \Zemljanoj\GoogleClient\Api\Data\RowInterface;

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\RowInterface $row
     * @param string $rowName
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function setRow(
        \Zemljanoj\GoogleClient\Api\Data\RowInterface $row,
        string $rowName
    ): \Zemljanoj\GoogleClient\Api\Data\RangeInterface;
}