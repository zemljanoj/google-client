<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface
 */
interface RangeFactoryInterface
{
    /**
     * Create class instance with specified parameters
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function create(
        \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
    ):\Zemljanoj\GoogleClient\Api\Data\RangeInterface;
}
