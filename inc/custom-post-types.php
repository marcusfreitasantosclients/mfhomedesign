<?php 

// Services
function register_cpt_service() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Services',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'add_new'               => 'Add new',
        'add_new_item'          => 'New service',
        'edit_item'             => 'Edit service',
        'new_item'              => 'New service',
        'view_item'             => 'View service',
        'view_items'            => 'View services',
        'search_items'          => 'Search services',
        'not_found'             => 'No service found',
        'not_found_in_trash'    => 'No service found on trash',
        'all_items'             => 'All services',
        'archives'              => 'Archives',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded',
        'filter_items_list'     => 'Filter services',
        'items_list_navigation' => 'Browse list of services',
        'items_list'            => 'Services list',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-screenoptions',
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'supports'              => array('title'), 
        'has_archive'           => false,
        'rewrite'               => array('slug' => 'service'),
        'show_in_rest'          => false,
    );

    register_post_type('service', $args);
}
add_action('init', 'register_cpt_service');