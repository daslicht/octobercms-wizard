<?php namespace Jumplink\Wizard\Components;

use Cms\Classes\ComponentBase;
use Jumplink\Wizard\Models\Settings;

class Wizard extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Wizard Component',
            'description' => 'Wizard Component'
        ];
    }

    public function defineProperties()
    {
        return [
            'wizardsettings' => [
                'description'       => 'Wizard Component Settings',
                'title'             => 'Wizard Component Settings',
                'default'           => '',
                'type'              => 'string',
                'validationPattern' => '',
                'validationMessage' => 'This is the Validation Message.'
            ]
            // ,
            // 'wizardsettings' => [
            //     'description'       => 'Wizard Component Settings',
            //     'title'             => 'Wizard Component Settings',
            //     'default'           => '',
            //     'type'              => 'string',
            //     'validationPattern' => '',
            //     'validationMessage' => 'This is the Validation Message.'
            // ]
        ];
    }
    
    public function onRender()
    {
         /* Using persisted properties */
         $settings = Settings::instance();
        
         $this->page['wizardsettings'] = $settings->wizardsettings;
         $this->page['wizard_steps'] = $settings->wizard_steps;
          \ChromePhp::log('onRender:',$settings->wizard_steps);
    }
    
    function onInit()
    {
          \ChromePhp::log('onInit before AJAX');
    }
    
    public function onRun()
    {
        $settings = Settings::instance();
        \ChromePhp::log('onRun, Wizard:', Settings::get('wizardsettings')); 
        \ChromePhp::log('my_tab2:',$settings->my_tab2);
        //ladybug_dump($this);
        $this->addJs('/plugins/jumplink/wizard/assets/vendor/jquery.steps/build/jquery.steps.min.js');
        $this->addJs('/plugins/jumplink/wizard/components/wizard.js');
        $this->addCss('/plugins/jumplink/wizard/assets/jquery.steps.css');

    }
       
}