<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api;
/**
 * Interface \Zemljanoj\GoogleClient\Api\CellDataFactoryInterface
 */
interface CellDataFactoryInterface
{
    /**
     * @param string $column
     * @param string $row
     * @param string $value
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface
     */
    public function create(string $column, string $row, string $value = null):\Zemljanoj\GoogleClient\Api\Data\CellInterface;
}