<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Range;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Range\Cells2ValuesService
 */
class Cells2ValuesService
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
     * @var \Zemljanoj\GoogleClient\Api\ValueRangeServiceFactoryInterface
     */
    private $valRangeServFactory;

    /**
     * Values2CellsService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\ValueRangeServiceFactoryInterface $valRangeServFactory
     * @param \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService $number2LetterService
     * @param \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService $letter2NumberService
     * @param \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $addressFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\ValueRangeServiceFactoryInterface $valRangeServFactory,
        \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService $number2LetterService,
        \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService $letter2NumberService,
        \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $addressFactory
    ) {
        $this->number2LetterService = $number2LetterService;
        $this->letter2NumberService = $letter2NumberService;
        $this->cellFactory = $cellFactory;
        $this->addressFactory = $addressFactory;
        $this->valRangeServFactory = $valRangeServFactory;
    }

    /**
     * @param \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
     * @return \Google_Service_Sheets_ValueRange
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\RangeInterface $range
    ):\Google_Service_Sheets_ValueRange {
        $startColumnName = $range->getAddress()->getStartAddress()->getColumnName();
        $absoluteStartColumnNumber = $this->letter2NumberService->execute($startColumnName);
        $endColumnName = $range->getAddress()->getEndAddress()->getColumnName();
        $absoluteEndColumnNumber = $this->letter2NumberService->execute($endColumnName);

        $absoluteStartRowNumber = intval($range->getAddress()->getStartAddress()->getRowName());
        $absoluteEndRowNumber = intval($range->getAddress()->getEndAddress()->getRowName());

        $values = [];
        for ($row = $absoluteStartRowNumber; $row <= $absoluteEndRowNumber; $row++) {
            $rowValues = [];
            for ($column = $absoluteStartColumnNumber; $column <= $absoluteEndColumnNumber; $column++) {
                $columnName = $this->number2LetterService->execute($column);
                $value = $range->getCell($columnName, strval($row))->getValue();
                $rowValues[] = $value;
            }
            $values[] = $rowValues;
        }

        $valueRange = $this->valRangeServFactory->create();
        $valueRange->setValues($values);

        return $valueRange;
    }
}