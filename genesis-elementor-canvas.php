<?php # -*- coding: utf-8 -*-
/**
 * Main plugin file.
 * @package           Genesis Elementor Canvas
 * @author            David Decker
 * @copyright         Copyright (c) 2018, David Decker - DECKERWEB
 * @license           GPL-2.0+
 * @link              https://deckerweb.de/twitter
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Elementor Canvas
 * Plugin URI:        https://github.com/deckerweb/genesis-elementor-canvas
 * Description:       Optimizations for Elementor Canvas page template when used with Genesis.
 * Version:           2018.02.23
 * Author:            David Decker - DECKERWEB
 * Author URI:        https://deckerweb.de/
 * License:           GPL-2.0+
 * License URI:       http://www.opensource.org/licenses/gpl-license.php
 * Text Domain:       genesis-elementor-canvas
 * Domain Path:       /languages/
 * GitHub Plugin URI: https://github.com/deckerweb/genesis-elementor-canvas
 * GitHub Branch:     master
 *
 * Copyright (c) 2018 David Decker - DECKERWEB
 */

/**
 * Exit if called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}


add_action( 'init', 'ddw_gec_load_translations', 1 );
/**
 * Load the text domain for translation of the plugin.
 *
 * @since 2018.02.23
 *
 * @uses  load_plugin_textdomain() To additionally load default translations
 *                                 from plugin folder (default).
 */
function ddw_gec_load_translations() {

	/** Translations: Secondly, look in plugin's "languages" folder = default */
	load_plugin_textdomain(
		'genesis-elementor-canvas',
		FALSE,
		trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'languages'
	);

}  // end function


add_filter( 'body_class', 'ddw_gec_genesis_canvas_body_class' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function ddw_gec_genesis_canvas_body_class( $classes ) {

	if ( ! is_page_template( 'elementor_canvas' ) ) {
		return;
	}

	$classes[] = 'genesis-canvas';

	return $classes;

}  // end function


add_action( 'wp_head', 'ddw_gec_add_genesis_meta', -1 );
/**
 * Add Genesis Action 'genesis_meta' within document header.
 *
 * @since 2018.02.23
 */
function ddw_gec_add_genesis_meta() {

	if ( ! is_page_template( 'elementor_canvas' ) ) {
		return;
	}

	do_action( 'genesis_meta' );

	remove_action( 'genesis_meta', 'genesis_responsive_viewport' );

}  // end function


add_action( 'elementor/page_templates/canvas/before_content', 'ddw_gec_add_genesis_before', -1 );
/**
 * Add Genesis Action 'genesis_before' within document body.
 *
 * @since 2018.02.23
 */
function ddw_gec_add_genesis_before() {

	if ( ! is_page_template( 'elementor_canvas' ) ) {
		return;
	}

	do_action( 'genesis_before' );

}  // end function


add_action( 'elementor/page_templates/canvas/after_content', 'ddw_gec_add_genesis_after', -1 );
/**
 * Add Genesis Action 'genesis_after' within document body.
 *
 * @since 2018.02.23
 */
function ddw_gec_add_genesis_after() {

	if ( ! is_page_template( 'elementor_canvas' ) ) {
		return;
	}

	do_action( 'genesis_after' );

}  // end function