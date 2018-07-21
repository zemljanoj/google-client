<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Range
 */
class Range implements \Zemljanoj\GoogleClient\Api\Data\RangeInterface
{
    /**
     * @var string
     */
    private $startColumn;

    /**
     * @var string
     */
    private $endColumn;

    /**
     * @var string
     */
    private $startRow;

    /**
     * @var string
     */
    private $endRow;

    /**
     * @var string
     */
    private $sheetName;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellInterface[][]
     * [[<column>][<row>] => <cell>, ...]
     */
    private $cells;

    /**
     * @param string $startColumn
     * @param string $endColumn
     * @param string $startRow
     * @param string $endRow
     * @param string $sheetName
     * @param \Zemljanoj\GoogleClient\Api\Data\CellInterface[][] $cells
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Data\Range\Context $context,
        string $startColumn,
        string $endColumn,
        string $startRow,
        string $endRow,
        string $sheetName = '',
        array $cells = []
    ) {
        $this->startColumn = $startColumn;
        $this->endColumn = $endColumn;
        $this->cells = $cells;
        $this->startRow = $startRow;
        $this->endRow = $endRow;
        $this->sheetName = $sheetName;
    }

    /**
     * @return string
     */
    public function getStartColumn():string
    {
        return $this->startColumn;
    }

    /**
     * @return string
     */
    public function getEndColumn():string
    {
        return $this->endColumn;
    }

    /**
     * @return string
     */
    public function getStartRow():string
    {
        return $this->startRow;
    }

    /**
     * @return string
     */
    public function getEndRow():string
    {
        return $this->endRow;
    }

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\CellInterface[][]
     */
    public function getCells ():array
    {
        return $this->cells;
    }

    /**
     * @return string
     */
    public function getSheetName ():string
    {
        return $this->sheetName;
    }
}