<?php

/**
 * A content filter.
 *
 * Use this filter for multiline text content that is not the main page content.
 */
add_filter( 'content', 'wpautop' );
add_filter( 'content', 'wptexturize' );
add_filter( 'content', 'strip_control_characters' );
