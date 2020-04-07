<?php

add_action( 'init', 'hz_register_post_types' );

function hz_register_post_types() {
    $post_types = hz_get_custom_post_types();

    foreach ( $post_types as $slug => $args ) {
        register_post_type( $slug, $args );
    }
}

function hz_get_custom_post_types() {
    $post_types = [
        'hz_example' => hz_get_example_args()
    ];

    return $post_types;
}

function hz_get_example_args() {
    $labels = [
        'name'                     => 'Examples',
        'singular_name'            => 'example',
        'add_new'                  => 'Add new',
        'add_new_item'             => 'Add new post',
        'edit_item'                => 'Edit post',
        'new_item'                 => 'New post',
        'view_item'                => 'View post',
        'view_items'               => 'View posts',
        'search_items'             => 'Search posts',
        'not_found'                => 'No post found',
        'not_found_in_trash'       => 'No post found in trash',
        'parent_item_colon'        => 'Parent page',
        'all_items'                => 'All posts',
        'archives'                 => 'Post archives',
        'attributes'               => 'Post attributes',
        'insert_into_item'         => 'Insert in to post',
        'uploaded_to_this_item'    => 'Uploaded to this post',
        'featured_image'           => 'Featured image',
        'set_featured_image'       => 'Set featured image',
        'remove_featured_image'    => 'Remove featured image',
        'use_featured_image'       => 'Use featured image',
        'menu_name'                => 'Examples',
        'filter_items_list'        => 'Filter post list',
        'items_list_navigation'    => 'Posts list navigation',
        'items_list'               => 'Posts list',
        'item_published'           => 'Post published',
        'item_published_privately' => 'Post published privately',
        'item_reverted_to_draft'   => 'Post reverted to draft',
        'item_scheduled'           => 'Post scheduled',
        'item_updated'             => 'Post updated'
    ];

    $args = [
        'labels'               => $labels,
        'description'          => 'A short descriptive summary of what the post type is',
        'public'               => false,
        'hierarchical'         => false,
        'show_ui'              => false,
        'show_in_rest'         => false,
        'has_archive'          => false,
        'menu_position'        => 25,
        'menu_icon'            => 'URL, base64-encoded svg or Dashicon class',
        'register_meta_box_cb' => 'callback_function_name',
        'supports'             => [
            'title',
            'editor',
            'comments',
            'revisions',
            'trackbacks',
            'author',
            'excerpt',
            'page-attributes',
            'thumbnail',
            'custom-fields',
            'post-formats'
        ]
    ];

    return $args;
}