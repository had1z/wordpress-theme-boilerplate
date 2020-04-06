<?php

add_action( 'init', 'hztheme_register_menus' );
add_action( 'after_setup_theme', 'hztheme_theme_support' );
add_action( 'wp_enqueue_scripts', 'hztheme_register_styles' );
add_action( 'wp_enqueue_scripts', 'hztheme_register_scripts' );
add_action( 'wp_enqueue_scripts', 'hztheme_remove_extra_scripts' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

add_filter( 'show_admin_bar', '__return_false' );

function hztheme_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}

function hztheme_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'hztheme-main-style', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_style( 'hztheme-uikit-style', get_template_directory_uri() . '/node_modules/uikit/dist/css/uikit.css', array(), $theme_version );
    wp_enqueue_style( 'hztheme-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), $theme_version );
}

function hztheme_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'hztheme-uikit-script', get_template_directory_uri() . '/node_modules/uikit/dist/js/uikit.js', array(), $theme_version, true );
    wp_enqueue_script( 'hztheme-custom-script', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true );
}

function hztheme_remove_extra_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}

function hztheme_register_menus() {
    $locations = array(
        'primary' => __( 'Primary Menu', 'hztheme' )
    );

    register_nav_menus( $locations );
}