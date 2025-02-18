<?php

namespace Zerotoprod\SpapiLwaCli\RefreshToken;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/spapi-lwa-cli
 */
class RefreshTokenArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const refresh_token = 'refresh_token';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public string $refresh_token;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const client_id = 'client_id';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public string $client_id;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const client_secret = 'client_secret';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public string $client_secret;
}