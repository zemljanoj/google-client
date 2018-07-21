<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\CellInterface
 */
interface CellInterface
{
    /**
     * @return string
     */
    public function getValue():string;

    /**
     * @param string $value
     * @return $this
     */
    public function setValue(string $value);

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    public function getAddress():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface;
}