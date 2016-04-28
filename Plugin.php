<?php namespace Jumplink\Wizard;

use Backend;
use System\Classes\PluginBase;
use Config;
use Jumplink\Wizard\Models\Settings;

/*https://octobercms.com/docs/plugin/components#component-assets*/

/**
 * wizard Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'wizard',
            'description' => 'Wizard Plugin',
            'author'      => 'Marc Wensauer',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            '\Jumplink\Wizard\Components\Wizard' => 'wizard'
        ];
    }
    
    function setDefaultValues() {
        
        /*
         * Read Settings from DataBase
         */
        $settings = Settings::instance(); 
        $wizard_name = $settings->wizard_name; 
        $wizard_javascript = $settings->wizard_javascript; 
        
        // print_r($settings->wizard_steps);die;
        /*
         * read from /plugins/jumplink/wizard/config/config.php
         */
//         $wizard_steps = Config::get('jumplink.wizard::wizard_steps'); 
//         print_r($wizard_steps);
//    die;
        /*
         * Check if Database Settings exists, if no use File Based Config 
         */
        if(!$settings->wizard_name){
            Settings::set("wizard_name", Config::get('jumplink.wizard::wizard_name'));
        }
        if(!$settings->wizard_javascript){
            Settings::set("wizard_javascript", Config::get('jumplink.wizard::wizard_javascript'));
        }
        if(!$settings->wizard_steps){
            Settings::set("wizard_steps",  Config::get('jumplink.wizard::wizard_steps') );
        }   
    }
    
    public function registerSettings() {
        $this->setDefaultValues();
        return [
            'settings' => [
                'label'       => 'Wizard',
                'description' => 'Configure the Wizard Steps',
                'category'    => 'Marketing',
                'icon'        => 'icon-cog',
                'class'       => 'Jumplink\Wizard\Models\Settings',
                'order'       => 1
            ]
        ];
    }
    
    
    function __construct() {
     
     // echo Settings::get('wizard_javascript'); 

    }
   
   

}