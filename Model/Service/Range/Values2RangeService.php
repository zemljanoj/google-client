<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Range;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Range\Values2RangeService
 */
class Values2RangeService
{
    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService
     */
    private $number2LetterService;

    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService
     */
    private $letter2NumberService;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
     */
    private $cellFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
     */
    private $addressFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Model\Data\RowFactory
     */
    private $rowFactory;

    /**
     * Values2RangeService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\Data\RowFactory $rowFactory
     * @param \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService $number2LetterService
     * @param \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService $letter2NumberService
     * @param \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $addressFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Data\RowFactory $rowFactory,
        \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService $number2LetterService,
        \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService $letter2NumberService,
        \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $addressFactory
    ) {
        $this->number2LetterService = $number2LetterService;
        $this->letter2NumberService = $letter2NumberService;
        $this->cellFactory = $cellFactory;
        $this->addressFactory = $addressFactory;
        $this->rowFactory = $rowFactory;
    }

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
     * @param \Google_Service_Sheets_ValueRange $rangeValues
     * @return \Zemljanoj\GoogleClient\Api\Data\RangeInterface
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range,
        \Google_Service_Sheets_ValueRange $rangeValues
    ):\Zemljanoj\GoogleClient\Api\Data\RangeInterface {
        $startColumnName = $range->getAddress()->getStartAddress()->getColumnName();
        $startColumnNumber = $this->letter2NumberService->execute($startColumnName);
        $startRowNumber = $range->getAddress()->getStartAddress()->getRowName();
        foreach ($rangeValues->getValues() as $rowNumber => $row) {
            foreach ($row as $columnNumber => $cellValue) {
                $absoluteRowNumber = strval(intval($rowNumber) +  intval($startRowNumber));
                $absoluteColumnNumber = intval($columnNumber) +  $startColumnNumber;
                $columnNumberName = $this->number2LetterService->execute($absoluteColumnNumber);
                $address = $this->addressFactory->create($columnNumberName, $absoluteRowNumber);
                $cell = $this->cellFactory->create($address);
                $cell->setValue($cellValue);
                $range->setCell($cell);

                try {
                    $row = $range->getRow($absoluteRowNumber);
                } catch (\Exception $exception) {
                    $row = $this->rowFactory->create($absoluteRowNumber);
                    $range->setRow($row, $row->getName());
                }
                $row->setCell($cell, $cell->getAddress()->getColumnName());
            }
        }

        return $range;
    }
}