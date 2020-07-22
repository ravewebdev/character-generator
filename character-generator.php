<?php
/**
 * Plugin Name: Character Generator
 * Description: A simple plugin to extend the RAVE Dice Roller into a TTRPG Character Generator.
 * Author:      R A Van Epps
 * Author URI:  https://ravanepps.com
 * Version:     1.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: character-generator
 * Domain Path: /languages
 *
 * @package Rave\CharacterGenerator
 * @since   1.0.0
 */

namespace Rave\CharacterGenerator;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Use composer autoload.
require 'vendor/autoload.php';

/**
 * Retrieve the Plugin object.
 *
 * @author R A Van Epps <rave@ravanepps.com>
 * @since  1.0.0
 *
 * @return Plugin Instance of Plugin class.
 */
function character_generator() {
	return Plugin::get_instance( __FILE__ );
}

// Init plugin class.
add_action( 'plugins_loaded', __NAMESPACE__ . '\character_generator' );
