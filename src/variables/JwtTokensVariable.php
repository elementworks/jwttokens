<?php
/**
 * JWT Tokens plugin for Craft CMS 3.x
 *
 * @link      https://springworks.co.uk
 * @copyright Copyright (c) 2024 Steve Rowling
 */

namespace elementworks\jwttokens\variables;

use Craft;
use elementworks\jwttokens\JwtTokens;
use Firebase\JWT\JWT;

/**
 * JWT Tokens Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.jwtTokens }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Steve Rowling
 * @package   JWT Tokens
 * @since     1.0.0
 */
class JwtTokensVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Create JWT token for given payload and algorithm
     *
     * @param array $payload
     * @param string $algorithm
     * @return string
     */
    public function createToken(array $payload, string $algorithm = 'HS256'): string
    {
        $signingSecret = JwtTokens::$settings->getSigningSecret();

        return JWT::encode($payload, $signingSecret, $algorithm);
    }
}
