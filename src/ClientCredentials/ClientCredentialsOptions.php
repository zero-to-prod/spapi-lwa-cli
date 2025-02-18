<?php

namespace Zerotoprod\SpapiLwaCli\ClientCredentials;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/spapi-lwa-cli
 */
class ClientCredentialsOptions
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const user_agent = 'user_agent';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public ?string $user_agent = null;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const response = 'response';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public bool $response = false;
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const scope = 'scope';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public bool $scope = false;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const token_type = 'token_type';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public bool $token_type = false;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const expires_in = 'expires_in';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public bool $expires_in = false;
}