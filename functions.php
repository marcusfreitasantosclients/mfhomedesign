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
require_once('inc/general-setup/general-setup.php');
require_once('inc/custom-post-types/cpt-services.php');
require_once('inc/custom-post-types/cpt-designers.php');
require_once('inc/custom-post-types/cpt-gallery.php');
require_once('api-routes.php');




function theme_enqueue_styles_and_scripts() {
    $version = 1.0;
    //CSS
    wp_enqueue_style('bootstrap-css', THEME_URL . '/assets/libs/bootstrap/css/bootstrap.min.css', [], $version);
    wp_enqueue_style('lightbox-css', THEME_URL . '/assets/libs/lightbox/css/lightbox.min.css', [], $version);
    wp_enqueue_style('splide-css', THEME_URL . '/assets/libs/splide/css/splide.min.css', [], $version);
    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], $version);

    //JS
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


function query_cpt_based_on_type($type){
    $query = new WP_Query( [
        'post_type' => $type,
        'posts_per_page' => -1,
        'order_by' => 'title',
    ]);

    return $query->posts;
}


function get_product_categories($category_ids=[]){
    $categories_to_include = $category_ids ? $category_ids : "";
    $product_cat_args = array(
        'taxonomy'   => 'product_cat',
        'orderby'    => 'menu_order',
        'order'      => 'ASC',
        'include'   =>  $categories_to_include,
        'hide_empty' => true
    );
    $product_categories = get_terms($product_cat_args);
    
    $filtered_categories = array_filter($product_categories, function($category) {
        return $category->parent == 0;
    });
    
    return $filtered_categories;
}


function send_form_data(WP_REST_Request $request){
    $form_data = json_decode($request->get_body(), true);
    $email_to = get_option('site_email');
    $headers[] = 'From: ' . get_bloginfo('name') . '<' . $email_to . '>';

    $email_body = '
    <html lang="en">
      <body>
        <table style="width: 100%; font-family: Lato, sans-serif;">
          <thead style="background: #2b3a4d; text-align: left;">
            <tr>
              <th colspan="2" style="padding: 20px; color: white;">Contact</th>
            </tr>
          </thead>
          <tbody>
            <tr style="display: block; border-bottom: 1px solid #e5e5e5;">
              <td style="padding: 10px; color: #202020; width: 100px;"><b>Name:</b></td>
              <td style="padding: 10px; color: #202020;">' . htmlspecialchars($form_data['name']) . '</td>
            </tr>
            <tr style="display: block; border-bottom: 1px solid #e5e5e5;">
              <td style="padding: 10px; color: #202020; width: 100px;"><b>E-mail</b></td>
              <td style="padding: 10px; color: #202020;">' . htmlspecialchars($form_data['email']) . '</td>
            </tr>
            <tr style="display: block; border-bottom: 1px solid #e5e5e5;">
              <td style="padding: 10px; color: #202020; width: 100px;"><b>Subject</b></td>
              <td style="padding: 10px; color: #202020;">' . htmlspecialchars($form_data['subject']) . '</td>
            </tr>
            <tr style="display: block; border-bottom: 1px solid #e5e5e5;">
              <td style="padding: 10px; color: #202020; width: 100px;"><b>Message</b></td>
              <td style="padding: 10px; color: #202020;">' . nl2br(htmlspecialchars($form_data['message'])) . '</td>
            </tr>
          </tbody>
          <tfoot style="text-align: left;">
            <tr>
              <th colspan="2" style="font-size: 10px; color: #005c9b; font-weight: 100; margin-top: 30px; display: block;">
                Message sent from <a href="' . site_url() . '" target="_blank">' . get_bloginfo('name') . '</a>
              </th>
            </tr>
          </tfoot>
        </table>
      </body>
    </html>';

    //wp_mail($email_to, $form_data['subject'], $email_body, $headers);
    
    return $headers;
}
?>