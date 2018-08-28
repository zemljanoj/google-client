<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\RowInterface
 */
interface RowInterface
{
    /**
     * @return string
     */
    public function getName ():string;

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface[]
     */
    public function getCells ():array;

    /**
     * @param string $columnName
     * @param \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
     * @return \Zemljanoj\GoogleClient\Api\Data\RowInterface
     */
    public function setCell (\Zemljanoj\GoogleClient\Api\Data\CellInterface $cell, $columnName)
    :\Zemljanoj\GoogleClient\Api\Data\RowInterface;

    /**
     * @param string $columnName
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface
     */
    public function getCell (string $columnName):\Zemljanoj\GoogleClient\Api\Data\CellInterface;

    /**
     * @param string $value
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCellByValue(string $value):\Zemljanoj\GoogleClient\Api\Data\CellInterface;
}