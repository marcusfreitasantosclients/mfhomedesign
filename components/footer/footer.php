<?php
function mf_footer() {
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
    <footer class="footer bg-dark text-white">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= get_option('site_logo_footer') ?>" alt="Logo" class="img-fluid mb-3" style="width: 150px; height: auto;">
                    <p><?= get_option('site_footer_text'); ?></p>
                </div>

                <div class="col-md-4">
                    <h5>Our Services</h5>

                    <?php foreach($services as $service){ ?>
                        <div class="mb-2">
                            <a href="" class="text-white text-decoration-none">
                                <?= $service->post_title; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-4 social__links">
                    <h5>Contact us</h5>

                    <?php if(get_option('site_email')){ ?>
                        <a href="mailto:<?= get_option('site_email') ?>" class="text-white text-decoration-none mb-5"><?= get_option('site_email') ?></a>
                    <?php } ?>

                    <ul class="list-unstyled d-flex flex-row align-items-center gap-2 mt-2">
                        <?php foreach($social_links as $key => $link) { ?>
                            <?php if($link) { ?>
                                <li>
                                    <a href="<?= $link ?>" target="_blank">
                                        <box-icon type='logo' name="<?= $key ?>" color="white"></box-icon>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>     
                    </ul>
                </div>
            </div>
        </div>

        <hr style="margin: 0"/>

        <div class="p-3 bg-dark">
            <div class="container text-center text-white">
                <p style="margin: 0;">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <?php
}