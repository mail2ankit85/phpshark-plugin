<?php
namespace Src;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class SettingLink
{
	public function register()
	{
		$plugin = PLUGIN;
		add_filter( "plugin_action_links_{$plugin}", array( $this, 'settings_link' ) );
	}

	public function settings_link( $links )
	{
		$settings_link = '<a href="admin.php?page=fixopr-theme">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}
