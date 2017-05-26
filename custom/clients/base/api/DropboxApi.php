<?php

class DropboxApi extends SugarApi
{

    public function registerApiRest()
    {
        return array(
            'getDropbox' => array(
                'reqType' => 'GET',
                'path' => array('dropbox'),
                'pathVars' => array(''),
                'method' => 'getDropbox',
                'jsonParams' => array('filter'),
                'shortHelp' => 'Lists filtered records.',
                'longHelp' => 'include/api/help/module_filter_get_help.html',
                'exceptions' => array(
                    // Thrown in getPredefinedFilterById
                    'SugarApiExceptionNotFound',
                    'SugarApiExceptionError',
                    // Thrown in filterList and filterListSetup
                    'SugarApiExceptionInvalidParameter',
                    // Thrown in filterListSetup, getPredefinedFilterById, and parseArguments
                    'SugarApiExceptionNotAuthorized',
                ),
            )
        );
    }

    /**
     * @param ServiceBase $api
     * @param array $args
     * @return mixed
     */
    public function getDropbox(ServiceBase $api, array $args)
    {

        return json_decode($this->getFileListFromDropbox());
    }

    /**
     * @return string
     * @throws Zend_Http_Client_Exception
     */
    protected function getFileListFromDropbox()
    {

        $baseUrl = "https://api.dropboxapi.com";

        $access_token = 'yyf4aHQGUOAAAAAAAAAAC6kiVe7imBX59CSxOWpJ2VADpdgYU8_RzNoOU4ZYsDWZ';
        $fileClient = new Zend_Http_Client();
        $fileClient->setUri($baseUrl . '/2/files/list_folder');
        $fileClient->setHeaders('Content-Type', 'application/json');
        $fileClient->setHeaders('Authorization', 'Bearer ' . $access_token);
        $fileClient->setRawData(json_encode([
            'path' => '/roniel-files'
        ]));

        $response = $fileClient->request(Zend_Http_Client::POST);
        return $response->getBody();
    }
}