<?php

/**
 * Filters content set in post contents.
 */
add_filter( 'the_content', 'strip_control_characters' );

/**
 * A content filter.
 *
 * Use this filter for multiline text content that is not the main page content.
 */
add_filter( 'content', 'strip_control_characters' );
add_filter( 'content', 'wpautop' );
add_filter( 'content', 'wptexturize' );
