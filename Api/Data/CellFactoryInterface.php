<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
 */
interface CellFactoryInterface
{
    /**
     * Create class instance with specified parameters
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $address
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface
     */
    public function create(
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $address
    ):\Zemljanoj\GoogleClient\Api\Data\CellInterface;
}
