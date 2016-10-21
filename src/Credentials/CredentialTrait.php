<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;
/**
 * Sourcing credential profile data from file helpers.
 */
trait CredentialTrait
{
    /**
     * Check profile availability in a given file.
     * Return empty string or error message string
     *
     * @return string
     */
    private static function checkProfile($profile, $fileName)
    {
        if (!is_readable($fileName)) {
            return "Cannot read credentials from $fileName";
        }
        $data = parse_ini_file($fileName, true);
        if ($data === false) {
            return "Invalid credentials file: $fileName";
        }
        if (!isset($data[$profile])) {
            return "'$profile' not found in $fileName";
        }
        return '';
    }

    private static function getProfileData($profile, $fileName)
    {
        $data = parse_ini_file($fileName, true);
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
