<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;

/**
 * @internal Sourcing credential profile data from file helpers.
 */
trait CredentialTrait
{
    /**
     * Check profile availability in a given file.
     * Returns a string describing any error that could occur.
     *
     * @param string $profile
     * @param string $filename
     *
     * @return null|string
     */
    private static function checkProfile($profile, $filename)
    {
        if (!is_readable($filename)) {
            return "Cannot read credentials from $filename";
        }
        $data = parse_ini_file($filename, true);
        if ($data === false) {
            return "Invalid credentials file: $filename";
        }
        if (!isset($data[$profile])) {
            return "'$profile' not found in $filename";
        }
    }

    private static function getProfileData($profile, $filename)
    {
        $msg = self::checkProfile($profile, $filename);
        if ($msg){
            return self::reject($msg);
        }
        $data = parse_ini_file($filename, true);
        return $data[$profile];
    }

    /**
     * Gets the environment's HOME directory if available.
     *
     * @return null|string
     */
    private static function getHomeDir()
    {
        // On Linux/Unix-like systems, use the HOME environment variable
        if ($homeDir = getenv('HOME')) {
            return $homeDir;
        }

        // Get the HOMEDRIVE and HOMEPATH values for Windows hosts
        $homeDrive = getenv('HOMEDRIVE');
        $homePath = getenv('HOMEPATH');

        return ($homeDrive && $homePath) ? $homeDrive . $homePath : null;
    }

    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new CredentialsException($msg));
    }
}
