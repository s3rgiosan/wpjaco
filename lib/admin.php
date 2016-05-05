<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       https://github.com/s3rgiosan/wpjaco/
 * @since      1.0.0
 *
 * @package    Jaco
 * @subpackage Jaco/lib
 */

namespace s3rgiosan\Jaco;

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Jaco
 * @subpackage Jaco/lib
 * @author     Sérgio Santos <me@s3rgiosan.com>
 */
class Admin {

	/**
	 * The plugin's instance.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    Plugin $plugin This plugin's instance.
	 */
	private $plugin;

	/**
	 * The unique identifier of this plugin settings group name.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $settingsname The string used to uniquely identify this plugin settings group name.
	 */
	protected $settingsname = 'jaco_settings';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param Plugin $plugin This plugin's instance.
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * The settings group name.
	 *
	 * @since  1.0.0
	 * @return string The settings group name.
	 */
	public function get_settings_name() {
		return $this->settingsname;
	}

	/**
	 * Add sub menu page to the Settings menu.
	 *
	 * @since 1.0.0
	 */
	public function admin_settings_menu() {

		\add_options_page(
			\__( 'Jaco', 'wpjaco' ),
			\__( 'Jaco', 'wpjaco' ),
			'manage_options',
			'jaco',
			array( $this, 'display_option_page' )
		);

	}

	/**
	 * Output the content of the settings page.
	 *
	 * @since 1.0.0
	 */
	public function display_option_page() {
	?>
		<div class="wrap">
			<h1><?php \_e( 'Jaco Settings', 'wpjaco' ); ?></h1>
			<form action='options.php' method='post'>
			<?php
				\settings_fields( $this->get_settings_name() );
				\do_settings_sections( $this->get_settings_name() );
				\submit_button();
			?>
			</form>
		</div>
	<?php
	}

	/**
	 * Register groups of settings and their fields.
	 *
	 * @since 1.0.0
	 */
	public function admin_settings_init() {
		$this->register_settings_sections();
		$this->register_settings_fields();
	}

	/**
	 * Register groups of settings.
	 *
	 * @since 1.0.0
	 */
	public function register_settings_sections() {

		\add_settings_section(
			'jaco_settings_section',
			'',
			null,
			$this->get_settings_name()
		);

	}

	/**
	 * Register settings fields.
	 *
	 * @since    1.0.0
	 */
	public function register_settings_fields() {
		$this->register_snippet_field();
	}

	/**
	 * Register the snippet field.
	 *
	 * @since 1.0.0
	 */
	public function register_snippet_field() {

		\register_setting(
			$this->get_settings_name(),
			'jaco_snippet',
			'esc_html'
		);

		\add_settings_field(
			'jaco_snippet',
			\__( 'Snippet', 'wpjaco' ),
			array( $this, 'display_snippet' ),
			$this->get_settings_name(),
			'jaco_settings_section',
			array(
				'label_for' => 'jaco_snippet',
			)
		);

	}

	/**
	 * Output the RUM ID field.
	 *
	 * @since 1.0.0
	 */
	public function display_snippet() {

		printf(
			'<textarea rows="10" cols="80" id="%1$s" name="%1$s">%2$s</textarea>',
			'jaco_snippet',
			\esc_html( \get_option( 'jaco_snippet' ) )
		);

	}
}
