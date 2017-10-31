<?php
/*
Plugin Name: VPM Menu Layout
Plugin URI: https://www.vanpattenmedia.com/
Description: Custom
Author: Van Patten Media Inc.
Version: 1.0.0
Author URI: https://www.vanpattenmedia.com/
*/

/**
 * Return the valid item types
 *
 * @return array
 */
function vpmml_get_item_types() {
	// Register item types
	$types = apply_filters( 'vpmml_item_types', array(
		'column' => __('Column'),
	) );

	return $types;
}

/**
 * Make sure we filter the values for our menu items
 *
 * @return object
 */
function vpmml_filter_menu_items( $menu ) {
	if ( $menu->object !== 'custom' ) {
		return $menu;
	}

	// Fetch the item types
	$types = vpmml_get_item_types();

	// Loop through
	foreach ( $types as $type => $name ) {

		// If we have a match...
		if ( $menu->url === '#vpmml-' . $type . '#' ) {

			// Rewrite some attributes
			$menu->object = 'vpmml-' . $type;
			$menu->title  = $name;

			break;
		}
	}

	return $menu;
}

add_filter( 'wp_setup_nav_menu_item', 'vpmml_filter_menu_items' );

// Item types
require_once('inc/item.php');
require_once('inc/item-column.php');

// Admin UI
require_once('inc/admin.php');
