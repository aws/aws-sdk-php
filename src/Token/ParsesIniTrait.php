<?php
namespace Aws\Token;

trait ParsesIniTrait
{
    /**
     * Gets profiles from specified $extraFilename, or default ini files.
     */
    private static function loadProfiles($extraFilename = null) {
        $profiles = [];
        $credFile = getenv('AWS_SHARED_CREDENTIALS_FILE') ?: (self::getHomeDir() . '/.aws/credentials');
        $configFile = getenv('AWS_CONFIG_FILE') ?: (self::getHomeDir() . '/.aws/config');
        if (file_exists($credFile)) {
            $profiles = \Aws\parse_ini_file($credFile, true, INI_SCANNER_RAW);
        }

        if (file_exists($configFile)) {
            $configProfileData = \Aws\parse_ini_file($configFile, true, INI_SCANNER_RAW);
            foreach ($configProfileData as $name => $profile) {
                // standardize config profile names
                $name = str_replace('profile ', '', $name);
                $profiles[$name] = array_merge($profiles[$name] ?? [], $profile);
            }
        }

        if (!is_null($extraFilename) && $extraFilename != $credFile && $extraFilename != $configFile) {
            $extraFileData = \Aws\parse_ini_file($extraFilename, true, INI_SCANNER_RAW);
            foreach ($extraFileData as $name => $profile) {
                // standardize config profile names
                $name = str_replace('profile ', '', $name);
                $profiles[$name] = array_merge($profiles[$name] ?? [], $profile);
            }
        }
        return $profiles;
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
}
