<?php

add_action( 'init', 'hztheme_register_menus' );
add_action( 'after_setup_theme', 'hztheme_theme_support' );
add_action( 'wp_enqueue_scripts', 'hztheme_register_styles' );
add_action( 'wp_enqueue_scripts', 'hztheme_register_scripts' );

function hztheme_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}

function hztheme_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'hztheme-main-style', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_style( 'hztheme-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), $theme_version );
}

function hztheme_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'hztheme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true );
}

function hztheme_register_menus() {
    $locations = array(
        'primary' => __( 'Primary Menu', 'hztheme' )
    );

    register_nav_menus( $locations );
}