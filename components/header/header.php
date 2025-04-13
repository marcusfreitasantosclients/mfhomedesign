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
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <!-- Logo / Brand -->
                <a class="navbar-brand" href="#">MySite</a>

                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php
                            foreach( $menu_items as $menu_item ) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $menu_item->url ?>"><?= $menu_item->title ?></a>
                                </li>
                            <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php }