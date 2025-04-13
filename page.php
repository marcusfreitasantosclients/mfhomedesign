<?php
get_header();

$components = get_field('component_select');
if(!$components) return;

foreach ($components as $component) {
    $component_name = $component['model'];
    import_component($component_name, $component);
}

get_footer();