<?php

namespace Zerotoprod\SpapiLwaCli\ClientCredentials;

use Zerotoprod\DataModel\DataModel;

class ClientCredentialsOptions
{
    use DataModel;

    public const user_agent = 'user_agent';
    public ?string $user_agent = null;

    public const response = 'response';
    public bool $response = false;
    public const scope = 'scope';
    public bool $scope = false;

    public const token_type = 'token_type';
    public bool $token_type = false;

    public const expires_in = 'expires_in';
    public bool $expires_in = false;
}