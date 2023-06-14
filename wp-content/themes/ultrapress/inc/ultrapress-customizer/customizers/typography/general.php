<?php
/**
 * general font setting
 */
$wp_customize->add_setting( 'ultrapress_cdn_google_font_free',
	array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_cdn_google_font_free',
		array(
			'label' => esc_html__( 'Use CDN Links', 'ultrapress' ),
			'description' => esc_html__( 'Load google fonts from CDN.', 'ultrapress' ),
			'section' => 'ultrapress_typography_general_section',
			'priority' => 1,
			'feature' => 'locked',
		)
	) 
);