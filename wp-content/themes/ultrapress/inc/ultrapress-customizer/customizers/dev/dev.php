<?php
/**
 * Developer section
 */
$wp_customize->add_section( 'ultrapress_developer_section',
	array(
		'title' => esc_html__( 'Developer Mode', 'ultrapress' ),
		'priority' => 0
	)
);
$wp_customize->add_setting( 'ultrapress_dev_mode_free',
	array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_dev_mode_free',
		array(
			'label' => esc_html__( 'Developer Mode', 'ultrapress' ),
			'description' => esc_html__( 'Please select on to enable developer mode. Enabling developer mode will load unminified version of styes and scripts.', 'ultrapress' ),
			'section' => 'ultrapress_developer_section',
			'feature' => 'locked',
			'priority' => 1
		)
	) 
);