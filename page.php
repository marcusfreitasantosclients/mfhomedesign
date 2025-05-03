<?php
get_header();

$components = get_field('component_select', 2);
if($components){
    foreach ($components as $component) {
        $component_name = $component['model'];
        import_component($component_name, $component);
    }
}

get_footer();