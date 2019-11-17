<?php
/**
 * Admin theme page
 *
 * @package Fluida
 */

// Theme particulars
require_once( get_template_directory() . "/admin/defaults.php" );
require_once( get_template_directory() . "/admin/options.php" );
require_once( get_template_directory() . "/includes/tgmpa.php" );

// Custom CSS Styles for customizer
require_once( get_template_directory() . "/includes/custom-styles.php" );

// load up theme options
$cryout_theme_settings = apply_filters( 'fluida_theme_structure_array', $fluida_big );
$cryout_theme_options = fluida_get_theme_options();
$cryout_theme_defaults = fluida_get_option_defaults();

// Get the theme options and make sure defaults are used if no values are set
//if ( ! function_exists( 'fluida_get_theme_options' ) ):
function fluida_get_theme_options() {
	$optionsFluida = wp_parse_args(
		get_option( 'fluida_settings', array() ),
		fluida_get_option_defaults()
	);
	$optionsFluida = cryout_maybe_migrate_options( $optionsFluida );
	return apply_filters( 'fluida_theme_options_array', $optionsFluida );
} // fluida_get_theme_options()
//endif;

//if ( ! function_exists( 'fluida_get_theme_structure' ) ):
function fluida_get_theme_structure() {
	global $fluida_big;
	return apply_filters( 'fluida_theme_structure_array', $fluida_big );
} // fluida_get_theme_structure()
//endif;

// backwards compatibility filter for some values that changed format
// this needs to be applied to the options array using WordPress' 'option_{$option}' filter
function fluida_options_back_compat( $options ){
	if (!empty($options[_CRYOUT_THEME_PREFIX . '_lineheight'])) 		$options[_CRYOUT_THEME_PREFIX . '_lineheight']			= floatval( $options[_CRYOUT_THEME_PREFIX . '_lineheight'] );
	if (!empty($options[_CRYOUT_THEME_PREFIX . '_paragraphspace'])) 	$options[_CRYOUT_THEME_PREFIX . '_paragraphspace'] 		= floatval( $options[_CRYOUT_THEME_PREFIX . '_paragraphspace'] );
	if (!empty($options[_CRYOUT_THEME_PREFIX . '_parindent'])) 			$options[_CRYOUT_THEME_PREFIX . '_parindent'] 			= floatval( $options[_CRYOUT_THEME_PREFIX . '_parindent'] );
	if (!empty($options[_CRYOUT_THEME_PREFIX . '_responsivelimit']))	$options[_CRYOUT_THEME_PREFIX . '_responsivelimit'] 	= intval( $options[_CRYOUT_THEME_PREFIX . '_responsivelimit'] );
	return $options;
} //
add_filter( 'option_fluida_settings', 'fluida_options_back_compat' );

// Hooks/Filters
add_action( 'admin_menu', 'fluida_add_page_fn' );

// Add admin scripts
function fluida_admin_scripts( $hook ) {
	global $fluida_page;
	if( $fluida_page != $hook ) {
        	return;
	}

	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'fluida-admin-style', get_template_directory_uri() . '/admin/css/admin.css', NULL, _CRYOUT_THEME_VERSION );
	wp_enqueue_script( 'fluida-admin-js',get_template_directory_uri() . '/admin/js/admin.js', array('jquery-ui-dialog'), _CRYOUT_THEME_VERSION );
	$js_admin_options = array(
		'reset_confirmation' => esc_html( __( 'Reset Fluida Settings to Defaults?', 'fluida' ) ),
	);
	wp_localize_script( 'fluida-admin-js', 'cryout_admin_settings', $js_admin_options );
}

// Create admin subpages
function fluida_add_page_fn() {
	global $fluida_page;
	$fluida_page = add_theme_page( __( 'Fluida Theme', 'fluida' ), __( 'Fluida Theme', 'fluida' ), 'edit_theme_options', 'about-fluida-theme', 'fluida_page_fn' );
	add_action( 'admin_enqueue_scripts', 'fluida_admin_scripts' );
} // fluida_add_page_fn()

// Display the admin options page

