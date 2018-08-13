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
    private $value = '';

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface
     */
    private $address;

    /**
     * Cell constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $address
     * @param string $value
     */
    public function __construct(
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressInterface $address,
        string $value = ''
    ) {
        $this->value = $value;
        $this->address = $address;
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