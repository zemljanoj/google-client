<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Range;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Range\CheckAddressService
 */
class CheckAddressService
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
     * CheckAddressService constructor.
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
     * @param \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address
     * @param \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
     * @return \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface
     */
    public function execute(
        \Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface $address,
        \Zemljanoj\GoogleClient\Api\Data\CellInterface $cell
    ):\Zemljanoj\GoogleClient\Api\Data\Range\AddressInterface {
        $endRowNumber = intval($address->getEndAddress()->getRowName());
        $cellRowNumber = intval($cell->getAddress()->getRowName());
        if ($endRowNumber < $cellRowNumber) {
            $newEndAddress = $this->cellAddressFactory->create(
                $address->getEndAddress()->getColumnName(),
                strval($cellRowNumber)
            );
            $newAddress = $this->rangeAddressFactory->create(
                $address->getStartAddress(),
                $newEndAddress,
                $address->getSheetName()
            );
            $address = $newAddress;
        }

        return $address;
    }
}