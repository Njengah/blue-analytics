<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://madebybluejay.com
 * @since      1.0.0
 *
 * @package    Blue_Analytics
 * @subpackage Blue_Analytics/admin/partials
 */
?>


<div class="wrap"> 

	<div class = "blue-analytics-admin-wrap">

		<h3 class="blue-analytics-admin-title"><span>Blue Analytics Settings </span></h3> 
		
			<div class= "blue-analytics-form-wrap"> 
	
				<form action='options.php' method='post'>
				 
					   <?php
							settings_fields('blue_analytics_options_group'); // options registration id  
							
							 do_settings_sections('blue_analytics');// admin page slug 
							
							submit_button();
							
						?>
				</form>
		
    </div> 
	
</div>