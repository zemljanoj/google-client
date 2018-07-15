<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model;
/**
 * Class \Zemljanoj\GoogleClient\Model\ClientFactory
 */
class ClientFactory implements \Zemljanoj\GoogleClient\Api\ClientFactoryInterface
{
    const CLASS_NAME = 'Google_Client';

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
     * @param \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $config
     * @return \Google_Client
     */
    public function create(\Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface $config)
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $config->getCredentials());
        $client = $this->objectManager->create(self::CLASS_NAME);
        $client->useApplicationDefaultCredentials();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes($config->getScopes());
        $accessToken = $client->fetchAccessTokenWithAssertion();
        $accessToken = $accessToken['access_token'];
        $client->setAccessToken($accessToken);

        return $client;
    }
}