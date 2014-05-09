<?php
namespace Aws\Common;

/**
 * Handles backwards compatibility between v2 and v3 configuration settings.
 */
class Compat
{
    /**
     * Converts SDKv2 configuration options to SDKv3 configuration options.
     *
     * @param array $config Configuration array to convert by reference.
     */
    public function convertConfig(array &$config)
    {
        static $map = [
            'key' => 'convert_key',
            'secret' => 'convert_secret',
            'token' => 'convert_token',
            'credentials.client' => 'convert_credentials_client',
            'credentials.cache.key' => 'convert_credentials_cache_key',
            'base_url' => 'convert_base_url',
            'ssl.certificate_authority' => 'convert_ssl_certificate_authority',
            'curl.options' => 'convert_curl_options',
            'client.backoff.logger' => 'convert_client_backoff_logger',
        ];

        foreach (array_keys($config) as $key) {
            if (isset($map[$key])) {
                $this->{$map[$key]}($config[$key], $config);
            }
        }
    }

    private function convert_key($value, array &$config)
    {
        $config['credentials']['key'] = $value;
        unset($config['key']);
    }

    private function convert_secret($value, array &$config)
    {
        $config['credentials']['secret'] = $value;
        unset($config['secret']);
    }

    private function convert_token($value, array &$config)
    {
        $config['credentials']['token'] = $value;
        unset($config['token'], $config['token.ttd']);
    }

    private function convert_credentials_client($value, array &$config)
    {
        unset($config['credentials.client']);
        trigger_error('credentials.client is no longer supported');
    }

    private function convert_credentials_cache_key($value, array &$config)
    {
        unset($config['credentials.cache.key']);
        trigger_error('credentials.cache.key is no longer supported');
    }

    private function convert_base_url($value, array &$config)
    {
        $config['endpoint'] = $value;
        unset($config['base_url']);
    }

    private function convert_ssl_certificate_authority($value, array &$config)
    {
        $config['client_defaults']['verify'] = $value;
        unset($config['ssl.certificate_authority']);
    }

    private function convert_curl_options($value, array &$config)
    {
        $config['client_defaults']['config']['curl'] = $value;
        unset($config['curl.options']);
    }

    private function convert_client_backoff_logger($value, array &$config)
    {
        unset($config['client.backoff.logger']);

        if ($value instanceof \Psr\Log\LoggerInterface) {
            $config['retry_logger'] = $value;
        } else {
            trigger_error('client.backoff.logger must be an instance of '
                . 'Psr\Log\LoggerInterface');
        }
    }
}
