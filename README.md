Zemljanoj_GoogleClient module.

Developing in Magento 2.2.3.

This is adapter module for using the Google Api Client in the magento 2 environment.

Pull data from Google Sheet.
Example using.

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        /** @var \Zemljanoj\GoogleClient\Model\Service\PullRangeService $a */
        $service = $objectManager->get('Zemljanoj\GoogleClient\Model\Service\PullRangeService');

        /** @var \Magento\Framework\Filesystem\DirectoryList $directory */
        $directory = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
        $rootPath  =  $directory->getRoot();
        $path = $rootPath . '/app/etc/';
        /** @var \Zemljanoj\GoogleClient\Model\Data\ClientConfig $config */
        $config = $objectManager->get('\Zemljanoj\GoogleClient\Model\Data\ClientConfig');
        $config
            ->setScopes([\Google_Service_Sheets::SPREADSHEETS])
            ->setCredentials($path . 'client_secret.json');

        $spreadsheetId = '1dNEchTdBdLDD_3KhfghQDMnpZkTnx6yZKluznBYbSE04';
        $range = 'Target!AA4:AB4';

        $rangeObject = $service->execute($config, $spreadsheetId, $range);
