<?php
function mf_footer() {
    $theme_location = 'footer';
    $menu_items = [];
    
    if (($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }

    $services = query_cpt_based_on_type('service');
    $social_links = [
        'whatsapp' => 'http://wa.me/' . get_option('site_whatsapp'),
        'facebook' => get_option('site_facebook'),
        'instagram' => get_option('site_instagram'),
        'twitter' => get_option('site_twitter'),
        'linkedin' => get_option('site_linkedin'),
        'youtube' => get_option('site_youtube'),
        'tiktok' => get_option('site_tiktok'),
    ]
    ?>
    <footer class="footer">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?= get_option('site_logo_footer') ?>" alt="Logo" class="img-fluid mb-3" style="width: 100px; height: auto;">
                    <p><?= get_option('site_footer_text'); ?></p>
                </div>

                <div class="col-md-3">
                    <h5>Sitemap</h5>

                    <?php foreach($menu_items as $menu_item){ ?>
                        <div class="mb-2  w-100">
                            <a href="<?= $menu_item->url; ?>" class=" text-decoration-none">
                                <?= $menu_item->title; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <h5>Our Services</h5>

                    <?php foreach($services as $service){ ?>
                        <div class="mb-2 w-100">
                            <a href="" class=" text-decoration-none">
                                <?= $service->post_title; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-3 social__links">
                    <h5>Contact us</h5>

                    <?php if(get_option('site_email')){ ?>
                        <a href="mailto:<?= get_option('site_email') ?>" class=" text-decoration-none mb-2"><?= get_option('site_email') ?></a>
                    <?php } ?>

                    <ul class="list-unstyled d-flex flex-row align-items-center gap-2">
                        <?php foreach($social_links as $key => $link) { ?>
                            <?php if($link) { ?>
                                <li>
                                    <a href="<?= $link ?>" target="_blank">
                                        <box-icon type='logo' name="<?= $key ?>" color="var(--primary_color_dark)"></box-icon>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>     
                    </ul>
                </div>
            </div>
        </div>


        <div class="py-3">
            <div class="container text-center">
                <hr />
                <p class="" style="margin: 0;">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <?php
}