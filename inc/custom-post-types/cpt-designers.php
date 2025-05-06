<?php 

function register_cpt_designer() {
    $labels = array(
        'name'                  => 'Designers',
        'singular_name'         => 'Designers',
        'menu_name'             => 'Designers',
        'name_admin_bar'        => 'Designer',
        'add_new'               => 'Add new',
        'add_new_item'          => 'New designer',
        'edit_item'             => 'Edit designer',
        'new_item'              => 'New designer',
        'view_item'             => 'View designer',
        'view_items'            => 'View designers',
        'search_items'          => 'Search designers',
        'not_found'             => 'No designer found',
        'not_found_in_trash'    => 'No designer found on trash',
        'all_items'             => 'All designers',
        'archives'              => 'Archives',
        'insert_into_item'      => 'Insert into designer',
        'uploaded_to_this_item' => 'Uploaded',
        'filter_items_list'     => 'Filter designers',
        'items_list_navigation' => 'Browse list of designers',
        'items_list'            => 'designers list',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-customizer',
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), 
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'designers'),
        'show_in_rest'          => false,
    );

    register_post_type('designer', $args);
}
add_action('init', 'register_cpt_designer');