<?php

namespace Zerotoprod\SpapiLwaCli\ClientCredentials;

use Zerotoprod\DataModel\DataModel;

class ClientCredentialsArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;

    public const scope = 'scope';
    public string $scope;

    public const client_id = 'client_id';
    public string $client_id;

    public const client_secret = 'client_secret';
    public string $client_secret;
}