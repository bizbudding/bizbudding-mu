<?php

/**
 * Plugin Name:     BizBudding MU
 * Plugin URI:      https://bizbudding.com
 * Description:     Sitewide and required functionality for BizBudding hosted websites.
 * Version:         0.1.0
 *
 * Author:          BizBudding
 * Author URI:      https://bizbudding.com
 */

/**
 * Force email 2FA for users that haven't set up another method.
 *
 * @uses https://wordpress.org/plugins/two-factor/
 *
 * @param array $providers The enabled providers.
 * @param int   $user_id The user ID.
 *
 * @return array
 */
add_filter( 'two_factor_enabled_providers_for_user', function( $providers, $user_id ) {
	if ( empty( $providers ) && class_exists( 'Two_Factor_Email' ) && user_can( $user_id, 'edit_posts' ) ) {
		$providers[] = 'Two_Factor_Email';
	}

	return $providers;

}, 10, 2 );
