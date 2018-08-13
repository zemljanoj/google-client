<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data\Row;

/**
 * Class \Zemljanoj\GoogleClient\Model\Data\Row\Context
 */
class Context
{
    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
     */
    private $cellFactory;

    /**
     * @var \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
     */
    private $cellAddressFactory;

    /**
     * Context constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\Service\Range\CheckAddressService $checkAddressService
     * @param \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory
     * @param \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $cellAddressFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface $cellFactory,
        \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface $cellAddressFactory
    ) {
        $this->cellFactory = $cellFactory;
        $this->cellAddressFactory = $cellAddressFactory;
    }

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
     */
    public function getCellFactory ()
    : \Zemljanoj\GoogleClient\Api\Data\CellFactoryInterface
    {
        return $this->cellFactory;
    }

    /**
     * @return \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
     */
    public function getCellAddressFactory ()
    : \Zemljanoj\GoogleClient\Api\Data\Cell\AddressFactoryInterface
    {
        return $this->cellAddressFactory;
    }
}