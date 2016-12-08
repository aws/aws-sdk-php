<?php
namespace Aws\Credentials;

use GuzzleHttp\Promise;
use Aws\Exception\CredentialsException;

class AssumeRoleCredentialResolver
{

    /** @var string */
    private $profile;
    /** @var string */
    private $fileName;
    /** @var array */
    private $data;
    /** @var boolean */
    private $providerParams;

    const DEFAULT_CREDENTIAL_FILE = '/.aws/credentials';
    const DEFAULT_CREDENTIAL_PROFILE = 'default';

    const DEFAULT_CONFIG_FILE = '/.aws/config';
    const DEFAULT_CONFIG_PROFILE = 'profile default';

    const ERROR_MSG = "Missing required 'AssumeRoleCredentialResolver' configuration option: ";

    use CredentialTrait;

    /**
     * AssumeRoleCredentialResolver helps fetch assumeRole credentials
     * from file with an assume role profile name
     *
     * The constructor requires an option array with params:
     * - assume_role_profile : profile name for this assumeRole in the file
     * - file_name : the file name that this profile lives in
     *
     * @param array $options Configuration options
     */
    public function __construct(array $options = [])
    {
        if (!isset($options['assume_role_profile'])) {
            throw new \InvalidArgumentException(self::ERROR_MSG . "'assume_role_profile'.");
        }
        if (!isset($options['file_name'])) {
            throw new \InvalidArgumentException(self::ERROR_MSG . "'file_name'.");
        }
        $this->profile = $options['assume_role_profile'];
        $this->fileName = $options['file_name'];
        // internal use, test only
        $this->providerParams = isset($options['provider_param']) ?
            $options['provider_param'] : false;
    }

    public function __invoke()
    {
        $msg = self::checkProfile($this->profile, $this->fileName);
        if (!empty($msg)){
            return self::reject($msg);
        }
        $this->data = self::getProfileData($this->profile, $this->fileName);

        if (!$this->isAssumeRoleProfile()) {
            return self::reject("Profile specified is not an assume role profile.");
        }

        $sourceCreds = $this->resolveSourceProfile();
        $region = $this->resolveRegion();
        if (empty($region)) {
            return self::reject("'region' must be provided to retrieve assume role.");
        }

        $args = [
            'region' => $region,
            'credentials' => $sourceCreds,
            'assume_role_params' => $this->paramsParser($this->data),
        ];
        $provider = new AssumeRoleCredentialProvider($args);
        return $this->providerParams ? $args : $provider();
    }

    private function resolveSourceProfile()
    {
        if (!isset($this->data['source_profile'])) {
            // No 'source_profile' information provided,
            // Skip assumeRole, ini check in the credential chain
            return CredentialProvider::chain(
                CredentialProvider::ecsCredentials(),
                CredentialProvider::instanceProfile()
            );
        } else {
            $sourceProfile = $this->data['source_profile'];
            unset($this->data['source_profile']);

            $homeDir = self::getHomeDir();
            if ($sourceProfile === $this->profile) {
                // 'source_profile' provided is the same profile with current assumeRole profile:
                // To avoid infinite loop, jump to default static profile (ini)
                return CredentialProvider::chain(
                    CredentialProvider::ini(
                        self::DEFAULT_CREDENTIAL_PROFILE,
                        $homeDir . self::DEFAULT_CREDENTIAL_FILE
                    ),
                    CredentialProvider::ini(
                        self::DEFAULT_CONFIG_PROFILE,
                        $homeDir . self::DEFAULT_CONFIG_FILE
                    )
                );
            } else {
                // 'source_profile' provided is a different profile:
                // $sourceProfile could be another assumeRole profile or a static profile
                // profile check order: assumeRole, default credential, default config
                return CredentialProvider::chain(
                    CredentialProvider::assumeRole($sourceProfile, $this->fileName),
                    CredentialProvider::assumeRole(
                        $sourceProfile,
                        $homeDir .self::DEFAULT_CREDENTIAL_FILE
                    ),
                    CredentialProvider::assumeRole(
                        $sourceProfile,
                        $homeDir . self::DEFAULT_CONFIG_FILE
                    ),
                    CredentialProvider::ini($sourceProfile, $this->fileName),
                    CredentialProvider::ini(
                        $sourceProfile,
                        $homeDir . self::DEFAULT_CREDENTIAL_FILE
                    ),
                    CredentialProvider::ini(
                        $sourceProfile,
                        $homeDir . self::DEFAULT_CONFIG_FILE
                    )
                );
            }
        }
    }

    private function resolveRegion()
    {
        if (isset($this->data['region'])) {
            $region = $this->data['region'];
            unset($this->data['region']);

            return $region;
        } else {
            // If no region provided under same assume role profile
            // check static profile for region in the same file
            $envProfile = getenv(CredentialProvider::ENV_PROFILE);
            if ($envProfile) {
                return $this->getRegion($envProfile);
            } else {
                return empty($this->getRegion(self::DEFAULT_CREDENTIAL_PROFILE)) ?
                    $this->getRegion(self::DEFAULT_CONFIG_PROFILE) :
                    $this->getRegion(self::DEFAULT_CREDENTIAL_PROFILE);
            }
        }
    }

    private function getRegion($profile)
    {
        $regionFound = empty(self::checkProfile($profile, $this->fileName)) &&
            isset(self::getProfileData($profile, $this->fileName)['region']);
        return $regionFound ? self::getProfileData($profile, $this->fileName)['region'] : '';
    }

    private function isAssumeRoleProfile()
    {
        return isset($this->data['role_arn']); 
    }

    private static function paramsParser(array $params)
    {
        $args = [];
        foreach($params as $param => $value){
            $arg = str_replace('_', '', ucwords($param, '_'));
            $args[$arg] = $value;
        }
        return $args;
    }
}
