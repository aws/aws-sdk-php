<?php
namespace Aws\Token;

/**
 * Provides access to an AWS token used for accessing AWS services
 *
 * Going against this because we need to have the info from the profiles, which is all in the thing to start with
 */
interface RefreshableTokenProviderInterface
{
    /**
     * Attempts to refresh this token object
     *
     * @return RefreshableTokenProviderInterface
     */
    public function refresh($previousToken);

    /**
     * Check if a refresh should be attempted
     *
     * @return boolean
     */
    public function shouldAttemptRefresh($previousToken);

}
