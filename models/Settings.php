<?php namespace Code200\Eucookielawmadness\models;


use October\Rain\Database\Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'code200_eucookielawmadness_settings';

    public $settingsFields = 'fields.yaml';

    protected $cache = [];

}
