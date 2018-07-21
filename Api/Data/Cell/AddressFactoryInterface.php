<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data\Cell;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
 */
interface AddressFactoryInterface
{
    /**
     * Create class instance with specified parameters
     *
     * @param string $columnName
     * @param string $rowName
     * @return \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    public function create(
        string $columnName,
        string $rowName = ''
    ):\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface;
}
