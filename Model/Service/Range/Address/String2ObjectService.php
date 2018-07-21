<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Range\Address;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Range\Address\String2ObjectService
 */
class String2ObjectService
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
     */
    private $cellAddressFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Range\AddressFactoryInterface
     */
    private $rangeAddressFactory;

    /**
     * String2Object constructor.
     *
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $cellAddressFactory
     * @param \Zemljanoj\GoogleClient\Api\Data\Range\AddressFactoryInterface $rangeAddressFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $cellAddressFactory,
        \Zemljanoj\GoogleClient\Api\Data\Range\AddressFactoryInterface $rangeAddressFactory
    ) {
        $this->cellAddressFactory = $cellAddressFactory;
        $this->rangeAddressFactory = $rangeAddressFactory;
    }

    /**
     * @param string $value
     * @return \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
     */
    public function execute(string $value)
    {
        list($sheetName, $startColumn, $endColumn, $startRow, $endRow) = $this->parseValue($value);
        $startAddress = $this->cellAddressFactory->create($startColumn, $startRow);
        $endAddress = $this->cellAddressFactory->create($endColumn, $endRow);
        $rangeAddress = $this->rangeAddressFactory->create($startAddress, $endAddress, $sheetName);

        return $rangeAddress;
    }

    /**
     * @param string $value
     * @return string[]
     */
    private function parseValue(string $value)
    {
        $sheetName = '';
        $startColumn = '';
        $endColumn = '';
        $startRow = '';
        $endRow = '';

        $address = explode('!', $value);
        $range = $address[0];
        if (count($address) == 2) {
            $sheetName = $address[0];
            $range = $address[1];
        }
        $cells = explode(':', $range);
        $pattern = '/([a-z]{1,})([0-9]{0,})/i';
        if (preg_match($pattern, $cells[0], $matches)) {
            $startColumn = $matches[1];
            $startRow = $matches[2];
        }
        if (preg_match($pattern, $cells[1], $matches)) {
            $endColumn = $matches[1];
            $endRow = $matches[2];
        }

        return [$sheetName, $startColumn, $endColumn, $startRow, $endRow];
    }
}