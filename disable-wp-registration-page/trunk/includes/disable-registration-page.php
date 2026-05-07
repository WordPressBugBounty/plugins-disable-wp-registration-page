<?php

/**
 * Filters the registration URL on the login screen.
 *
 * Replaces the default registration link output so the standard registration
 * flow is not advertised on `wp-login.php`.
 * 
 * @since 1.0.0
 *
 * @see dwprp_remove_registration_link()
 */
add_filter( 'register', 'dwprp_remove_registration_link' );

/**
 * Callback for the {@see 'register'} filter.
 * 
 * @since 1.0.0
 *
 * @param string $registration_url The registration URL passed by WordPress.
 *
 * @return string Replacement value for the registration link (typically custom text).
 */
function dwprp_remove_registration_link( $registration_url ) {
	/**
	 * Filters the text (and URL) shown instead of the default registration link.
	 * 
	 * @since 1.0.3
	 *
	 * @param string $text Replacement text. Default is a localized 'manual registration is disabled' message.
	 *
	 * @return string Replacement text.
	 */
	return apply_filters(
		'dwprp_registration_link',
		'<span class="dwprp-registration-link">' . __( 'Manual registration is disabled', 'dwprp' ) . '</span>'
	);
}

/**
 * Redirects direct registration requests on the login page.
 *
 * When someone opens `wp-login.php?action=register`, they are sent elsewhere
 * instead of seeing the registration form.
 * 
 * @since 1.0.0
 *
 * @see dwprp_redirect_registration_page()
 */
add_action( 'init', 'dwprp_redirect_registration_page' );

/**
 * Callback for the {@see 'init'} action.
 * 
 * @since 1.0.0
 *
 * @return void
 */
function dwprp_redirect_registration_page() {
	if ( isset( $_GET['action'] ) && $_GET['action'] == 'register' ) {
		ob_start();

		wp_redirect(
			/**
			 * Filters the URL used when redirecting away from the registration action.
			 * 
			 * @since 1.0.3
			 *
			 * @param string $url Redirect destination. Default is the login URL from {@see wp_login_url()}.
			 *
			 * @return string Redirect destination.
			 */
			apply_filters(
				'dwprp_registration_redirect_url',
				wp_login_url()
			)
		);
		ob_clean();
	}
}
