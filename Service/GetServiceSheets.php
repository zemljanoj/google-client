<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Service;
/**
 * Create and authorization the google client object.
 * Class \Zemljanoj\GoogleClient\Service\GetServiceSheets
 */
class GetServiceSheets implements \Zemljanoj\GoogleClient\Api\Service\GetServiceSheetsInterface
{
    /**
     * Service get client.
     * @var \Zemljanoj\GoogleClient\Service\AuthClient
     */
    private $authClientService;

    /**
     * Service Sheets factory.
     * @var \Zemljanoj\GoogleClient\Model\ServiceSheetsFactory
     */
    private $serviceSheetsFactory;

    /**
     * Client factory.
     * @var \Zemljanoj\GoogleClient\Model\ClientFactory
     */
    private $clientFactory;

    /**
     * GetServiceSheets constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\ClientFactory $clientFactory
     * @param \Zemljanoj\GoogleClient\Service\AuthClient $authClientService
     * @param \Zemljanoj\GoogleClient\Model\ServiceSheetsFactory $serviceSheetsFactory
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\ClientFactory $clientFactory,
        \Zemljanoj\GoogleClient\Service\AuthClient $authClientService,
        \Zemljanoj\GoogleClient\Model\ServiceSheetsFactory $serviceSheetsFactory
    ) {
        $this->authClientService = $authClientService;
        $this->serviceSheetsFactory = $serviceSheetsFactory;
        $this->clientFactory = $clientFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $client = $this->clientFactory->create();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->authClientService->execute($client);
        $service = $this->serviceSheetsFactory->create($client);

        return $service;
    }
}