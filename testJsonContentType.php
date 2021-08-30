<?php

require './vendor/autoload.php';
use GuzzleHttp\Psr7;
use Aws\Middleware;
use Aws\Panorama\PanoramaClient; //your client will be under your [servicename]/[service_id]Client
$client = new \Aws\AugmentedAIRuntime\AugmentedAIRuntimeClient([
    'region' => 'us-west-2',
    'version' => 'latest',
]);

$failures = 0;
$successes = 0;

//set this to true if your command without a payload is a post method with all parameters optional, otherwise false
$isCommandWithoutPayloadPostMethod = false;

function getCommandWithPayload($client, $function, $functionName)
{
    //replace 'operationName'  with your operation name
    $command = $client->getCommand("putUsers", [
        "datasetArn" => "arn:aws:personalize:us-west-2:385668748323:dataset/test-rest-json/USERS",
        "users" => [
            [
            "properties"=>'{"numberOfRatings": "12"}',
            "userId"=>"abc",
            ]
        ],
    ]);
    $command->getHandlerList()->appendBuild($function, $functionName);
    return $command;
}


function getCommandWithoutPayload($client, $function, $functionName, $bodyFunction, $bodyFunctionName, $isCommandWithoutPayloadPostMethod)
{
    //replace 'operationName'  with your the same operation from above if all inputs are optional
    $command = $client->getCommand("ListApplications", [
//this method has all input shapes optional:
    ]);
    $command->getHandlerList()->appendBuild($function, $functionName);
    if ($isCommandWithoutPayloadPostMethod)
        $command->getHandlerList()->appendBuild($bodyFunction, $bodyFunctionName);
    return $command;
}










$noHeaderFunction = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withoutHeader('Content-Type');
});
$headerFunction1 = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withHeader('Content-Type', "");
});
$headerFunction2 = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withHeader('Content-Type', "application/x-amz-json-1.1");
});
$headerFunction3 = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withHeader('Content-Type', "application/json");
});

$noBodyFunction = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withBody(Psr7\Utils::streamFor(null));
});
$emptyBodyFunction = Middleware::mapRequest(function ($request) {
    // Return a new request with the added header
    return $request->withBody(Psr7\Utils::streamFor("{}"));
});

function printResult($client, $command, &$successes, &$failures)
{

    try {

    $result = $client->execute($command);
    $statusCode = $result['@metadata']['statusCode'];
    } catch (Exception $exception) {
        $statusCode = $exception->getResponse()->getStatusCode();
    }

    //change this to match the expected status
    $matchesExpectedStatus = $statusCode  == 200;

    $statusCodeMessage = "// good";
    if ($matchesExpectedStatus) {
        $successes++;
    } else {
        $statusCodeMessage = "// bad";
        $failures++;
    }
    echo "\t\t\tStatus code: {$statusCode} {$statusCodeMessage}\n";
}

echo "Testing permutations of rest-json headers\n";
echo "\tWith payload:\n";
echo "\t\tEmpty content type:  //ruby and java v1\n";
printResult($client, getCommandWithPayload($client, $noHeaderFunction, 'no-header'), $successes, $failures);
echo "\t\tNo content type header:  //python and cli\n";
printResult($client, getCommandWithPayload($client, $headerFunction1, 'add-empty-header'), $successes, $failures);
echo "\t\tContent type with header value application/x-amz-json-1.1:  //java v2 and C++\n";
printResult($client, getCommandWithPayload($client, $headerFunction2, 'add-json-11-header'), $successes, $failures);
echo "\t\tContent type with header value application/json:  //JS v1, JS v2, JS v3, Go v1, Go v2, .NET, Powershell, PHP\n";
printResult($client, getCommandWithPayload($client, $headerFunction3, 'add-json-header'), $successes, $failures);
//echo "\tWithout payload:\n";
//echo "\t\tEmpty content type header, no body:  //ruby, java v1\n";
//printResult($client, getCommandWithoutPayload($client, $noHeaderFunction, 'no-header', $noBodyFunction, "no-body", $isCommandWithoutPayloadPostMethod), $successes, $failures);
//echo "\t\tNo content type header, no body:  //php, python and cli\n";
//printResult($client, getCommandWithoutPayload($client, $headerFunction1, 'add-empty-header', $noBodyFunction, "no-body", $isCommandWithoutPayloadPostMethod), $successes, $failures);
//echo "\t\tContent type with header value application/x-amz-json-1.1, no body:  //java v2 and C++\n";
//printResult($client, getCommandWithoutPayload($client, $headerFunction2, 'add-json-11-header', $noBodyFunction, "no-body", $isCommandWithoutPayloadPostMethod), $successes, $failures);
//echo "\t\tContent type with header value application/json, no:  //Go v1\n";
//printResult($client, getCommandWithoutPayload($client, $headerFunction3, 'add-json-header', $noBodyFunction, "no-body", $isCommandWithoutPayloadPostMethod), $successes, $failures);
//echo "\t\tContent type with header value application/json, empty body:  //JS v1, JS v2, JS v3, Go v1, Go v2, .NET, Powershell\n";
//printResult($client, getCommandWithoutPayload($client, $headerFunction3, 'add-json-header', $emptyBodyFunction, "empty-body", $isCommandWithoutPayloadPostMethod), $successes, $failures);

echo "Successes: {$successes}\n";
echo "Failures: {$failures}\n";




