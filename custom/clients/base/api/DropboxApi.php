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

    public function getDropbox(ServiceBase $api, array $args) {

        $baseUrl = "https://api.dropboxapi.com";

        $access_token = 'yyf4aHQGUOAAAAAAAAAAC6kiVe7imBX59CSxOWpJ2VADpdgYU8_RzNoOU4ZYsDWZ';

        $client = new Zend_Http_Client();
        $client->setUri($baseUrl . '/2/files/list_folder');
        $client->setHeaders('Content-Type', 'application/json');
        $client->setHeaders('Authorization', 'Bearer '. $access_token);
        $client->setRawData(json_encode([
            'path' => '/roniel-files'
        ]));

        $response = $client->request(Zend_Http_Client::POST);
        $data = $response->getBody();

        return json_decode($data);
    }
}