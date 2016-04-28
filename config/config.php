<?php

return [

"wizard_name" => "Jumplink Wizard",


"wizard_javascript" => 
"
/*
This is the defaul JavaScript see: /plugins/jumplink/wizard/config/config.php
It sis initialized here: /plugins/jumplink/wizard/Plugin.php @registerSettings()
 
Add some Items on teh html Tab and enter some content to get started
*/
$('#jumplink_wizard').steps({
    headerTag: 'h3',
    bodyTag: 'section',
    transitionEffect: 'slideLeft',
    autoFocus: true
});",

// "wizard_steps" => "foo"
"wizard_steps" => [
    [
        "wizard_step_title" => "First Item",
        "wizard_step_code" => "Fisrt Item"
    ],
    [
        "wizard_step_title" => "Second Item",
        "wizard_step_code" => "Second Item"
    ]
]

];