<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'forms/v2', '/send-form-data', array(
      'methods' => 'POST',
      'callback' => 'send_form_data',
    ) );
} );