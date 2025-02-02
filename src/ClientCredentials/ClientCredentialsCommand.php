<?php

namespace Zerotoprod\SpapiLwaCli\ClientCredentials;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\SpapiLwa\SpapiLwa;

#[AsCommand(
    name: ClientCredentialsCommand::signature,
    description: 'Login With Amazon with client credentials.'
)]
class ClientCredentialsCommand extends Command
{
    public const signature = 'spapi-lwa-cli:client-credentials';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = ClientCredentialsArguments::from($input->getArguments());
        $Options = ClientCredentialsOptions::from($input->getOptions());

        $response = SpapiLwa::clientCredentials(
            $Args->url,
            $Args->scope,
            $Args->client_id,
            $Args->client_secret,
            $Options->user_agent
        );

        if ($response['info']['http_code'] !== 200) {
            $output->writeln(json_encode($response, JSON_PRETTY_PRINT));
        }

        if ($Options->access_token || (!$Options->scope && !$Options->token_type && !$Options->expires_in)) {
            $output->writeln($response['response']['access_token']);

            return Command::SUCCESS;
        }

        if ($Options->scope) {
            $output->writeln($response['response']['scope']);

            return Command::SUCCESS;
        }

        if ($Options->token_type) {
            $output->writeln($response['response']['token_type']);

            return Command::SUCCESS;
        }

        if ($Options->expires_in) {
            $output->writeln($response['response']['expires_in']);

            return Command::SUCCESS;
        }

        $output->writeln(
            json_encode(
                $response,
                JSON_PRETTY_PRINT
            )
        );

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(ClientCredentialsArguments::url, InputArgument::REQUIRED);
        $this->addArgument(ClientCredentialsArguments::scope, InputArgument::REQUIRED);
        $this->addArgument(ClientCredentialsArguments::client_id, InputArgument::REQUIRED);
        $this->addArgument(ClientCredentialsArguments::client_secret, InputArgument::REQUIRED);
        $this->addOption(ClientCredentialsOptions::user_agent, mode: InputOption::VALUE_OPTIONAL, description: 'User Agent');
        $this->addOption(ClientCredentialsOptions::access_token, mode: InputOption::VALUE_NONE, description: 'Returns the access_token');
        $this->addOption(ClientCredentialsOptions::scope, mode: InputOption::VALUE_NONE, description: 'Returns the scope');
        $this->addOption(ClientCredentialsOptions::token_type, mode: InputOption::VALUE_NONE, description: 'Returns the token_type');
        $this->addOption(ClientCredentialsOptions::expires_in, mode: InputOption::VALUE_NONE, description: 'Returns expires_in');
    }
}