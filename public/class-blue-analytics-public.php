<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://madebybluejay.com
 * @since      1.0.0
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/public
 * @author     Bluejay <plugins@madebybluejay.com>
 */
class Blue_Analytics_Public {

	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
				

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blue-analytics-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blue-analytics-public.js', array( 'jquery' ), $this->version, false );

	}
	
	
	/* 
	*  Add the google analytics code to the header
	*  @since    1.0.0
	*  @author 		Bluejay
	*/
	
	public function insert_blue_analytics_tracking_code(){
		
		$options = get_option('blue_analytics_options_settings');
		
		$tracking_code    = $options['ba_tracking_code']; 
		$anonymous_option = isset($options['ba_anonymous_option']);
		
			if(isset($tracking_code)){
				
				if($anonymous_option == 1){
				
					$IP_tracking_code = "_gaq.push(['_trackPageview'])";
					$anonymize_ip     = "_gaq.push(['_gat._anonymizeIp'])"; 
					
					$anonymous_code  = str_replace($IP_tracking_code , $anonymize_ip, $tracking_code);
			
					echo $anonymous_code  ;
				}else{
					
					echo $tracking_code;
				}
		  
			}else{
				
				echo " "; 
			}
		
	}
	
}
