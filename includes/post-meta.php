<?php

add_action( 'save_post', 'hz_save_posts', 11, 2 );

function callback_function_name() {
    add_meta_box( 'meta-box-id', 'Meta box title', 'hz_show_the_meta_box' );
}

function hz_show_the_meta_box( $post ) {
    $field_value = get_post_meta( $post->ID, 'field-name', true );

    wp_nonce_field( 'hz_post_nonce', 'hz-post-nonce' );

    echo '
    <table class="form-table">
        <tr>
            <th scope="row">Field name</th>
            <td><input type="text" name="field-name" value="' . $field_value . '" style="width: 100%" autocomplete="off"></td>
        </tr>
    </table>';
}

function hz_save_posts( $post_id, $post ) {
    if ( !$post_id ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    if ( !wp_verify_nonce( $_POST['hz-post-nonce'], 'hz_post_nonce' ) ) {
        return $post_id;
    }

    switch( $post->post_type ) {
        case 'example':
            update_post_meta( $post_id, 'field-name', $_POST['field-name'] );
            break;
    }

    return true;
}