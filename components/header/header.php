<?php

function mf_header($component_data){ 
    $theme_location = 'header';
    $menu_items = [];
    
    if (($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }

    ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo / Brand -->
                <a class="navbar-brand" href="<?= home_url() ?>">
                    <img src="<?= get_option('site_logo_header') ?>" alt="Logo" class="img-fluid" style="width: 60px; height: auto;">
                </a>

                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-2">
                        <?php
                        // Group menu items by parent ID
                        $menu_tree = [];
                        foreach ($menu_items as $item) {
                            $menu_tree[$item->menu_item_parent][] = $item;
                        }

                        // Recursive function to render menu items
                        function render_menu_items($parent_id, $menu_tree) {
                            foreach ($menu_tree[$parent_id] ?? [] as $item) {
                                $has_children = !empty($menu_tree[$item->ID]);
                                $classes = implode(' ', $item->classes ?? []);
                                if ($has_children) {
                                    echo '<li class="nav-item dropdown ' . esc_attr($classes) . '">';
                                    echo '<a class="nav-link dropdown-toggle" href="' . esc_url($item->url) . '" id="menu-item-' . $item->ID . '" role="button" data-bs-toggle="dropdown" aria-expanded="false" target="' . esc_attr($item->target) . '">' . esc_html($item->title) . '</a>';
                                    echo '<ul class="dropdown-menu" aria-labelledby="menu-item-' . $item->ID . '">';
                                    render_menu_items($item->ID, $menu_tree);
                                    echo '</ul>';
                                    echo '</li>';
                                } else {
                                    echo '<li class="nav-item ' . esc_attr($classes) . '">';
                                    echo '<a class="nav-link" href="' . esc_url($item->title == "Logout" ? wp_logout_url(home_url()) : $item->url) . '" target="' . esc_attr($item->target) . '">' . esc_html($item->title) . '</a>';
                                    echo '</li>';
                                }
                            }
                        }

                        render_menu_items(0, $menu_tree);
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= wc_get_endpoint_url('myaccount') ?>">
                                <span class="d-block d-md-none">Minha conta</span>
                                <box-icon name='user' class="d-none d-md-block" color="var(--primary_color_dark)"></box-icon>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= wc_get_endpoint_url('cart') ?>"><box-icon name='cart' color="var(--primary_color_dark)" ></box-icon></a>
                        </li>

                        <li class="nav-item">
                            <?php import_component('searchform', ['searchform' => []]); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<?php }