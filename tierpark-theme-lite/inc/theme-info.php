<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package Admiral
 */

/**
 * Add Theme Info page to admin menu
 */
function admiral_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'admiral' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ),
		esc_html__( 'Theme Info', 'admiral' ),
		'edit_theme_options',
		'admiral',
		'admiral_theme_info_page'
	);

}
add_action( 'admin_menu', 'admiral_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function admiral_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'admiral' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'admiral' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/admiral/', 'admiral' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=admiral&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'admiral' ); ?></a>
				<a href="http://preview.themezee.com/?demo=admiral&utm_source=theme-info&utm_campaign=admiral" target="_blank"><?php esc_html_e( 'Theme Demo', 'admiral' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/admiral-documentation/', 'admiral' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=admiral&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'admiral' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/admiral/reviews/?filter=5', 'admiral' ) ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'admiral' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'admiral' ), $theme->get( 'Name' ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'admiral' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'admiral' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/admiral-documentation/', 'admiral' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=admiral&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'admiral' ), 'Admiral' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'admiral' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'admiral' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo wp_customize_url(); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'admiral' ); ?></a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" />

				</div>

			</div>

		</div>

		<hr>

		<div id="more-features">

			<h3><?php esc_html_e( 'Get more features', 'admiral' ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Pro Version Add-on', 'admiral' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on and get additional features and advanced customization options.', 'admiral' ), 'Admiral' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/admiral-pro/', 'admiral' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=admiral&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'admiral' ), 'Admiral' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Recommended Plugins', 'admiral' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'admiral' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ) ); ?>" class="button button-secondary">
								<?php esc_html_e( 'Install Plugins', 'admiral' ); ?>
							</a>
						</p>
					</div>

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'admiral' ),
				$theme->get( 'Name' ),
				'<a target="_blank" href="' . __( 'https://themezee.com/', 'admiral' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=admiral" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/admiral/reviews/?filter=5', 'admiral' ) . '" title="' . esc_attr__( 'Review Admiral', 'admiral' ) . '">' . esc_html__( 'rate it', 'admiral' ) . '</a>'); ?>
			</p>

		</div>

	</div>

	<?php
}

/**
 * Enqueues CSS for Theme Info page
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function admiral_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_admiral' !== $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'admiral-theme-info-css', get_template_directory_uri() . '/css/theme-info.css' );

}
add_action( 'admin_enqueue_scripts', 'admiral_theme_info_page_css' );
