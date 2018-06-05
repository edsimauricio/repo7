<?php
/**
 * @version		xtrmtotopwidget.php, build date : 19 oct. 2015
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

/**
 * Class Xtrm Button go to top Widget for Wordpress.
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
class XtrmToTopWidget extends WP_Widget
{
	/**
	 * JSon parameters to paste to Js.
	 * 
 	 * @since	1.0.151019 - 19 oct. 2015
 	 * @version 1.0.151019 - 19 oct. 2015
 	 * 
	 * @var array
	 */
	protected $options = array();
	
	
	
	/**
	 * Method Class constructor.
	 * Register widget with WordPress.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 * 
	 * @return 	void
	 */
	public function __construct()
	{
		parent::__construct(
			'wp_xtrmtotop',
			__('Button Go To Top', WD_XTT_DOMAIN),
			array('description' => __('Displays go to top button.', WD_XTT_DOMAIN))
		);
	}
    
	/**
	 * Method to displays frontend widget content.
	 *
	 * @access	public
	 * @since	1.0.151019 - 19 oct. 2015
	 * @version 1.0.151019 - 19 oct. 2015
	 * 
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * 
	 * @return 	void
	 */
    public function widget($args, $instance)
    {
    	wp_enqueue_script('jquery-totop', WD_XTT_URL.'/js/jquery.totop.min.js', array(), '1.0.0', true);
    	
    	$options['use_options'] 	= get_option('wp_xtrmtotop_use_options');
    	$options['right'] 			= get_option('wp_xtrmtotop_right');
    	$options['bottom'] 			= get_option('wp_xtrmtotop_bottom');
    	$options['width'] 			= get_option('wp_xtrmtotop_width');
    	$options['height'] 			= get_option('wp_xtrmtotop_height');
    	$options['border'] 			= get_option('wp_xtrmtotop_border');
    	$options['borderRadius'] 	= get_option('wp_xtrmtotop_border_radius');
    	$options['background'] 		= get_option('wp_xtrmtotop_background');
    	$options['backgroundImage'] = get_site_url().'/'.get_option('wp_xtrmtotop_background_image');
    	
    	$this->options = $options;
    	
    	add_action('wp_footer', array($this, 'setScriptHeader'), 10, 1);
    }


    /**
     * Method to add Js script to html header.
     *
     * @access	public
     * @since	1.0.151019 - 19 oct. 2015
     * @version 1.0.151019 - 19 oct. 2015
	 * 
	 * @return 	void
     */
    public function setScriptHeader()
    {
    	echo '<script type="text/javascript">'.PHP_EOL
    	. 'jQuery(document).ready(function () {'.PHP_EOL
    	. 'var xst = new XtrmScrollTop('.json_encode($this->options).');'.PHP_EOL
    	. '});'.PHP_EOL
    	. '</script>';
    }
}
?>