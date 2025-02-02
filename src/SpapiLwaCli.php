<?php

namespace Zerotoprod\SpapiLwaCli;

use Symfony\Component\Console\Application;
use Zerotoprod\SpapiLwaCli\ClientCredentials\ClientCredentialsCommand;
use Zerotoprod\SpapiLwaCli\RefreshToken\RefreshTokenCommand;
use Zerotoprod\SpapiLwaCli\Src\SrcCommand;

class SpapiLwaCli
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new RefreshTokenCommand());
        $Application->add(new ClientCredentialsCommand());
    }
}