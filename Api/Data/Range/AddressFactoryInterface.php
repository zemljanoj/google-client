<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data\Range;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\Range\AddressFactoryInterface
 */
interface AddressFactoryInterface
{
    /**
     * Create class instance with specified parameters
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $startAddress
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $endAddress
     * @param string $sheetName
     * @return \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
     */
    public function create(
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $startAddress,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $endAddress,
        string $sheetName = ''
    ):\Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface;
}
