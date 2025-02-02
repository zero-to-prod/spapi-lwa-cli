<?php

namespace Zerotoprod\SpapiLwaCli\RefreshToken;

use Zerotoprod\DataModel\DataModel;

class RefreshTokenOptions
{
    use DataModel;

    public const user_agent = 'user_agent';
    public ?string $user_agent = null;

    public const access_token = 'access_token';
    public bool $access_token = false;
    public const refresh_token = 'refresh_token';
    public bool $refresh_token = false;

    public const token_type = 'token_type';
    public bool $token_type = false;

    public const expires_in = 'expires_in';
    public bool $expires_in = false;
}