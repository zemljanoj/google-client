<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data\Cell;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Cell\Address
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
     * {@inheritdoc}
     */
    public function getColumnName ():string
    {
        return $this->columnName;
    }

    /**
     * {@inheritdoc}
     */
    public function getRowName ():string
    {
        return $this->rowName;
    }

    /**
     * @return string
     */
    public function __toString ():string
    {
        return $this->getColumnName() . $this->getRowName();
    }
}