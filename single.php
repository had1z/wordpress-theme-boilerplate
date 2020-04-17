<?php
$post_type = get_queried_object()->post_type;
get_header( 'single' );
get_template_part( 'template-parts/single/single', $post_type );
get_footer( 'single' );
?>