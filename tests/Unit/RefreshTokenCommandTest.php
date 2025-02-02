<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\SpapiLwaCli\RefreshToken\RefreshTokenArguments;
use Zerotoprod\SpapiLwaCli\RefreshToken\RefreshTokenCommand;

class RefreshTokenCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new RefreshTokenCommand());
        $Command = $Application->find(RefreshTokenCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            RefreshTokenArguments::url => RefreshTokenArguments::url,
            RefreshTokenArguments::refresh_token => RefreshTokenArguments::refresh_token,
            RefreshTokenArguments::client_id => RefreshTokenArguments::client_id,
            RefreshTokenArguments::client_secret => RefreshTokenArguments::client_secret
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}