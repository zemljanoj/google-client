<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\ClientFactory
 */
class ClientFactory
{
    const CLASS_NAME = 'Google_Client';

    /**
     * Object Manager
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * Client config.
     * @var array
     */
    private $config;

    /**
     * Client action.
     * @var array
     * [<methodName1> => [<argument1>, ...], ...]
     */
    private $actions;

    /**
     * Construct
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $config,
        array $actions
    ) {
        $this->_objectManager = $objectManager;
        $this->config = $config;
        $this->actions = $actions;
    }

    /**
     * Create model
     *
     * @param array $config
     * @return \Google_Client
     */
    public function create(array $config = [], array $actions = [])
    {
        $config = array_merge($this->config, $config);
        $actions = array_merge($this->actions, $actions);
        $model = $this->_objectManager->create(self::CLASS_NAME, $config);
        foreach ($actions as $method => $arguments) {
            $model->{$method}(array_values($arguments));
        }

        return $model;
    }
}