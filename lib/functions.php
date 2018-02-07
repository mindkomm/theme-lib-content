<?php

/**
 * Strips out forbidden Control Characters that came from copy-pasting text into WYSIWYG editor.
 *
 * You can’t see these Control Characters when you look at the text, yet they can still lead to
 * unexpected behavior.
 *
 * @api
 * @link http://www.regular-expressions.info/posixbrackets.html
 *
 * @param string $text The text to filter.
 * @return string The filtered text.
 */
function strip_control_characters( $text ) {
	return preg_replace( '/[[:cntrl:]]/i', '', $text );
}

/**
 * Turns each line of a text into an array.
 *
 * @api
 * @since 1.0.0
 * @example
 * ```twig
 * <ul>
 * {% for line in multiline_text|lines_to_array %}
 *     <li>{{ line }}</li>
 * {% endfor %}
 * </ul>
 * ```
 *
 * @param string $string Multiline string.
 * @return array
 */
function lines_to_array( $string ) {
	$array = preg_split( '/[\r\n]+/', $string );

	// Remove all empty entries
	return array_filter( $array );
}

/**
 * Truncates a text close a certain number of characters.
 *
 * This function doesn’t cut off words, but only adds the words that still fit into the maximum width.
 *
 * @api
 * @since 1.0.0
 * @example
 * ```twig
 * {{ post.content|truncate_close }}
 * ```
 *
 * @param  string $string        String to truncate.
 * @param  int    $desired_width Optional. The amount of characters you want to end up with.
 * @param  string $more          Optional. The text to append as 'more'. Default is a non-breaking space followed
 *                               by an ellipsis.
 *
 * @return string Truncated string.
 */
function truncate_close( $string, $desired_width = 200, $more = '&nbsp;&hellip;' ) {
	$parts       = preg_split( '/([\s\n\r]+)/u', $string, null, PREG_SPLIT_DELIM_CAPTURE );
	$parts_count = count( $parts );

	$length    = 0;
	$last_part = 0;

	for ( ; $last_part < $parts_count; ++ $last_part ) {
		$length += strlen( $parts[ $last_part ] );

		if ( $length > $desired_width ) {
			break;
		}
	}

	$return_string = implode( array_slice( $parts, 0, $last_part ) );

	// Add "more" string if it is not empty and string is longer than the desired width
	if ( $more && ! empty( $more ) && $length > $desired_width ) {
		$return_string .= $more;
	}

	return $return_string;
}

/**
 * Gets string by gender.
 *
 * Yes, for now, this supports only male and female genders.
 *
 * @api
 * @since 1.0.0
 * @example
 * ```php
 * echo gender( 'Schreiner', 'Schreinerin', $post->gender );
 * ```
 *
 * ```twig
 * {{ gender( 'Schreiner', 'Schreinerin', post.gender ) }}
 * ```
 *
 * @param string $male               Male representation of string.
 * @param string $female             Female representation of string.
 * @param string $gender             Gender identifier.
 * @param array  $female_identifiers Identifier keys for female representation. Default `[ 'f', 'female' ]`.
 *
 * @return string
 */
function gender( $male, $female, $gender, $female_identifiers = [] ) {
	if ( empty( $female_identifiers ) ) {
		$female_identifiers = [ 'f', 'female' ];
	}

	if ( in_array( $gender, $female_identifiers, true ) ) {
		return $female;
	}

	return $male;
}
