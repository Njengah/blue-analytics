<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://madebybluejay.com
 * @since      1.0.0
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/admin
 * @author     Bluejay <plugins@madebybluejay.com>
 */
class Blue_Analytics_Admin {

	private $plugin_name;

	private $version;
	
	public $callbacks; 
	
	public $settings = array(); 
	
    public $sections = array(); 
	
    public $fields   = array(); 
	
	const _SETTINGS_ACCESS_LEVEL = 'manage_options';
	
	const _NAMESPACE = 'blue_analytics';

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
			//Intialization of callbacks class 
			
				$this->callbacks = new Blue_Analytics_Admin_Callbacks();
			
			//Calling method that adds [Settings API settings ]
			
			   $this->Settings_API_Settings(); 
			
			//Calling method that adds [Settings API sections ]
			
			   $this->Settings_API_Sections(); 
			   
			 //Calling method that adds [Settings API fields ]
			
			   $this->Settings_API_Fields(); 
			

	}
	
		

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blue-analytics-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blue-analytics-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	
	/**
 	* Adds the admin menu under the options.php 
 	*
 	* @since 		1.0.0 
 	* @author 		Bluejay
 	*/
	public function admin_menu_blue_analytics() {
		
		add_options_page ( __('Blue Analytics', 'blue-analytics'), __('Blue Analytics', 'blue-analytics'), self::_SETTINGS_ACCESS_LEVEL, self::_NAMESPACE, array($this->callbacks,'render_admin_page' ) );
		
	}
	

	/**
 	* Register Settings Fields 
 	*
 	* @since 		1.0.0 
 	* @author 		Bluejay
 	*/
	
	//Setters methods 
		
		public function add_the_settings(array $settings ){
			
			$this-> settings = $settings; 
			
			return $this; 
		}
		
		public function add_the_sections(array $sections){
			
			$this-> sections = $sections; 
			
			return $this; 
		}
	   
	   
		public function add_the_fields(array $fields ){
			
			$this-> fields = $fields; 
			
			return $this; 
		}
	
	/**
	 *  Populate Custom Sections & Fields Data 
	 */
	
	
	// Settings 
	
		public function Settings_API_Settings(){
			
				$args = array(
							array(
								'option_group' => 'blue_analytics_options_group',
								'option_name'  => 'blue_analytics_options_settings',
							),
							
				);
			
			$this->add_the_settings( $args ); 
		}
		
		
	// Sections
		public function Settings_API_Sections(){
				
				$args = array(
							array(
								'id' => 'ba_main_admin_section',
								'title' => 'Google Analytics Code',
								'callback' => array( $this->callbacks, 'render_main_admin_section' ),
								'page' => self::_NAMESPACE
							),
							
							array(
								'id' => 'ba_anonymous_section',
								'title' => 'Anonymous Option ',
								'callback' => array( $this->callbacks, 'render_anonymous_section_section' ),
								'page' => self::_NAMESPACE
							),
							
						); 
            $this->add_the_sections( $args );
			
		}
		
		
	//Fields 
		public function Settings_API_Fields(){
			
		      $args = array(
							array(
								'id' => 'ba_tracking_code',
								'title' => 'Add Tracking Code',
								'callback' => array( $this->callbacks, 'google_analytics_code_textarea' ),
								'page' => self::_NAMESPACE,
								'section' => 'ba_main_admin_section',
								'args' => array(
									'label_for' => 'ba_tracking_code',
									'class' => 'blue-analytics-textarea'
								)
							
							), 
							
							array(
								'id' => 'ba_anonymous_option',
								'title' => 'Activate Anonymous Option',
								'callback' => array( $this->callbacks, 'anonymous_option_switch' ),
								'page' => self::_NAMESPACE,
								'section' => 'ba_anonymous_section',
								'args' => array(
									'label_for' => 'ba_anonymous_option',
									'class' => 'blue-analytics-switch'
								)
							
							), 
							
							
						);

			
			$this->add_the_fields( $args );
		}
	
	
		public function register_custom_fields(){
	   
		   //register_setting -  register_setting($option_group, $option_name, array() ); 
		   
		   foreach($this->settings as $setting){
		   
					register_setting($setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : ' ') ); 
		   
		   }
		 
		   // add_settings_section - add_settings_section($id, $title, $callback $page); 
		  

			foreach($this->sections as $section){
		   
				add_settings_section($section['id'], $section['title'], (isset($section['callback']) ? $section['callback'] : ' '),   $section['page'] ); 
			} 
		   
		   
		   //add_settings_field - add_settings_field( $id, $title, $callback, $page, 'default', array(' ')); 
		   
			 foreach($this->fields as $field){

				add_settings_field( $field['id'], $field['title'], (isset($field['callback']) ? $field['callback'] : ' '), $field['page'], $field['section'], $field['args'] ); 
	   
			 }
		 
		 
   }
	
	

}
