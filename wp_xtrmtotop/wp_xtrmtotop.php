<?php
/*
Plugin Name: Xtrm To Top plugin
Plugin URI: http://www.xtrmaddons.com
Description: Plugin permettant d'ajouter un bouton personnalisé sous WordPress.
Version: 1.0.160128
Author: XtrmAddons
Author URI: http://www.xtrmaddons.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define('WD_XTT_DIR', WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__)));
define('WD_XTT_URL', plugins_url(plugin_basename(dirname(__FILE__))));
define('WD_XTT_DOMAIN', 'wp_xtrmtotop');

include_once plugin_dir_path( __FILE__ ).'admin/xtrmtotop.php';

// Initialize plugin language and fallback to en_US if the .mo file can't be found
$domain         = WD_XTT_DOMAIN;
$languages_path = plugin_basename(dirname(__FILE__)).'/languages';

if (load_plugin_textdomain($domain, false, $languages_path) === false) {
	add_filter('plugin_locale', 'modify_plg_locale', 10, 2);
	load_plugin_textdomain($domain, false, $languages_path);
}

function modify_plg_locale($locale, $domain)
{
	// Revert the domain locale to en_US
	if (isset($domain) && $domain == WD_XTT_DOMAIN) {
		$locale = 'en_US';
	}

	return $locale;
}


/**
 * Plugin Xtrm Button to top for Wordpress.
 * 
 * @link        http://www.xtrmaddons.com/ for the latest version
 * @author	   	XtrmAddons.COM <contact[at]xtrmaddons.com>
 * @copyright	XtrmAddons.COM <contact[at]xtrmaddons.com> - distributed under the GNU
 * @package		Xtrm-Addons
 * @subpackage	wp_xtrmtotop
 *
 * @access 		public
 * @since		1.0.151017 - 17 oct. 2015
 * @version 	1.0.151019 - 19 oct. 2015
 */
class WP_XtrmToTopPlugin
{
	/**
	 * Method Class constructor.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function __construct()
	{
		register_activation_hook(__FILE__, array('XtrmToTop', 'install'));
		register_uninstall_hook(__FILE__, array('XtrmToTop', 'uninstall'));
		
		new XtrmToTop();
		
		if(is_admin()) {
			$this->initAdmin();
		}
	}

	/**
	 * Method to initialize administration.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	protected function initAdmin()
	{
		add_action('admin_menu', array($this, 'add_admin_menu'));
	}
	
	/**
	 * Method to add admin menu.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function add_admin_menu()
	{
		add_menu_page('Xtrm Button To Top', __('Xtrm To Top', WD_XTT_DOMAIN), 'manage_options', 'xtrmtotop', array($this, 'menu_page_html'));
	}

	/**
	 * Method to display html page of the menu.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function menu_page_html()
	{	
		?>
		<div id="xtrmtotop">
		    <h1><?php echo __(get_admin_page_title(), WD_XTT_DOMAIN); ?></h1>
		    <p><?php echo __('Welcome to the To Top Button configuration.', WD_XTT_DOMAIN); ?></p>
		    
		    <div class="postbox">
			    <div class="inside">
				    <form method="post" action="options.php">
				    <?php settings_fields('wp_xtrmtotop_settings') ?>
				    <?php do_settings_sections('wp_xtrmtotop_settings') ?>
				    <?php submit_button(); ?>
				    </form>
			    </div>
		    </div>
	    </div>
	    <?php
	}
}

new WP_XtrmToTopPlugin();
?>