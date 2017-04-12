<?php
/*
Plugin Name: Postname Permalink Auto Redirect
Plugin URI: http://front.no
Description: This plugin will automatically 301 redirect your old 'postname' format permalinks so you don't lose your precious SEO.
Version: 1.0
Author: Frontkom
Author URI: http://front.no
*/

// Check for a possible redirect if we find a 404.
// This is the earliest we can check for the redirect.
add_action( 'template_redirect', 'postname_redirect' );
function postname_redirect() {

	// If this is not a 404 page, do nothing.
	if ( ! is_404() ) {
		return FALSE;
	}

	// If the current permalink structure is '/%postname%/'.
	// Don't do anything, even if we find a 404.
	global $wp_rewrite;
	if ( $wp_rewrite->permalink_structure === '/%postname%/' ) {
		return FALSE;
	}

	// Request slug.
	global $wp;
	$request_slug = sanitize_text_field( $wp->request );

	// WPML Support.
	// Strip language prefix from request slug, if present, like 'en/', 'es/', etc.
	if ( defined( ICL_LANGUAGE_CODE ) ) {
		$request_slug = str_replace( ICL_LANGUAGE_CODE . '/', '', $request_slug );
	}

	// At this point our request slug should contain only 'our-coolz-post-slugz'.
	// So... look for '/', skip if found since WordPress doesn't allow '/' in slugz.
	if ( strpos( $request_slug, '/' ) !== FALSE ) {
		return FALSE;
	}

	// Get posts based on slug.
	$posts = get_posts( array( 'name' => $request_slug, 'post_type' => 'post', 'post_status' => 'publish' ) );

	// Get the permalink from the first post we find.
	// If we're using WPML, get the translated post ID permalink.
	if ( ! empty( $posts[0] ) ) {
		// WPML Support.
		if ( function_exists( 'icl_object_id' ) ) {
			$permalink = get_permalink( icl_object_id( $posts[0]->ID ) );
		} else {
			$permalink = get_permalink( $posts[0]->ID );
		}
		// Redirects to post permalink.
		if ( ! empty( $permalink ) ) {
			wp_redirect( $permalink, 301 );
			exit; // We're done here.
		}
	}
}
