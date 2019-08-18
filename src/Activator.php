<?php
namespace Src;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Fired during plugin activation
 *
 * @link       www.contemplativeradicals.com
 * @since      1.0.0
 *
 * @package    Crs_Plugin
 * @subpackage Crs_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Crs_Plugin
 * @subpackage Crs_Plugin/includes
 * @author     Ankit Kumar <mail2ankit85@gmail.com>
 */
class Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Uncomment To Start Roles & Authorizations.
		// self::addRoles();
	}

	// private static function addRoles(){

	// 	global $wpdb;

	// 	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}roles (
	// 	  role_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	// 	  role_name VARCHAR(50) NOT NULL,

	// 	  PRIMARY KEY (role_id)
	// 	);";

	// 	$wpdb->query($sql);

	// 	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}permissions (
	// 	  perm_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	// 	  perm_desc VARCHAR(50) NOT NULL,

	// 	  PRIMARY KEY (perm_id)
	// 	);";

	// 	$wpdb->query($sql);

	// 	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}role_perm (
	// 	  role_id INTEGER UNSIGNED NOT NULL,
	// 	  perm_id INTEGER UNSIGNED NOT NULL,

	// 	  FOREIGN KEY (role_id) REFERENCES {$wpdb->prefix}roles(role_id),
	// 	  FOREIGN KEY (perm_id) REFERENCES {$wpdb->prefix}permissions(perm_id)
	// 	);";

	// 	$wpdb->query($sql);

	// 	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}user_role (
	// 	  user_id BIGINT(20) UNSIGNED NOT NULL,
	// 	  role_id INTEGER UNSIGNED NOT NULL,

	// 	  FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID),
	// 	  FOREIGN KEY (role_id) REFERENCES {$wpdb->prefix}roles(role_id)
	// 	);";

	// 	$wpdb->query($sql);
	// }
}
