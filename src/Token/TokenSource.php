<?php
namespace Aws\Token;

/**
 * Identifies the source that produced a bearer token.
 */
enum TokenSource: string
{
    case BEARER_SERVICE_ENV_VARS = 'bearer_service_env_vars';
}
