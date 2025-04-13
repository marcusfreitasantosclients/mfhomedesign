<?php
function mf_footer() {
    ?>
    <footer class="footer bg-dark text-white">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-4 text-right">
                    <img src="<?= get_option('site_logo_footer') ?>" alt="Logo" class="img-fluid mb-3" style="width: 150px; height: auto;">
                    <p><?= get_option('site_footer_text'); ?></p>
                </div>

                <div class="col-md-4 text-right">
                    col 2
                </div>

                <div class="col-md-4 text-right">
                    col 3
                </div>
            </div>
        </div>

        <div class="p-3 bg-dark">
            <div class="container text-center text-white">
                <p style="margin: 0;">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <?php
}