<?php
/**
 * JWT Tokens plugin for Craft CMS 3.x
 *
 * @link      https://springworks.co.uk
 * @copyright Copyright (c) 2024 Steve Rowling
 */

namespace elementworks\jwttokens\models;

use elementworks\jwttokens\JwtTokens;

use Craft;
use craft\base\Model;
use craft\behaviors\EnvAttributeParserBehavior;

/**
 * JWT Tokens Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Steve Rowling
 * @package   JWT Tokens
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Signing Secret
     *
     * @var string
     */
    public $signingSecret = '';

    // Public Methods
    // =========================================================================

    /**
     * @return string the parsed Signing Secret
     */
    public function getSigningSecret(): string
    {
        return Craft::parseEnv($this->signingSecret);
    }

    /*
     * https://docs.craftcms.com/v3/extend/environmental-settings.html#validation
     *
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'parser' => [
                'class' => EnvAttributeParserBehavior::class,
                'attributes' => ['signingSecret'],
            ],
        ];
    }

    /**
     * Returns the validation rules for attributes.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            ['signingSecret', 'required'],
            ['signingSecret', 'string'],
            ['signingSecret', 'default', 'value' => ''],
        ];
    }
}
