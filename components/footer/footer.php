<?php
function mf_footer() {
    ?>
    <footer class="footer">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-4 text-right">
                    col 1
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