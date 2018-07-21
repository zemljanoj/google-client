<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Cell
 */
class Cell implements \Zemljanoj\GoogleClient\Api\Data\CellInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    private $address;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    private $column;

    /**
     * Cell constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $column
     * @param string $value
     */
    public function __construct(
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $column,
        string $value = null
    ) {
        $this->value = $value;
        $this->column = $column;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue():string
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress ():\Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
    {
        return $this->address;
    }
}