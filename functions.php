<?php

require_once 'includes/menu.php';
require_once 'includes/post-type.php';
require_once 'includes/post-meta.php';
require_once 'includes/taxonomy.php';

add_action( 'after_setup_theme', 'hz_theme_support' );
add_action( 'wp_enqueue_scripts', 'hz_register_styles' );
add_action( 'wp_enqueue_scripts', 'hz_register_scripts' );
add_action( 'wp_enqueue_scripts', 'hz_remove_extra_scripts' );

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

function hz_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}

function hz_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'hztheme-main', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_style( 'hztheme-uikit', get_template_directory_uri() . '/node_modules/uikit/dist/css/uikit.css', array(), $theme_version );
    wp_enqueue_style( 'hztheme-base', get_template_directory_uri() . '/assets/css/base.css', array(), $theme_version );
    wp_enqueue_style( 'hztheme-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $theme_version );
}

function hz_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'hztheme-uikit-script', get_template_directory_uri() . '/node_modules/uikit/dist/js/uikit.js', array(), $theme_version, true );
    wp_enqueue_script( 'hztheme-uikit-icons-script', get_template_directory_uri() . '/node_modules/uikit/dist/js/uikit-icons.js', array(), $theme_version, true );
    wp_enqueue_script( 'hztheme-custom-script', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true );
}

function hz_remove_extra_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}