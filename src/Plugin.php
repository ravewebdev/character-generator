<?php
/**
 * Character Generator Plugin.
 *
 * @package Rave\CharacterGenerator
 * @author  R A Van Epps <rave@ravanepps.com>
 * @since   1.0.0
 */

namespace Rave\CharacterGenerator;

/**
 * Class Plugin.
 *
 * @package Rave\CharacterGenerator
 * @author  R A Van Epps <rave@ravanepps.com>
 * @since   1.0.0
 */
final class Plugin {

	/**
	 * Current plugin version.
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	const VERSION = '1.0.0';

	/**
	 * Instance of plugin.
	 *
	 * @var   Plugin
	 * @since 1.0.0
	 */
	protected static $instance = null;

	/**
	 * Create or return instance of class.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 *
	 * @return Plugin Instance of this class.
	 */
	public static function get_instance() : Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Set up plugin.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 */
	protected function __construct() {
		$this->register_hooks();
	}

	/**
	 * Register plugin hooks.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 */
	protected function register_hooks() {}
}
