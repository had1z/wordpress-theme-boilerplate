<?php

require_once __DIR__ . '/includes/menu.php';
require_once __DIR__ . '/includes/base-template-functions.php';
require_once __DIR__ . '/includes/custom-template-functions.php';

add_action( 'after_setup_theme', 'hz_theme_support' );
add_action( 'wp_enqueue_scripts', 'hz_register_styles' );
add_action( 'wp_enqueue_scripts', 'hz_register_scripts' );
add_action( 'admin_enqueue_scripts', 'hz_admin_enqueue_scripts' );

add_filter( 'show_admin_bar', '__return_false' );

function hz_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}

function hz_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'hztheme-main', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_style( 'hztheme-uikit', get_template_directory_uri() . '/node_modules/uikit/dist/css/uikit.min.css', array(), $theme_version );
    wp_enqueue_style( 'hztheme-base', get_template_directory_uri() . '/assets/css/base.css', array(), $theme_version );
    wp_enqueue_style( 'hztheme-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $theme_version );
}

function hz_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'hztheme-uikit-script', get_template_directory_uri() . '/node_modules/uikit/dist/js/uikit.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'hztheme-uikit-icons-script', get_template_directory_uri() . '/node_modules/uikit/dist/js/uikit-icons.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'hztheme-custom-script', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true );
}

function hz_admin_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'hz-admin-script', get_template_directory_uri() . '/assets/admin/js/admin.js', ['jquery'], null, true );
}