<?php
get_header();

import_component('button', [
    'button' => [
        'text'     => 'Clique aqui',
        'url'      =>    'https://google.com',
        'target'   => '_blank',
        'type'     => 'primary' 
    ]
    ]);
$components = get_field('component_select');
if($components){
    foreach ($components as $component) {
        $component_name = $component['model'];
        import_component($component_name, $component);
    }
}

get_footer();