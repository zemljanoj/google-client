<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Service;
/**
 * Create and authorization the google client object.
 * Class \Zemljanoj\GoogleClient\Service\GetClient
 */
class GetClient
{
    const CONFIG_FILE_NAME = 'client_id.json';

    const CONFIG_FILE_PATH = 'etc';

    /**
     * Client factory.
     * @var \Zemljanoj\GoogleClient\Model\ClientFactory
     */
    private $clientFactory;

    /**
     * @var \Magento\Framework\Filesystem\Io\File
     */
    private $ioFile;

    /**
     * GetClient constructor.
     *
     * @param \Magento\Framework\Filesystem\Io\File $ioFile
     * @param \Zemljanoj\GoogleClient\Model\ClientFactory $clientFactory
     */
    public function __construct (
        \Magento\Framework\Filesystem\Io\File $ioFile,
        \Zemljanoj\GoogleClient\Model\ClientFactory $clientFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->ioFile = $ioFile;
    }

    /**
     * Execute.
     * @return \Google_Client
     */
    public function execute()
    {
        $client = $this->clientFactory->create();
        $config = $this->ioFile->read($this->getFileName());
        $accessToken = json_decode($config, true);
        $client->setAccessToken($accessToken);
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            $config = json_encode($client->getAccessToken());
            $this->ioFile->write($this->getFileName(), $config);
        }

        return $client;
    }

    /**
     * Get config file name.
     * @return string
     */
    private function getFileName()
    {
        return dirname(dirname(__file__))
               . '/' . self::CONFIG_FILE_PATH
               . '/' . self::CONFIG_FILE_NAME;
    }
}