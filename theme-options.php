<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'brondbytrust_options', 'brondbytrust_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'brondbytrust' ), __( 'Theme Options', 'brondbytrust' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'brondbytrust' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'brondbytrust' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'brondbytrust' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'brondbytrust' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'brondbytrust' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'brondbytrust' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'brondbytrust' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'brondbytrust' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'brondbytrust' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'brondbytrust' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'brondbytrust' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'brondbytrust_options' ); ?>
			<?php $options = get_option( 'brondbytrust_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Venstre kolonne overskrift', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[frontpage-left-header]" class="regular-text" type="text" name="brondbytrust_theme_options[frontpage-left-header]" value="<?php esc_attr_e( $options['frontpage-left-header'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[frontpage-left-header]"><?php _e( 'Overskrift til venstre kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Forside venstre kolonne', 'brondbytrust' ); ?></th>
					<td>
						<textarea id="brondbytrust_theme_options[frontpage-left-text]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[frontpage-left-text]"><?php echo esc_textarea( $options['frontpage-left-text'] ); ?></textarea>
						<label class="description" for="brondbytrust_theme_options[frontpage-left-text]"><?php _e( 'Tekst til forsidens venstre kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Midterste kolonne overskrift', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[frontpage-middle-header]" class="regular-text" type="text" name="brondbytrust_theme_options[frontpage-middle-header]" value="<?php esc_attr_e( $options['frontpage-middle-header'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[frontpage-middle-header]"><?php _e( 'Overskrift til midterste kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>				
				<tr valign="top"><th scope="row"><?php _e( 'Forside midterste kolonne', 'brondbytrust' ); ?></th>
					<td>
						<textarea id="brondbytrust_theme_options[frontpage-middle-text]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[frontpage-middle-text]"><?php echo esc_textarea( $options['frontpage-middle-text'] ); ?></textarea>
						<label class="description" for="brondbytrust_theme_options[frontpage-middle-text]"><?php _e( 'Tekst til forsidens midterste kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Højre kolonne overskrift', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[frontpage-right-header]" class="regular-text" type="text" name="brondbytrust_theme_options[frontpage-right-header]" value="<?php esc_attr_e( $options['frontpage-right-header'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[frontpage-right-header]"><?php _e( 'Overskrift til højre kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>				
				<tr valign="top"><th scope="row"><?php _e( 'Forside højre kolonne', 'brondbytrust' ); ?></th>
					<td>
						<textarea id="brondbytrust_theme_options[frontpage-right-text]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[frontpage-right-text]"><?php echo esc_textarea( $options['frontpage-right-text'] ); ?></textarea>
						<label class="description" for="brondbytrust_theme_options[frontpage-right-text]"><?php _e( 'Tekst til forsidens højre kolonne', 'brondbytrust' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Status Fundraising', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[status-fundraising]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[status-fundraising]" value="<?php esc_attr_e( $options['status-fundraising'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[status-fundraising]"><?php _e( 'Status for fundraising prev|current|next', 'brondbytrust' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Status Medlemmer', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[status-medlemmer]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[status-medlemmer]" value="<?php esc_attr_e( $options['status-medlemmer'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[status-medlemmer]"><?php _e( 'Status for medlemmer prev|current|next', 'brondbytrust' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Senest opdateret', 'brondbytrust' ); ?></th>
					<td>
						<input id="brondbytrust_theme_options[status-updated]" class="large-text" cols="30" rows="10" name="brondbytrust_theme_options[status-updated]" value="<?php esc_attr_e( $options['status-updated'] ); ?>" />
						<label class="description" for="brondbytrust_theme_options[status-updated]"><?php _e( 'Senest opdateret', 'brondbytrust' ); ?></label>
					</td>
				</tr>				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'brondbytrust' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	/*
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;
	*/

	// Say our text option must be safe text with no HTML tags
	$input['frontpage-left-header'] = wp_filter_nohtml_kses( $input['frontpage-left-header'] );
	$input['frontpage-middle-header'] = wp_filter_nohtml_kses( $input['frontpage-middle-header'] );
	$input['frontpage-right-header'] = wp_filter_nohtml_kses( $input['frontpage-right-header'] );

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['frontpage-left-text'] = wp_filter_post_kses( $input['frontpage-left-text'] );
	$input['frontpage-middle-text'] = wp_filter_post_kses( $input['frontpage-middle-text'] );
	$input['frontpage-right-text'] = wp_filter_post_kses( $input['frontpage-right-text'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/