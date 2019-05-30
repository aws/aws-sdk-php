<?php

namespace Aws\Test\Integ;

use Aws\Result;
use Aws\Credentials\CredentialProvider;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Defines application features from the specific context.
 */
class CredentialsContext extends \PHPUnit_Framework_Assert implements
    Context,
    SnippetAcceptingContext
{
    use IntegUtils;

    private static $credentialsFile;
    private static $roleName;

    /**
     * @BeforeSuite
     */
    public static function createCredentialsFile()
    {
        self::$credentialsFile = tempnam(sys_get_temp_dir(), '/.aws/credentials');
        touch(self::$credentialsFile);
    }

    /**
     * @AfterSuite
     */
    public static function deleteCredentialsFile()
    {
        unlink(self::$credentialsFile);
    }

    /**
     * @BeforeSuite
     */
    public static function setRoleName()
    {
        self::$roleName = 'php-integration-' . round(microtime(true) * 1000);
    }

    /**
     * @AfterSuite
     */
    public static function deleteRole()
    {
        $client = self::getSdk()->createIam();
        $client->deleteRole([
            'RoleName' => self::$roleName
        ]);
    }

    /**
     * @Given I have a credentials file with session name :value
     */
    public function iHaveACredentialsFile($sessionName)
    {
        $stsClient = self::getSdk()->createSts();
        $sourceIdentity = $stsClient->getCallerIdentity();
        $sourceArn = $sourceIdentity['Arn'];
        $assumeRolePolicy = <<<EOT
{
    "Version": "2012-10-17",
    "Statement": [{
        "Sid": "",
        "Effect": "Allow",
        "Principal": {
            "AWS": "$sourceArn"
        },
        "Action": "sts:AssumeRole"
    }]
}
EOT;
        $iamClient = self::getSdk()->createIam();
        $result = $iamClient->createRole([
           'AssumeRolePolicyDocument' => $assumeRolePolicy,
           'RoleName' => self::$roleName,
        ]);
        $iamClient->waitUntil('RoleExists', ['RoleName' => self::$roleName]);
        $creds = $iamClient->getCredentials()->wait();
        $sourceKeyId = $creds->getAccessKeyId();
        $sourceAccessKey = $creds->getSecretKey();
        $sourceToken = $creds->getSecurityToken();
        $roleArn = $result['Role']['Arn'];
        $ini = <<<EOT
[default]
aws_access_key_id = $sourceKeyId
aws_secret_access_key = $sourceAccessKey
aws_session_token = $sourceToken
[assumeInteg]
role_arn = $roleArn
source_profile = default
role_session_name = $sessionName
EOT;
        file_put_contents(self::$credentialsFile, $ini);
    }

    /**
     * @Given I have credentials
     */
    public function iHaveCredentials()
    {
        $this->credentials = CredentialProvider::ini(
            'assumeInteg',
            self::$credentialsFile
        );
    }

    /**
     * @Given I have an sts client
     */
    public function iHaveAnStsClient()
    {
        $this->client = self::getSdk()->createSts([
            'credentials' => $this->credentials
        ]);
    }

    /**
     * @When I call GetCallerIdentity
     */
    public function iCallGetCallerIdentity()
    {
        //Assume role should exist, but may not yet be assumable.
        $maxAttempts = 10;
        $attempts = 0;
        do {
            try {
                $this->result = $this->client->getCallerIdentity();
            } catch (\Exception $e) {
                $attempts++;
                sleep(2);
                continue;
            }
            break;
        } while ($attempts < $maxAttempts);
    }

    /**
     * @Then the value at :key should contain :value
     */
    public function theValueAtShouldBeA($key, $value)
    {
        $this->assertInstanceOf(Result::class, $this->result);
        $this->assertContains($value, $this->result->search($key));
    }
}
