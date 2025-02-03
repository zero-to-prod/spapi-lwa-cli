<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\SpapiLwaCli\ClientCredentials\ClientCredentialsArguments;
use Zerotoprod\SpapiLwaCli\ClientCredentials\ClientCredentialsCommand;

class ClientCredentialsCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new ClientCredentialsCommand());
        $Command = $Application->find(ClientCredentialsCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            ClientCredentialsArguments::scope => ClientCredentialsArguments::scope,
            ClientCredentialsArguments::client_id => ClientCredentialsArguments::client_id,
            ClientCredentialsArguments::client_secret => ClientCredentialsArguments::client_secret
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}