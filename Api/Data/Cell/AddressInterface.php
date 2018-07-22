<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data\Cell;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
 */
interface AddressInterface
{
    /**
     * @return string
     */
    public function getColumnName():string;

    /**
     * @return string
     */
    public function getRowName():string;

    /**
     * @return string
     */
    public function __toString():string;
}