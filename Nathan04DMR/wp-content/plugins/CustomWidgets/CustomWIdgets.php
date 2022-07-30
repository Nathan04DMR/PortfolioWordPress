<?php
/**
 * Plugin Name: CoolCard
 * Description: Elementor custom widgets
 * Version:     1.0.0
 * Author:      Nathan Miranda
 * Author URI:  https://www.youtube.com/watch?v=dQw4w9WgXcQ
 * Text Domain: Custom-Widgets
 *
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function register_custom_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/card-widget.php' );  // include the widget file

    $widgets_manager->register( new \Card_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_custom_widgets' );