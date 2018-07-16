<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\CellDataFactory
 */
class CellDataFactory implements \Zemljanoj\GoogleClient\Api\CellDataFactoryInterface
{
    const CLASS_NAME = 'Zemljanoj\GoogleClient\Api\Data\CellInterface';

    /**
     * Object Manager.
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Construct.
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function create(string $column, string $row, string $value = null)
    {
        $cell = $this->objectManager->create(
            self::CLASS_NAME,
            [
                $column,
                $row,
                $value
            ]
        );

        return $cell;
    }
}