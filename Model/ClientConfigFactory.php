<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\ClientConfigFactory
 */
class ClientConfigFactory
{
    const CLASS_NAME = 'Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface';

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
     * Create model.
     * @return \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface
     */
    public function create()
    {
        return $this->objectManager->create(self::CLASS_NAME);
    }
}