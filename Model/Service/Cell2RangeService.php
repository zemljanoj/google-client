<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Cell2RangeService
 */
class Cell2RangeService
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface
     */
    private $rangeFactory;
    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService
     */
    private $str2ObjService;

    /**
     * Cell2RangeService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface $rangeFactory
     * @param \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService $str2ObjService
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\Data\RangeFactoryInterface $rangeFactory,
        \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService $str2ObjService
    ) {
        $this->rangeFactory = $rangeFactory;
        $this->str2ObjService = $str2ObjService;
    }

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
    ): \Zemljanoj\GoogleClient\Api\Data\RangeInterface
    {
        $cellAddress = $cell->getAddress()->getColumnName() . $cell->getAddress()->getRowName();
        $address = $cellAddress . ':' . $cellAddress;
        $rangeAddress = $this->str2ObjService->execute($address);
        $range = $this->rangeFactory->create($rangeAddress);
        $range->setCell($cell);

        return $range;
    }
}