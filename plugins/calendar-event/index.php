<?php
    /*
      Plugin Name: Calendar Event
      Plugin URI: https://total-soft.com/wp-event-calendar/
      Description: Event Calendar plugin created for showing your events. Total-Soft Calendar is the best if you want to be original on your website.
      Author: Calendar by TS Team
      Version: 1.6.0
      Author URI: https://total-soft.com/
      License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
    */
	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Calendar-Widget.php');
	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Calendar-Ajax.php');
	add_action('wp_enqueue_scripts', 'tsc_widget');
	function tsc_widget(){
		wp_register_style('Total_Soft_Cal', plugins_url('/CSS/Total-Soft-Calendar-Widget.css',__FILE__ ));
		wp_enqueue_style('Total_Soft_Cal');
		wp_register_script('Total_Soft_Cal',plugins_url('/JS/Total-Soft-Calendar-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_enqueue_script('Total_Soft_Cal');
		wp_enqueue_script("jquery");
		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
		wp_enqueue_style('fontawesome-css');
	}
	add_action('widgets_init', 'tsc_widget_register');
	function tsc_widget_register(){
		register_widget('Total_Soft_Cal');
	}
	add_action("admin_menu", 'tsc_admin_menu');
	function tsc_admin_menu(){
		add_menu_page('Admin Menu',__( 'Calendar', 'Total-Soft-Calendar' ), 'manage_options','Total_Soft_Cal', 'tsc_add',plugins_url('/Images/admin.png',__FILE__));
		add_submenu_page('Total_Soft_Cal', 'Admin Menu', __( 'Calendar Manager', 'Total-Soft-Calendar' ), 'manage_options', 'Total_Soft_Cal', 'tsc_add');
		add_submenu_page('Total_Soft_Cal', 'Admin Menu', __( 'Event Manager', 'Total-Soft-Calendar' ), 'manage_options', 'Total_Soft_Events', 'tsc_event');
		add_submenu_page('Total_Soft_Cal', 'Admin Menu', __( 'Total Products', 'Total-Soft-Calendar' ), 'manage_options', 'Total_Soft_Products', 'tsc_protucts');
	}
	function tsc_add() {
		wp_register_script('Total_Soft_Cal', plugins_url('/JS/Total-Soft-Calendar-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Cal','ts_calendar_object', array('ajaxurl'=>admin_url('admin-ajax.php'),'tsc_nonce' => wp_create_nonce( 'tsc_admin_nonce_field' )));
		wp_enqueue_script('Total_Soft_Cal');
		wp_enqueue_script("jquery");
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
		wp_enqueue_style('fontawesome-css');
		wp_enqueue_script('alpha-color-picker',plugins_url('/JS/alpha-color-picker.js', __FILE__),array( 'jquery', 'wp-color-picker' ),null,true);
		wp_enqueue_style('alpha-color-picker',plugins_url('/CSS/alpha-color-picker.css', __FILE__),array( 'wp-color-picker' ));
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Calendar-New.php');
	}
	function tsc_event() {
		wp_enqueue_media();
		wp_register_script('Total_Soft_Cal', plugins_url('/JS/Total-Soft-Calendar-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Cal','ts_calendar_object', array('ajaxurl'=>admin_url('admin-ajax.php'),'tsc_nonce' => wp_create_nonce( 'tsc_admin_nonce_field' )));
		wp_enqueue_script('Total_Soft_Cal');
		wp_enqueue_script("jquery");
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
		wp_enqueue_style('fontawesome-css');
		wp_enqueue_script('alpha-color-picker',plugins_url('/JS/alpha-color-picker.js', __FILE__),array( 'jquery', 'wp-color-picker' ),null,true);
		wp_enqueue_style('alpha-color-picker',plugins_url('/CSS/alpha-color-picker.css', __FILE__),array( 'wp-color-picker' ));
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Calendar-Events.php');
	}
	function tsc_activation_hook() {
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Calendar-Install.php');
	}
	function tsc_protucts() {
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Products.php');
	}
	register_activation_hook(__FILE__,'tsc_activation_hook');
	function tsc_register_shortcode($atts, $content = null) {
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return tsc_shortcode_content($atts['id']);
	}
	add_shortcode('Total_Soft_Cal', 'tsc_register_shortcode');
	function tsc_shortcode_content($tsc_new_instance) {
		ob_start();
			$tsc_args = shortcode_atts(
				array(
					'name' => 'Widget Area',
					'id' => '',
					'description' => '',
					'class' => '',
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '',
					'AFTER_TITLE' => '',
					'widget_id' => '',
					'widget_name' => 'Total Soft Calendar'
				),
				$tsc_new_instance,
				'Total_Soft_Cal' 
			);
			$tsc_class=new Total_Soft_Cal;
			$tsc_instance=array('Total_Soft_Cal'=>$tsc_new_instance);
			$tsc_class->widget($tsc_args,$tsc_instance);
			$tsc_get_contents[]= ob_get_contents();
		ob_end_clean();
		return $tsc_get_contents[0];
	}
	add_action('init', 'tsc_text_domain');
	function tsc_text_domain() {
		$path = dirname(plugin_basename(__FILE__)) . '/languages/';
		$loaded = load_plugin_textdomain('Total-Soft-Calendar', false, $path);
	}
	add_action('admin_init', 'tsc_admin_style');
	function tsc_admin_style(){
		wp_register_style('Total_Soft_Cal', plugins_url('/CSS/Total-Soft-Calendar-Admin.css',__FILE__));
		wp_enqueue_style('Total_Soft_Cal' );
	}
	function tsc_plugin_links($tsc_links) {
		$tsc_forum_link = sprintf(
			'
				<a target="_blank" href="%1$s"> %2$s </a>
			',
			esc_url("https://wordpress.org/support/plugin/calendar-event/"),
			__("Support")
		);
		$tsc_premium_link = sprintf(
			'
				<a target="_blank" href="%1$s"> %2$s </a>
			',
			esc_url("https://total-soft.com/wp-event-calendar/"),
			__("Pro Version")
		);
		array_push($tsc_links, $tsc_forum_link);
		array_push($tsc_links, $tsc_premium_link);
		return $tsc_links; 
	}
	$tsc_plugin = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$tsc_plugin", 'tsc_plugin_links' );
?>