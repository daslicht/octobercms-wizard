<?php namespace Jumplink\Wizard\Models;

use Model;

class Settings extends Model {
    
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'jumplink_wizard_settings';
    public $settingsFields = 'fields.yaml';

}