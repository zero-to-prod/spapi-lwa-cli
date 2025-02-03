<?php

namespace Zerotoprod\SpapiLwaCli\RefreshToken;

use Zerotoprod\DataModel\DataModel;

class RefreshTokenArguments
{
    use DataModel;

    public const refresh_token = 'refresh_token';
    public string $refresh_token;

    public const client_id = 'client_id';
    public string $client_id;

    public const client_secret = 'client_secret';
    public string $client_secret;
}