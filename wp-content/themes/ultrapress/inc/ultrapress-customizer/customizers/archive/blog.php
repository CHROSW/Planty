<?php
$wp_customize->add_setting( 'ultrapress_blog_settings_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_blog_settings_heading',
		array(
			'label' => esc_html__( 'Archive Settings', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_blog_page_section',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_archive_layout',
	array(
		'default' => 'list',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_radio_sanitization'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Image_Radio_Button_Custom_Control( 
		$wp_customize, 'ultrapress_archive_layout',
		array(
			'label' => esc_html__( 'Archive Layout', 'ultrapress' ),
			'section' => 'ultrapress_blog_page_section',
			'choices' => array(
				'grid' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/ultrapress-customizer/images/archive-layout.png',
					'name' => esc_html__( 'Grid', 'ultrapress' )
				),
				'list' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/ultrapress-customizer/images/archive-layout3.png',
					'name' => esc_html__( 'List', 'ultrapress' )
				),
				'fancy' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/ultrapress-customizer/images/archive-layout1.png',
					'name' => esc_html__( 'Masonry', 'ultrapress' )
				)
			),
			'priority' => 2
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_achive_column_no',
	array(
		'default' => '2',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control('ultrapress_achive_column_no',
	array(
		'label' => esc_html__( 'Select Column', 'ultrapress' ),
		'type' => 'select',
		'choices' => array(
			'2' => esc_html__( '2', 'ultrapress' ),
			'3' => esc_html__( '3', 'ultrapress' ),
			'4' => esc_html__( '4', 'ultrapress' ),
		),
		'section' => 'ultrapress_blog_page_section',
		'active_callback'  => 'ultrapress_archive_column_cb',
		'priority' => 3
	)
);
$wp_customize->add_setting( 
	'ultrapress_archive_excerpt_lenghth', 
	array(
		'default' =>35,
		'sanitize_callback' => 'absint' 
	)
);
$wp_customize->add_control( 
	'ultrapress_archive_excerpt_lenghth', 
	array(
		'label' => esc_html__( 'Excerpt Length', 'ultrapress' ),
		'section' => 'ultrapress_blog_page_section',
		'type' => 'number',
		'priority' => 4
	)
); 
$wp_customize->add_setting( 
	'ultrapress_archive_button_text', 
	array(
		'default' => esc_html__( 'Read More', 'ultrapress' ),
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	'ultrapress_archive_button_text', 
	array(
		'label' => esc_html__( 'Read More Text', 'ultrapress' ),
		'section' => 'ultrapress_blog_page_section',
		'type' => 'text',
		'priority' => 5
	)
); 
$wp_customize->add_setting('ultrapress_archive_button_type',
	array(
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'ultrapress_sanitize_select',
    	'transport' => 'refresh',
    	'default' => 'button'
    )
);
$wp_customize->add_control( 'ultrapress_archive_button_type',
	array(
		'label'  => esc_html__( 'Button Type', 'ultrapress' ),
		'section' => 'ultrapress_blog_page_section',
		'type' => 'select',
		'choices' => array(
			'link' => __('Normal Link','ultrapress'),
			'button' => __('Button','ultrapress'),
		),
		'priority' => 6
	)
); 
$wp_customize->add_setting( 'ultrapress_archive_content_reorder',
	array(
		'default' => 'featured_image,title,meta_tag,content,button,social_share',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_text_sanitization'
	)
);
$wp_customize->add_control( new Ultrapress_Pill_Checkbox_Custom_Control( $wp_customize, 'ultrapress_archive_content_reorder',
	array(
		'label' => __( 'Content Order', 'ultrapress' ),
		'section' => 'ultrapress_blog_page_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => array(
			'featured_image' => __( 'Feature Image', 'ultrapress' ),
			'title' => __( 'Title', 'ultrapress' ),
			'meta_tag' => __( 'Meta Tags', 'ultrapress'  ),
			'content' => __( 'Content', 'ultrapress'  ),
			'button' => __( 'Button', 'ultrapress'  ),
			
		),
		'priority' => 7
	)
) );

// Upsell button
$wp_customize->add_setting( 'ultrapress_blog_upsell',
	array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Control_Description( 
		$wp_customize, 'ultrapress_blog_upsell',
		array(
			'section' => 'ultrapress_blog_page_section',
		)
	) 
);