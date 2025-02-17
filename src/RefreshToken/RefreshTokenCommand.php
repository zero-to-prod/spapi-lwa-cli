<?php

namespace Zerotoprod\SpapiLwaCli\RefreshToken;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\SpapiLwa\SpapiLwa;

/**
 * @link https://github.com/zero-to-prod/spapi-lwa-cli
 */
#[AsCommand(
    name: RefreshTokenCommand::signature,
    description: 'Login With Amazon with a refresh_token.'
)]
class RefreshTokenCommand extends Command
{
    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public const signature = 'spapi-lwa-cli:refresh-token';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = RefreshTokenArguments::from($input->getArguments());
        $Options = RefreshTokenOptions::from($input->getOptions());

        $response = SpapiLwa::from(
            $Args->client_id,
            $Args->client_secret,
            user_agent: $Options->user_agent
        )->refreshToken($Args->refresh_token);

        if ($response['info']['http_code'] !== 200) {
            $output->writeln(json_encode($response, JSON_PRETTY_PRINT));

            return Command::SUCCESS;
        }

        if ($Options->response) {
            $output->writeln(json_encode($response, JSON_PRETTY_PRINT));

            return Command::SUCCESS;
        }

        if ($Options->refresh_token) {
            $output->writeln($response['response']['refresh_token']);

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

        $output->writeln($response['response']['access_token']);

        return Command::SUCCESS;
    }

    /**
     * @link https://github.com/zero-to-prod/spapi-lwa-cli
     */
    public function configure(): void
    {
        $this->addArgument(RefreshTokenArguments::refresh_token, InputArgument::REQUIRED, 'The LWA refresh token');
        $this->addArgument(RefreshTokenArguments::client_id, InputArgument::REQUIRED, 'Get this value when you register your application');
        $this->addArgument(RefreshTokenArguments::client_secret, InputArgument::REQUIRED, 'Get this value when you register your application');
        $this->addOption(RefreshTokenOptions::user_agent, mode: InputOption::VALUE_OPTIONAL, description: 'User Agent');
        $this->addOption(RefreshTokenOptions::response, mode: InputOption::VALUE_NONE, description: 'Returns the full response');
        $this->addOption(RefreshTokenOptions::refresh_token, mode: InputOption::VALUE_NONE, description: 'Returns the refresh_token');
        $this->addOption(RefreshTokenOptions::token_type, mode: InputOption::VALUE_NONE, description: 'Returns the token_type');
        $this->addOption(RefreshTokenOptions::expires_in, mode: InputOption::VALUE_NONE, description: 'Returns expires_in');
    }
}