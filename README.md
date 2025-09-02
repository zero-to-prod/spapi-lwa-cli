# Zerotoprod\SpapiLwaCli

![](art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/spapi-lwa-cli)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/spapi-lwa-cli/test.yml?label=test)](https://github.com/zero-to-prod/spapi-lwa-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/spapi-lwa-cli/build_docker_image.yml?label=build_docker_image)](https://github.com/zero-to-prod/spapi-lwa-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/spapi-lwa-cli/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/spapi-lwa-cli/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/spapi-lwa-cli?color=blue)](https://packagist.org/packages/zero-to-prod/spapi-lwa-cli/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/spapi-lwa-cli.svg?color=purple)](https://packagist.org/packages/zero-to-prod/spapi-lwa-cli/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/spapi-lwa-cli?color=f28d1a)](https://packagist.org/packages/zero-to-prod/spapi-lwa-cli)
[![License](https://img.shields.io/packagist/l/zero-to-prod/spapi-lwa-cli?color=pink)](https://github.com/zero-to-prod/spapi-lwa-cli/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/spapi-lwa-cli.svg)](https://wakatime.com/badge/github/zero-to-prod/spapi-lwa-cli)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/spapi-lwa-cli?branch=main)](https://hitsofcode.com/github/zero-to-prod/spapi-lwa-cli/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation Publishing](#documentation-publishing)
    - [Automatic Documentation Publishing](#automatic-documentation-publishing)
- [Usage](#usage)
  - [Available Commands](#available-commands)
    - [`spapi-lwa-cli:refresh-token`](#spapi-lwa-clirefresh-token)
    - [`spapi-lwa-cli:client-credentials`](#spapi-lwa-cliclient-credentials)
    - [`spapi-lwa-cli:src`](#spapi-lwa-clisrc)
- [Docker Image](#docker-image)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Image Development](./IMAGE_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

A CLI for connecting to Amazons Selling Partner API with [Login With Amazon](https://developer-docs.amazon.com/sp-api/docs/connecting-to-the-selling-partner-api) (LWA).

## Requirements

- PHP 8.1 or higher.

## Installation

Install `Zerotoprod\SpapiLwaCli` via [Composer](https://getcomposer.org/):

```bash
composer require zero-to-prod/spapi-lwa-cli
```

This will add the package to your project's dependencies and create an autoloader entry for it.

## Documentation Publishing

You can publish this README to your local documentation directory.

This can be useful for providing documentation for AI agents.

This can be done using the included script:

```bash
# Publish to default location (./docs/zero-to-prod/spapi-lwa-cli)
vendor/bin/zero-to-prod-spapi-lwa-cli

# Publish to custom directory
vendor/bin/zero-to-prod-spapi-lwa-cli /path/to/your/docs
```

### Automatic Documentation Publishing

You can automatically publish documentation by adding the following to your `composer.json`:

```json
{
    "scripts": {
        "post-install-cmd": [
            "zero-to-prod-spapi-lwa-cli"
        ],
        "post-update-cmd": [
            "zero-to-prod-spapi-lwa-cli"
        ]
    }
}
```

## Usage

Run this command to see the available commands:

```shell
vendor/bin/spapi-lwa-cli list
```

### Available Commands

#### `spapi-lwa-cli:refresh-token`

**Description**: Login With Amazon with a refresh_token.

**Usage**:
```bash
vendor/bin/spapi-lwa-cli spapi-lwa-cli:refresh-token [options] <refresh_token> <client_id> <client_secret>
```

**Arguments**:
- `refresh_token` (required): The LWA refresh token
- `client_id` (required): Get this value when you register your application
- `client_secret` (required): Get this value when you register your application

**Options**:
- `--user_agent[=USER_AGENT]`: User Agent
- `--response`: Returns the full response
- `--refresh_token`: Returns the refresh_token
- `--token_type`: Returns the token_type
- `--expires_in`: Returns expires_in

**Examples**:
```bash
# Get access token (default behavior)
vendor/bin/spapi-lwa-cli spapi-lwa-cli:refresh-token "your-refresh-token" "your-client-id" "your-client-secret"

# Get the full response
vendor/bin/spapi-lwa-cli spapi-lwa-cli:refresh-token "your-refresh-token" "your-client-id" "your-client-secret" --response

# Get only the token type
vendor/bin/spapi-lwa-cli spapi-lwa-cli:refresh-token "your-refresh-token" "your-client-id" "your-client-secret" --token_type

# With custom user agent
vendor/bin/spapi-lwa-cli spapi-lwa-cli:refresh-token "your-refresh-token" "your-client-id" "your-client-secret" --user_agent="MyApp/1.0"
```

**Sample Output** (access token):
```
Atzr|IwEBIAxHQiJEuOjl-123456789abcdef...
```

**Sample Output** (full response with `--response`):
```json
{
    "response": {
        "access_token": "Atzr|IwEBIAxHQiJEuOjl-123456789abcdef...",
        "token_type": "bearer",
        "expires_in": 3600,
        "refresh_token": "Atzr|IwEBIA..."
    },
    "info": {
        "url": "https://api.amazon.com/auth/o2/token",
        "content_type": "application/json; charset=utf-8",
        "http_code": 200,
        "total_time": 0.234567
    }
}
```

#### `spapi-lwa-cli:client-credentials`

**Description**: Login With Amazon with client credentials.

**Usage**:
```bash
vendor/bin/spapi-lwa-cli spapi-lwa-cli:client-credentials [options] <scope> <client_id> <client_secret>
```

**Arguments**:
- `scope` (required): The scope of the LWA authorization grant
- `client_id` (required): Get this value when you register your application
- `client_secret` (required): Get this value when you register your application

**Options**:
- `--user_agent[=USER_AGENT]`: User Agent
- `--response`: Returns the full response
- `--scope`: Returns the scope
- `--token_type`: Returns the token_type
- `--expires_in`: Returns expires_in

**Examples**:
```bash
# Get access token (default behavior)
vendor/bin/spapi-lwa-cli spapi-lwa-cli:client-credentials "sellingpartnerapi::notifications" "your-client-id" "your-client-secret"

# Get the full response
vendor/bin/spapi-lwa-cli spapi-lwa-cli:client-credentials "sellingpartnerapi::notifications" "your-client-id" "your-client-secret" --response

# Get only the scope
vendor/bin/spapi-lwa-cli spapi-lwa-cli:client-credentials "sellingpartnerapi::notifications" "your-client-id" "your-client-secret" --scope

# With custom user agent
vendor/bin/spapi-lwa-cli spapi-lwa-cli:client-credentials "sellingpartnerapi::notifications" "your-client-id" "your-client-secret" --user_agent="MyApp/1.0"
```

**Sample Output** (access token):
```
Atza|IwEBIAxHQiJEuOjl-987654321fedcba...
```

**Sample Output** (full response with `--response`):
```json
{
    "response": {
        "access_token": "Atza|IwEBIAxHQiJEuOjl-987654321fedcba...",
        "scope": "sellingpartnerapi::notifications",
        "token_type": "bearer",
        "expires_in": 3600
    },
    "info": {
        "url": "https://api.amazon.com/auth/o2/token",
        "content_type": "application/json; charset=utf-8",
        "http_code": 200,
        "total_time": 0.567890
    }
}
```

#### `spapi-lwa-cli:src`

**Description**: Project source link

**Usage**:
```bash
vendor/bin/spapi-lwa-cli spapi-lwa-cli:src
```

**Arguments**: None

**Options**: None

**Example**:
```bash
vendor/bin/spapi-lwa-cli spapi-lwa-cli:src
```

**Sample Output**:
```
https://github.com/zero-to-prod/spapi-lwa-cli
```

## Docker Image

You can also run the cli using the [docker image](https://hub.docker.com/repository/docker/davidsmith3/spapi-lwa-cli/general):

```shell
docker run --rm davidsmith3/spapi-lwa-cli
```

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/spapi-lwa-cli/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.