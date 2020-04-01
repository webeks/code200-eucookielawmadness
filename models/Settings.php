<?php namespace Code200\Eucookielawmadness\models;


use October\Rain\Database\Model;

class Settings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel'
    ];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = [
        'header',
        'message',
        'dismiss',
        'allow',
        'link',
        'deny',
    ];

    public $settingsCode = 'code200_eucookielawmadness_settings';

    public $settingsFields = 'fields.yaml';

    protected $cache = [];

}
