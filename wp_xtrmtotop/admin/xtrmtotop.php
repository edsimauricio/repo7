<?php
/**
 * @version		xtrmtotop.php, build date : 19 oct. 2015
 * @package		Xtrm-Addons
 * @subpackage	wp_xtrmtotop
 * @copyright	Copyright (C) 2015+ XtrmAddons.COM. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Xtrm-Addons! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

require_once 'xtrmtotopwidget.php';

/**
 * Class Xtrm Button to top for Wordpress.
 *
 * @link        http://www.xtrmaddons.com/ for the latest version
 * @author	   	XtrmAddons.COM <contact[at]xtrmaddons.com>
 * @copyright	XtrmAddons.COM <contact[at]xtrmaddons.com> - distributed under the GNU
 * @package		Xtrm-Addons
 * @subpackage	wp_xtrmtotop
 *
 * @access 		public
 * @since		1.0.151019 - 19 oct. 2015
 * @version 	1.0.151019 - 19 oct. 2015
 */
class XtrmToTop
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
		add_action('widgets_init', function(){
			register_widget('XtrmToTopWidget');
		});
		
		add_action('admin_init', array($this, 'register_settings'));
	}
	
	/**
	 * Method to register plugin parameters.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function register_settings()
	{
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_use_options');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_right');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_bottom');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_width');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_height');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_border');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_border_radius');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_background');
		register_setting('wp_xtrmtotop_settings', 'wp_xtrmtotop_background_image');
		
		
		add_settings_section('wp_xtrmtotop_section', __('Displays parameters', WD_XTT_DOMAIN), array($this, 'section_html'), 'wp_xtrmtotop_settings');
		add_settings_field('wp_xtrmtotop_use_options', esc_html__('Use options', WD_XTT_DOMAIN), array($this, 'use_options_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_right', esc_html__('Right Position', WD_XTT_DOMAIN), array($this, 'right_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_bottom', esc_html__('Bottom Position', WD_XTT_DOMAIN), array($this, 'bottom_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_width', esc_html__('Width', WD_XTT_DOMAIN), array($this, 'width_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_height', esc_html__('Height', WD_XTT_DOMAIN), array($this, 'height_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_border', esc_html__('Border', WD_XTT_DOMAIN), array($this, 'border_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_border_radius', esc_html__('Border Radius', WD_XTT_DOMAIN), array($this, 'border_radius_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_background', esc_html__('Background', WD_XTT_DOMAIN), array($this, 'background_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
		add_settings_field('wp_xtrmtotop_background_image', esc_html__('Background Image', WD_XTT_DOMAIN), array($this, 'background_image_html'), 'wp_xtrmtotop_settings', 'wp_xtrmtotop_section');
	}
	
	/**
	 * Method to display section html.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function section_html()
	{
		echo __('Inform button display settings.', WD_XTT_DOMAIN);
	}
	
	/**
	 * Method to display parameter html : right.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function right_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_right" value="<?php echo get_option('wp_xtrmtotop_right'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : bottom.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function bottom_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_bottom" value="<?php echo get_option('wp_xtrmtotop_bottom'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : width.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function width_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_width" value="<?php echo get_option('wp_xtrmtotop_width'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : height.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function height_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_height" value="<?php echo get_option('wp_xtrmtotop_height'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : border.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function border_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_border" value="<?php echo get_option('wp_xtrmtotop_border'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : border radius.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function border_radius_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_border_radius" value="<?php echo get_option('wp_xtrmtotop_border_radius'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : background.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function background_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_background" value="<?php echo get_option('wp_xtrmtotop_background'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : background image.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function background_image_html()
	{
		?>
	    <input type="text" name="wp_xtrmtotop_background_image" value="<?php echo get_option('wp_xtrmtotop_background_image'); ?>" />
	    <?php
	}
	
	/**
	 * Method to display parameter html : use options.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
	public function use_options_html()
	{
	    $use_options = get_option('wp_xtrmtotop_use_options', 1);
		?>
	    <select name="wp_xtrmtotop_use_options">
    		<option value="0"<?php echo ($use_options == 0 ? ' selected="selected"' : ''); ?>><?php echo __('No'); ?></option>
    		<option value="1"<?php echo ($use_options == 1 ? ' selected="selected"' : ''); ?>><?php echo __('Yes'); ?></option>
    	</select>
	    <?php
	}
	
	/**
	 * Method to install plugin.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
    public static function install()
    {
    	add_option('wp_xtrmtotop_use_options', 1);
    	add_option('wp_xtrmtotop_right', '25px');
    	add_option('wp_xtrmtotop_bottom', '25px');
    	add_option('wp_xtrmtotop_width', '80px');
    	add_option('wp_xtrmtotop_height', '80px');
    	add_option('wp_xtrmtotop_border', '1px solid #ccc');
    	add_option('wp_xtrmtotop_border_radius', '8px');
    	add_option('wp_xtrmtotop_background', '#666');
    	add_option('wp_xtrmtotop_background_image', 'mod_xtrmtotop/image/scroll-to-top.png');
    	
    	update_option('wp_xtrmtotop_use_options', 1);
    	update_option('wp_xtrmtotop_right', '25px');
    	update_option('wp_xtrmtotop_bottom', '25px');
    	update_option('wp_xtrmtotop_width', '80px');
    	update_option('wp_xtrmtotop_height', '80px');
    	update_option('wp_xtrmtotop_border', '1px solid #ccc');
    	update_option('wp_xtrmtotop_border_radius', '8px');
    	update_option('wp_xtrmtotop_background', '#666');
    	update_option('wp_xtrmtotop_background_image', 'wp-content/plugins/wp_xtrmtotop/image/scroll-to-top.png');
    }
	
	/**
	 * Method to uninstall plugin.
	 * 
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 *
	 * @return 	void
	 */
    public static function uninstall()
    {
    	delete_option('wp_xtrmtotop_use_options', 1);
    	delete_option('wp_xtrmtotop_right', '25px');
    	delete_option('wp_xtrmtotop_bottom', '25px');
    	delete_option('wp_xtrmtotop_width', '80px');
    	delete_option('wp_xtrmtotop_height', '80px');
    	delete_option('wp_xtrmtotop_border', '1px solid #ccc');
    	delete_option('wp_xtrmtotop_border_radius', '8px');
    	delete_option('wp_xtrmtotop_background', '#666');
    	delete_option('wp_xtrmtotop_background_image', 'wp-content/plugins/wp_xtrmtotop/image/scroll-to-top.png');
    }
}
?>