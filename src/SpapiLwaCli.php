<?php

namespace Zerotoprod\SpapiLwaCli;

use Symfony\Component\Console\Application;
use Zerotoprod\SpapiLwaCli\ClientCredentials\ClientCredentialsCommand;
use Zerotoprod\SpapiLwaCli\RefreshToken\RefreshTokenCommand;
use Zerotoprod\SpapiLwaCli\Src\SrcCommand;

/**
 * A CLI for connecting to Amazons Selling Partner API with Login With Amazon (LWA).
 *
 * @link https://github.com/zero-to-prod/spapi-lwa-cli
 */
class SpapiLwaCli
{
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new RefreshTokenCommand());
        $Application->add(new ClientCredentialsCommand());
    }
}