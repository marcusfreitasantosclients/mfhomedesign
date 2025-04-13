<?php
/*
Theme Name: MF Home Design
Theme URI: https://mfhomedesign.com/
Author: Marcus Freitas
Author URI: https://mafreitas.com.br
Description: A custom WordPress theme
Version: 1.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define('THEME_DIR', get_template_directory());
define('THEME_URL', get_template_directory_uri());
require_once('inc/general-setup.php');

function theme_enqueue_styles_and_scripts() {
    $version = 1.0;
    //CSS
    wp_enqueue_style('bootstrap-css', THEME_URL . '/assets/libs/bootstrap/css/bootstrap.min.css', [], $version);
    wp_enqueue_style('lightbox-css', THEME_URL . '/assets/libs/lightbox/css/lightbox.min.css', [], $version);
    wp_enqueue_style('splide-css', THEME_URL . '/assets/libs/splide/css/splide.min.css', [], $version);
    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], $version);

    //JS
    wp_enqueue_script('bootstrap-js', THEME_URL . '/assets/libs/bootstrap/js/bootstrap.min.js', ['jquery'], $version);
    wp_enqueue_script('bootstrap-js', THEME_URL . '/assets/libs/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], $version);
    wp_enqueue_script('lightbox-js', THEME_URL . '/assets/libs/lightbox/js/lightbox.min.js', ['jquery'], $version);
    wp_enqueue_script('splide-js', THEME_URL . '/assets/libs/splide/js/splide.min.js', ['jquery'], $version);
    wp_enqueue_script('main-js', THEME_URL . '/assets/js/main.js', ['jquery'], $version);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');


function menus_setup() {
    // Enable support for WordPress menus
    register_nav_menus( array(
        'header' => __( 'Header Menu', 'MF Home Design' ),
        'footer'  => __( 'Footer Menu', 'MF Home Design' ),
    ) );
}
add_action( 'after_setup_theme', 'menus_setup' );


//Import files components
function import_component($component_name, $component_data) {
    $component_path = THEME_DIR . '/components/' . $component_name;
    $component_render = 'mf_' . $component_name;

    if (is_dir($component_path)) {  
        // Enqueue CSS
        $component_css = THEME_DIR . '/components/'.$component_name.'/'.$component_name.'.css';
        if (file_exists($component_css)) {
            wp_enqueue_style('component-' . $component_css, THEME_URL .'/components/'.$component_name.'/'.$component_name.'.css');
        }

        // Enqueue JS
        $component_js = THEME_DIR . '/components/'.$component_name.'/'.$component_name.'.js';
        if (file_exists($component_js)) {
            wp_enqueue_script('component-' . $component_js, THEME_URL .'/components/'.$component_name.'/'.$component_name.'.js', array(), null, true);
        }

        // Enqueue PHP
        $component_php = THEME_DIR . '/components/'.$component_name.'/'.$component_name.'.php';
        if (file_exists($component_php)) {
            include_once($component_php);
            $component_render = str_replace('-', '_', $component_render);
            if(function_exists($component_render)) echo $component_render($component_data[$component_name]);
        }
    }
}
?>