function fluida_page_fn() {

	$options = cryout_get_option();

	if (!current_user_can('edit_theme_options'))  {
		wp_die( __( 'Sorry, but you do not have sufficient permissions to access this page.', 'fluida') );
	}

?>

<div class="wrap" id="main-page"><!-- Admin wrap page -->
	<div id="lefty">
	<?php if( isset($_GET['settings-loaded']) ) { ?>
		<div class="updated fade">
			<p><?php _e('Fluida settings loaded successfully.', 'fluida') ?></p>
		</div> <?php
	} ?>
	<?php
	// Reset settings to defaults if the reset button has been pressed
	if ( isset( $_POST['cryout_reset_defaults'] ) ) {
		delete_option( 'fluida_settings' ); ?>
		<div class="updated fade">
			<p><?php _e('Fluida settings have been reset successfully.', 'fluida') ?></p>
		</div> <?php
	} ?>

		<div id="admin_header">
			<img src="<?php echo get_template_directory_uri() . '/admin/images/logo-about-top.png' ?>" />
			<span class="version">
				<?php echo apply_filters( 'cryout_admin_version', sprintf( __( 'Fluida Theme v%1$s by %2$s', 'fluida' ),
					_CRYOUT_THEME_VERSION,
					'<a href="https://www.cryoutcreations.eu" target="_blank">Cryout Creations</a>'
				) ); ?><br>
				<?php do_action( 'cryout_admin_version' ); ?>
			</span>
		</div>

		<div id="admin_links">
			<a href="https://www.cryoutcreations.eu/wordpress-themes/fluida" target="_blank"><?php _e( 'Fluida Homepage', 'fluida' ) ?></a>
			<a href="https://www.cryoutcreations.eu/forums/f/wordpress/fluida" target="_blank"><?php _e( 'Theme Support', 'fluida' ) ?></a>
			<a class="blue-button" href="https://www.cryoutcreations.eu/wordpress-themes/fluida#cryout-comparison-section" target="_blank"><?php _e( 'Upgrade to PLUS', 'fluida' ) ?></a>
		</div>


		<div id="description">
			<?php
				$theme = wp_get_theme();
				echo apply_filters( 'cryout_theme_description', esc_html( $theme->get( 'Description' ) ) );
			?>
		</div>

		<a class="button" href="customize.php" id="customizer"> <?php _e( 'Customize', 'fluida' ); ?> </a>

	</div><!--lefty -->


	<div id="righty">
		<div id="cryout-donate" class="postbox donate">

			<h3 class="hndle"><?php _e( 'Upgrade to Plus', 'fluida' ); ?></h3>
			<div class="inside">
				<p><?php printf( __('Find out what features you\'re missing out on and how the Plus version of %1$s can improve your site.', 'fluida'), cryout_sanitize_tnl(_CRYOUT_THEME_NAME) ); ?></p>
				<img src="<?php echo get_template_directory_uri() . '/admin/images/features.png' ?>" />
				<a class="button" href="https://www.cryoutcreations.eu/wordpress-themes/fluida" target="_blank" style="display: block;"><?php _e( 'Upgrade to Plus', 'fluida' ); ?></a>

			</div><!-- inside -->

		</div><!-- donate -->

		<div id="cryout-manage" class="postbox manage" >

			<h3 class="hndle"><?php _e( 'Settings Management', 'fluida' ); ?></h3>
			<div class="panel-wrap inside">

				<input id="cryout-themesettings" name="cryout-themesettings" type="hidden" value="<?php echo htmlentities(cryout_savesettings($options)) ?>">
				<button class="button" id="cryout-savesettings-button"> <?php _e('Save Theme Settings', 'fluida'); ?> </button>

				<button class="button" id="cryout-loadsettings-button"> <?php _e('Load Theme Settings', 'fluida'); ?> </button>

				<form action="" method="post">
					<input type="hidden" name="cryout_reset_defaults" value="true" />
					<input type="submit" class="button" id="cryout_reset_defaults" value="<?php _e( 'Reset to Defaults', 'fluida' ); ?>" />
				</form>

				<div id="cryout-settings-dialog" title="Settings Management">
				  <p>
					<strong><?php _e('Copy-paste all the information below to a file of your choosing and save it to a safe location.','fluida') ?></strong>
					<strong><?php _e('Paste your previously saved settings in the field below and press the Load button.<br><u>All your current settings will be overwritten!</u>','fluida') ?></strong><br>
					<br>
					<textarea id="cryout-themesettings-textarea"></textarea>
					<input name="cryout-settings-nonce" id="cryout-settings-nonce" type="hidden" value="<?php echo wp_create_nonce( "cryout-special-string" ); ?>">
				  </p>
				</div>


			</div><!-- inside -->

		</div><!-- manage -->

	</div><!--  righty -->
</div><!--  wrap -->

<?php
} // fluida_page_fn()

// Settings management function
function cryout_savesettings($options = array()) {
	if (!function_exists('json_encode')) return __('Your server does not support the needed functionality to manage theme settings.','fluida');
		else return str_replace('\'','&#039;',json_encode($options));
} // cryout_saveoptions()

// Load theme settings
function cryout_loadsettings() {
	check_admin_referer( 'cryout-special-string', 'cryout_settings_nonce' );
	if (! current_user_can('edit_theme_options') ) {
		die( __('Sorry, but you do not have sufficient permissions to access this page.','fluida') );
	}
	if (!function_exists('json_encode')) die(__('Your server does not support the needed functionality to manage theme settings.','fluida'));
	if (!empty($_POST['cryout_settings'])) {
		$data = str_replace('&#039;','\'',rawurldecode( trim($_POST['cryout_settings'])) );
		$data = json_decode($data, TRUE);
		if (is_array($data) && isset($data[cryout_sanitize_tn(_CRYOUT_THEME_NAME).'_db']) && (0.9 <= (float)$data[cryout_sanitize_tn(_CRYOUT_THEME_NAME).'_db']) ) {
			delete_option( cryout_sanitize_tn(_CRYOUT_THEME_NAME).'_settings' );
			if (update_option( cryout_sanitize_tn(_CRYOUT_THEME_NAME).'_settings', $data)) {
				die('OK');
			} else {
				die(__('Unable to load theme options. Try again or check that the saved options are valid.','fluida'));
			}
		} else {
			die(__('The supplied theme settings text appears invalid. Make sure you pasted it entirely and without errors.','fluida'));
		}
	} else die(__('You did not enter any theme settings. Remember to paste saved theme settings.','fluida'));
} // cryout_loadsettings();
add_action('wp_ajax_cryout_loadsettings_action', 'cryout_loadsettings');

// FIN
