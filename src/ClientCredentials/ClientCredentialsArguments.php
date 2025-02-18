<?php

namespace Zerotoprod\SpapiLwaCli\ClientCredentials;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/spapi-lwa-cli
 */
class ClientCredentialsArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const scope = 'scope';
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public string $scope;

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