<?php
/**
 * Customizer: Add Control: Custom: Radio Image
 *
 * This file demonstrates how to add a custom radio-image control to the Customizer.
 * 
 * @package code-examples
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */
 

/**
 * Theme Options Customizer Implementation
 *
 * Implement the Theme Customizer for Theme Settings.
 *
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 *
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 */
function para_blog_register_customizer_control_custom_radio_image( $wp_customize ){

	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	/**
	 * Create a Radio-Image control
	 * 
	 * This class incorporates code from the Kirki Customizer Framework and from a tutorial
	 * written by Otto Wood.
	 * 
	 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
	 * is licensed under the terms of the GNU GPL, Version 2 (or later).
	 * 
	 * @link https://github.com/reduxframework/kirki/
	 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
	 */
	class para_blog_Custom_Radio_Image_Control extends WP_Customize_Control {
		
		/**
		 * Declare the control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'radio-image';
		
		/**
		 * Enqueue scripts and styles for the custom control.
		 * 
		 * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
		 * 
		 * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
		 * at 'customize_controls_print_styles'.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}
		
		/**
		 * Render the control to be displayed in the Customizer.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo $this->id; ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo $this->id . $value; ?>">
							<img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
			<?php
		}
	}
	
	
	/**
	 * Radio Image control.
	 *
	 * - Control: Radio Image
	 * - Setting: Blog Layout
	 * - Sanitization: select
	 * 
	 * Register "Theme_Slug_Custom_Radio_Image_Control" to be  used to configure
	 * the Blog Posts Index Layout setting.
	 * 
	 * @uses $wp_customize->add_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link $wp_customize->add_control() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 */
}
// Settings API options initilization and validation
add_action( 'customize_register', 'para_blog_register_customizer_control_custom_radio_image' );

/**
 * Add CSS for custom controls
 *
 * This function incorporates CSS from the Kirki Customizer Framework
 *
 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
 * is licensed under the terms of the GNU GPL, Version 2 (or later)
 *
 * @link https://github.com/reduxframework/kirki/
 */
function para_blog_customizer_custom_control_css() { 
	?>
	<style>
	.customize-control-radio-image .image.ui-buttonset input[type=radio] {
		height: auto; 
	}
	.customize-control-radio-image .image.ui-buttonset label {
		display: inline-block;
		margin-right: 5px;
		margin-bottom: 5px; 
	}
	.customize-control-radio-image .image.ui-buttonset label.ui-state-active {
		background: none;
	}
	.customize-control-radio-image .customize-control-radio-buttonset label {
		padding: 5px 10px;
		background: #f7f7f7;
		border-left: 1px solid #dedede;
		line-height: 35px; 
	}
	.customize-control-radio-image label img {
		border: 1px solid #bbb;
		opacity: 0.5;
	}
	#customize-controls .customize-control-radio-image label img {
		max-width: 50px;
		height: auto;
	}
	.customize-control-radio-image label.ui-state-active img {
		background: #dedede; 
		border-color: #000; 
		opacity: 1;
	}
	.customize-control-radio-image label.ui-state-hover img {
		opacity: 0.9;
		border-color: #999; 
	}
	.customize-control-radio-buttonset label.ui-corner-left {
		border-radius: 3px 0 0 3px;
		border-left: 0; 
	}
	.customize-control-radio-buttonset label.ui-corner-right {
		border-radius: 0 3px 3px 0; 
	}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'para_blog_customizer_custom_control_css' );
