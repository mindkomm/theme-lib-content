<?php

/**
 * Customize Twig
 *
 * @param Twig_Environment $twig
 * @return $twig
 */
add_filter( 'timber/twig', function( Twig_Environment $twig ) {
	/**
	 * Turns each line of a text into an array.
	 *
	 * @since 1.0.0
	 * @see lines_to_array()
	 */
	$twig->addFilter( new Twig_Filter( 'lines_to_array', 'lines_to_array' ) );

	/**
	 * Truncates a text close a certain number of characters.
	 *
	 * @since 1.0.0
	 * @see truncate_close()
	 */
	$twig->addFilter( new Twig_Filter( 'truncate_close', 'truncate_close' ) );

	/**
	 * Gets string by gender.
	 *
	 * @since 1.0.0
	 * @see gender()
	 */
	$twig->addFunction( new Twig_Function( 'gender', 'gender' ) );

	return $twig;
} );
