<?php
require 'vendor/autoload.php';
// configure the Google Client
$client = new \Google_Client();
$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// credentials.json is the key file we downloaded while setting up our Google Sheets API
$path = 'credentials.json';
$client->setAuthConfig($path);

// configure the Sheets Service
$service = new \Google_Service_Sheets($client);
$spreadsheetId = '1FJsMLqctfiXPpjykB7IV55NyeeFGkwgiWutfS_nFQX0';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);
// var_dump($spreadsheet);
$range = 'l1!A1:Z1000'; // here we use the name of the Sheet to get all the rows
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
var_dump($values);