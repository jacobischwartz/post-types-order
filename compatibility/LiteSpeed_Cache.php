<?php


class PTO_LiteSpeed_Cache {

	/**
	 * PTO_LiteSpeed_Cache constructor.
	 * Description: phpcs error -> function visibility was not defined.
	 */
	public function __construct() {
		/**
		 * phpcs error: return statement is missing.
		 * since action could only be added if is_plugin_active is true
		 * we do not need to check an ! is_plugin_active() and return false from there
		 * instead we can simply add_action if and only if is_plugin_active check returns true.
		 * this prevents returning the boolean value from the function.
		 */

		if ( is_plugin_active( 'litespeed-cache/litespeed-cache.php' ) ) {
			add_action( 'PTO/order_update_complete', array( $this, 'order_update_complete' ) );
		}
	}

	/**
	 * phpcs error -> function visibility was not defined.
	 * Added public
	 */
	public function order_update_complete() {
		if ( method_exists( 'LiteSpeed_Cache_API', 'purge_all' ) ) {
			LiteSpeed_Cache_API::purge_all();
		}
	}
}

new PTO_LiteSpeed_Cache();
