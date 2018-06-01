<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Service;
/**
 * Create and authorization the google client object.
 * Class \Zemljanoj\GoogleClient\Service\AuthClient
 */
class AuthClient implements \Zemljanoj\GoogleClient\Api\Service\AuthClientInterface
{
    const CONFIG_FILE_NAME = 'client_id.json';

    const CONFIG_FILE_PATH = 'etc';

    /**
     * @var \Magento\Framework\Filesystem\Io\File
     */
    private $ioFile;

    /**
     * GetClient constructor.
     *
     * @param \Magento\Framework\Filesystem\Io\File $ioFile
     */
    public function __construct (
        \Magento\Framework\Filesystem\Io\File $ioFile
    ) {
        $this->ioFile = $ioFile;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(\Google_Client $client)
    {
        $configFileName = $this->getFileName();
        $client->setAuthConfig($configFileName);
        $config = $this->ioFile->read($configFileName);
        $accessToken = json_decode($config, true);
        $client->setAccessToken($accessToken);
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            $config = json_encode($client->getAccessToken());
            $this->ioFile->write($this->getFileName(), $config);
        }
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