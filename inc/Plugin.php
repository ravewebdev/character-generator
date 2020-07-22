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
	 * Path of plugin directory.
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	protected $path = '';

	/**
	 * URL of plugin directory.
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	protected $url = '';

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
	 * @param  string $file_path Plugin root path.
	 * @return Plugin Instance of this class.
	 */
	public static function get_instance( $file_path ) : Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self( $file_path );
		}

		return self::$instance;
	}

	/**
	 * Set up plugin.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 *
	 * @param  string $file_path Plugin root path.
	 */
	protected function __construct( $file_path ) {
		$this->path = plugin_dir_path( $file_path );
		$this->url  = plugin_dir_url( $file_path );

		$this->register_hooks();
	}

	/**
	 * Register plugin hooks.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 */
	protected function register_hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue plugin scripts.
	 *
	 * @author R A Van Epps <rave@ravanepps.com>
	 * @since  1.0.0
	 */
	public function enqueue_scripts() {
		$script = 'build/index.js';
		$style  = 'build/style.css';

		// Verify script exists.
		if ( ! file_exists( $this->path . $script ) ) {
			wp_die( esc_html__( 'Whoops! You need to run `npm run build` for the Character Generator plugin first.', 'character-generator' ) );
		}

		wp_register_script( 'character-generator-script', $this->url . $script, [], self::VERSION, true );

		if ( file_exists( $this->path . $style ) ) {
			wp_register_style( 'character-generator-style', $this->url . $style, [], self::VERSION );
		}

		if ( ! is_admin() ) {
			wp_enqueue_script( 'character-generator-script' );
			wp_enqueue_style( 'character-generator-style' );
		}
	}
}
