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
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $row;

    /**
     * Cell constructor.
     *
     * @param string $value
     * @param string $column
     * @param string $row
     */
    public function __construct(string $column, string $row, string $value = null)
    {
        $this->value = $value;
        $this->column = $column;
        $this->row = $row;
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
    public function getColumn():string
    {
        return $this->column;
    }

    /**
     * {@inheritdoc}
     */
    public function getRow():string
    {
        return $this->row;
    }
}