<?php
/**
 * seo section
 */
$wp_customize->add_section( 'ultrapress_seo_section',
	array(
		'title' => esc_html__( 'SEO Settings', 'ultrapress' ),
		'priority' => 100
	)
);
$wp_customize->add_setting( 'ultrapress_seo_schema_free',
	array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_seo_schema_free',
		array(
			'label' => esc_html__( 'SEO Schema', 'ultrapress' ),
			'description' => esc_html__( 'Please select on to enable default seo schema.', 'ultrapress' ),
			'section' => 'ultrapress_seo_section',
			'priority' => 1,
			'feature' => 'locked',
		)
	) 
);