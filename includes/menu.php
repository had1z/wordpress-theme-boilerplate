<?php

add_action( 'init', 'hz_register_menus' );

function hz_register_menus() {
    $locations = array(
        'primary' => __( 'Primary Menu', 'hztheme' )
    );

    register_nav_menus( $locations );
}