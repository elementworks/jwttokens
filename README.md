# JWT Tokens plugin for Craft CMS 3.x

Create JWT Tokens in Twig.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require elementworks/jwt-tokens

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for JWT Tokens.

## Settings

The only setting is a signing secret. It is recommended to set this using an [environment variable](https://docs.craftcms.com/v3/config/environments.html).

## How to create a JWT Token

First, create a payload as a Twig hash (associative array).

Next, pass this into the Twig function, along with the algorithm (e.g. `'HS256'`) to create the token:

```twig
{% set payload = {
   'name': 'John Doe',
   'company': 'Google',
} %}

{% set token = craft.jwtTokens.createToken(payload, 'HS256') %}
```

Brought to you by [Steve Rowling](https://springworks.co.uk)
