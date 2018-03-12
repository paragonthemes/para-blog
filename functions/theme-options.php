<?php
add_action( 'customize_register', 'para_blog_customizer_register' );

function para_blog_customizer_register( $wp_customize ) {
	/*
	***************
	* Theme Options Panel
	***************
	*/
	$wp_customize->add_panel( 'para_blog_panel', array(
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Theme Options', 'para-blog' ),
		) );
	
	/*
	***************
	* Logo Section
	***************
	*/
	$wp_customize->add_section( 'para_blog_header', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Header', 'para-blog' ),
		'description' => '',
		'panel' => 'para_blog_panel',
		) );
	//  =============================
    //  = Social Icons                  =
    //  =============================
	$wp_customize->add_setting(
		// $id
		'para_blog_social_icons',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
			)
		);
	$wp_customize->add_control(
		// $id
		'para_blog_social_icons',
		// $args
		array(
			'settings'		=> 'para_blog_social_icons',
			'section'		=> 'para_blog_header',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Enable Social Icons', 'para-blog' ),
			)
		);
	//  =============================
    //  = Search Icons                  =
    //  =============================
	$wp_customize->add_setting(
		// $id
		'para_blog_search_icon',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
			)
		);
	$wp_customize->add_control(
		// $id
		'para_blog_search_icon',
		// $args
		array(
			'settings'		=> 'para_blog_search_icon',
			'section'		=> 'para_blog_header',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Enable Search Icon', 'para-blog' ),
			)
		);

	/*
	***************
	* Layout Section
	***************
	*/
	$wp_customize->add_section( 'para_blog_layout_section', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Layout &amp; Design Options', 'para-blog' ),
		'description' => '',
		'panel' => 'para_blog_panel',
		) );


		$wp_customize->add_setting( 'para_blog_layout', array(
		    'capability'		=> 'edit_theme_options',
		    'default'			=> 'fullwidth-layout',
		    'sanitize_callback' => 'para_blog_sanitize_select'
		) );
		$wp_customize->add_control( 'para_blog_layout', array(
		    'choices'		=> array(
							'fullwidth-layout' 		=> esc_html__('Full Width Layout','para-blog'),
							'boxed-layout'      	=> esc_html__('Boxed Layout','para-blog'),
			),
		    'label'		    => esc_html__( 'Select Site Layout', 'para-blog' ),
		    'description'   => esc_html__( 'Only box Shadow will add on Boxed Layout', 'para-blog' ),
		    'section'       => 'para_blog_layout_section',
		    'settings'      => 'para_blog_layout',
		    'type'	  	    => 'select'
		) );

	/*
	***************
	* Sidebar Section
	***************
	*/

		$wp_customize->add_setting( 'para_blog_sidebar-options', array(
		    'capability'		=> 'edit_theme_options',
		    'default'			=> 'right-sidebar',
		    'sanitize_callback' => 'para_blog_sanitize_select'
		) );
		$wp_customize->add_control( 'para_blog_sidebar-options', array(
		    'choices'		=> array(
							'right-sidebar' 		=> esc_html__('Right Sidebar','para-blog'),
							'left-sidebar'      	=> esc_html__('Left Sidebar','para-blog'),
							'no-sidebar'      	=> esc_html__('No Sidebar','para-blog'),
			),
		    'label'		    => esc_html__( 'Select Sitebar Options', 'para-blog' ),
		    'description'   => esc_html__( 'Select Sidebar options', 'para-blog' ),
		    'section'       => 'para_blog_layout_section',
		    'settings'      => 'para_blog_sidebar-options',
		    'type'	  	    => 'select'
		) );


	/*
	***************
	* Color Section
	***************
	*/

		$wp_customize->add_setting( 'para_blog_color_scheme', array(
		    'capability'		=> 'edit_theme_options',
		    'default'			=> 'default',
		    'sanitize_callback' => 'para_blog_sanitize_select'
		) );
		$wp_customize->add_control( 'para_blog_color_scheme', array(
		    'choices'		=> array(
							'default' 		=> esc_html__('Brown','para-blog'),
							'ff9602' 		=> esc_html__('Orange','para-blog'),
							'ed5152' 		=> esc_html__('Red','para-blog'),
							'83b542' 		=> esc_html__('Green','para-blog'),
							'218dcb' 		=> esc_html__('Blue','para-blog'),							
			),
		    'label'		    => esc_html__( 'Select Color Options', 'para-blog' ),
		    'description'   => esc_html__( 'Select Color for different Section', 'para-blog' ),
		    'section'       => 'para_blog_layout_section',
		    'settings'      => 'para_blog_color_scheme',
		    'type'	  	    => 'select'
		) );

	/*
	***************
	* Search Section
	***************
	*/
	$wp_customize->add_section( 'para_blog_search', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Search Placeholder', 'para-blog' ),
		'description' => '',
		'panel' => 'para_blog_panel',
		) );

	$wp_customize->add_setting(
		// $id
		'para_blog_search_placeholder',
		// $args
		array(
			'default'			=> esc_html__( 'Search', 'para-blog' ),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_nohtml'
			)
		);

	$wp_customize->add_control(
		// $id
		'para_blog_search_placeholder',
		// $args
		array(
			'settings'		=> 'para_blog_search_placeholder',
			'section'		=> 'para_blog_search',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Search Placeholder', 'para-blog' ),
			)
		);

	
	/*
	***************
	* Header Carousel slider
	***************
	*/
	
	$wp_customize->add_section( 'para_blog_header_slider', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Slider Section ', 'para-blog' ),
			'description' => 'This Sldier section will appear only on front page.',
			'panel' => 'para_blog_panel',
			) );

		$wp_customize->add_setting(
			// $id
			'para_blog_show_slider_header',
			// $args
			array(
				'default'			=> false,
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			// $id
			'para_blog_show_slider_header',
			// $args
			array(
				'settings'		=> 'para_blog_show_slider_header',
				'section'		=> 'para_blog_header_slider',
				'type'			=> 'checkbox',
				'label'			=> esc_html__( 'Display Slider', 'para-blog' ),
				'description'	=> esc_html__('Show Slider on Front Page', 'para-blog')
				)
			);

		$wp_customize->add_setting( 'para_blog_header_sticky_post_carousel', array(
			'default' => 'sticky_posts',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_select'
			) );

		$wp_customize->add_control(
			    'para_blog_header_sticky_post_carousel',
			    array(
			        'type' => 'select',
			        'label' => esc_html__('Select Sticky Post', 'para-blog'),
			        'section' => 'para_blog_header_slider',
			        'choices' => array(
			        	        'all' 	=> esc_html__( 'All','para-blog'),
                                'sticky_posts' 	=> esc_html__( 'Sticky Post','para-blog'),
                              
                                      ),
			        'priority' => 20
			    )
			);
	

	/*
	***************
	* Header
	***************
	*/


	
	/*
	***************
	* Footer Section
	***************
	*/
	$wp_customize->add_section( 'para_blog_footer', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Footer Options', 'para-blog' ),
		'description' => '',
		'panel' => 'para_blog_panel',
		) );

	$wp_customize->add_setting(
		// $id
		'para_blog_copyright_text',
		// $args
		array(
			'default'			=> esc_html__('Your Own Copyright Text', 'para-blog'), 
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_html'
			)
		);

	$wp_customize->add_control(
		// $id
		'para_blog_copyright_text',
		// $args
		array(
			'settings'		=> 'para_blog_copyright_text',
			'section'		=> 'para_blog_footer',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Copyright Text', 'para-blog' ),
			)
		);
	//  =============================
    //  = Footer Widget                 =
    //  =============================
	$wp_customize->add_setting(
		// $id
		'para_blog_footer_widget',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
			)
		);
	$wp_customize->add_control(
		// $id
		'para_blog_footer_widget',
		// $args
		array(
			'settings'		=> 'para_blog_footer_widget',
			'section'		=> 'para_blog_footer',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Footer Widget', 'para-blog' ),
			)
		);

	//  =============================
    //  = Go to Top                =
    //  =============================
	$wp_customize->add_setting(
		// $id
		'para_blog_goto_top',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
			)
		);
	$wp_customize->add_control(
		// $id
		'para_blog_goto_top',
		// $args
		array(
			'settings'		=> 'para_blog_goto_top',
			'section'		=> 'para_blog_footer',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Go to Top Button', 'para-blog' ),
			)
		);

	/*
	***************
	* Blog Section
	***************
	*/
	$wp_customize->add_section( 'para_blog_blog', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Blog Options', 'para-blog' ),
		'description' => '',
		'panel' => 'para_blog_panel',
		) );

	$wp_customize->add_setting(
		// $id
		'para_blog_excerpt_length',
		// $args
		array(
			'default'			=> 40,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_number_absint'
			)
		);

	$wp_customize->add_control(
		// $id
		'para_blog_excerpt_length',
		// $args
		array(
			'settings'		=> 'para_blog_excerpt_length',
			'section'		=> 'para_blog_blog',
			'type'			=> 'number',
			'label'			=> esc_html__( 'Excerpt Length (words)', 'para-blog' ),
			'description'	=> esc_html__( 'Default is 40 words', 'para-blog' ),
			)
		);

	//  =============================
    //  = Post Meta                 =
    //  =============================
	$wp_customize->add_setting(
		// $id
		'para_blog_post_meta',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'para_blog_sanitize_checkbox'
			)
		);
	$wp_customize->add_control(
		// $id
		'para_blog_post_meta',
		// $args
		array(
			'settings'		=> 'para_blog_post_meta',
			'section'		=> 'para_blog_blog',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Post Meta', 'para-blog' ),
			)
		);
}