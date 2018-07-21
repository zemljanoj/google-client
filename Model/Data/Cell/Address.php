<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data\Range;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Range\Address
 */
class Address implements \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
{
    /**
     * @var string
     */
    private $columnName;

    /**
     * @var string
     */
    private $rowName;

    /**
     * Address constructor.
     *
     * @param string $columnName
     * @param string $rowName
     */
    public function __construct (string $columnName, string $rowName)
    {
        $this->columnName = $columnName;
        $this->rowName = $rowName;
    }

    /**
     * @return string
     */
    public function getColumnName ():string
    {
        return $this->columnName;
    }

    /**
     * @return string
     */
    public function getRowName ():string
    {
        return $this->rowName;
    }
}