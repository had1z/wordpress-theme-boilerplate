<?php
$slug = get_queried_object()->post_name;
get_header( $slug );
get_template_part( 'template-parts/page/page', $slug );
get_footer( $slug );
?>