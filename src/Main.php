<?php

require '../vendor/autoload.php';

use Aws\ApiGatewayV2\ApiGatewayV2Client;

$client = new ApiGatewayV2Client([
'region' => 'us-east-2',
'version' => 'latest',
]);
$client->createDomainName( ['DomainName' => 'string.com',  'DomainNameConfigurations' => [

        ['ApiGatewayDomainName' => 'string.com',
        'CertificateArn'=>'acm:aws:execute-api:us-east-2:385668748323:t8xfhp1wif/*/GET/']
        ]]);


//$result = $client->getApi([
//'ApiId' => $api->get('ApiId'),
//]);

//var_dump($client->getDomainNames()['Items']);
var_dump($client->getDomainName(['DomainName' => 'string.com']));