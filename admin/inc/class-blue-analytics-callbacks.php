<?php

/**
 * The admin settings callback functions 
 *
 * @link       http://madebybluejay.com
 * @since      1.0.0
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/admin/inc
 */

 
 class Blue_Analytics_Admin_Callbacks{
	 
	 
  /**
 	* Displays the admin page under the general settings options 
 	*
 	* @since 		1.0.0 
 	* @author 		Bluejay
 	*/
		public function render_admin_page(){
			
			include BLUE_ANALYTICS_DIR  . '/admin/partials/admin-view.php';
			
		}
	 
	 
  /**
 	* Displays the main admin section for adding the Google Analytics code.  
 	*
 	* @since 		1.0.0 
 	* @author 		Bluejay
 	*/
		
		
		public function render_main_admin_section(){
			 
			 $section_intro = "Use this section to add the google analytics code that will be inserted in your site header"; 
			 
			 echo'<p class="admin-section">' . __($section_intro, 'text-domain') . '</p>' . '<hr>';
		}
		
		
		public function render_anonymous_section_section(){
			
			 $section_intro= " Enable or disable anonymous tracking option here"; 
			  
			 echo'<p class="admin-section">' . __($section_intro, 'text-domain') . '</p>' . '<hr>';
		}
	 
	 
  /**
	* Displays the Google Analytics Code Textarea   
	*
	* @since 		1.0.0 
	* @author 		Bluejay
	*/
	 
	   public function google_analytics_code_textarea($args){
		   
		$blue_analytics_settings = get_option('blue_analytics_options_settings');
		   
		    if($args['label_for'] === "ba_tracking_code") : ?>
		   	 
				<textarea name="blue_analytics_options_settings[ba_tracking_code]" class="ba_textarea" id="ba_textarea" rows="12" > <?php echo esc_attr(isset($blue_analytics_settings['ba_tracking_code']) ? $blue_analytics_settings['ba_tracking_code'] : '' ); ?></textarea>
				 <p class="description"><?php _e(' Add the Google analytics code for tracking your site ', 'blue-analytics'); ?></p>
			<?php endif; 
		     
	   }
	 
	 
	 public function anonymous_option_switch($args){
		 
		$options = get_option('blue_analytics_options_settings');
		
			if($args['label_for'] === "ba_anonymous_option") : ?> 
			
			<label class="blue-pub-switch">
				<input type='checkbox'  name='blue_analytics_options_settings[ba_anonymous_option]' <?php checked(!empty($options['ba_anonymous_option']), 1); ?> value='1'>
				<span class="slider round"></span>
			</label>
			
			 <p class="description"><?php _e('  Allow Google Analytics to anonymize the information sent by the tracker by removing IP address prior to its storage. ', 'blue-analytics'); ?></p>
			
			
			<?php endif; 
		 
	 }
	 
	 
	 
 }