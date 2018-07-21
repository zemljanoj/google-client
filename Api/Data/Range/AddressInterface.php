<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data\Range;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
 */
interface AddressInterface
{
    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    public function getStartAddress():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface;

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    public function getEndAddress():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface;

    /**
     * @return string
     */
    public function getSheetName():string;
}