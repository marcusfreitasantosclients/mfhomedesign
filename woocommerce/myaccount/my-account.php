<?php
defined('ABSPATH') || exit;
?>

<div class="container my-5">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-3">
            <?php do_action('woocommerce_account_navigation'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="woocommerce-MyAccount-content">
                <?php
                /**
                 * My Account content.
                 * Hooks include: woocommerce_account_dashboard, woocommerce_account_orders_endpoint, etc.
                 */
                do_action('woocommerce_account_content');
                ?>
            </div>
        </div>
    </div>
</div>
