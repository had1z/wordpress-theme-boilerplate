<?php

add_action( 'init', 'hztheme_register_menus' );

function hztheme_register_menus() {
    $locations = array(
        'primary' => __( 'Primary Menu', 'hztheme' )
    );

    register_nav_menus( $locations );
}