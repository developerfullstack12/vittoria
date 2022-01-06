<?php

$priority = 1;

Kirki::add_field(
	'arts', array(
		'type'        => 'switch',
		'settings'    => 'mobile_bar_fix_enabled',
		'label'       => esc_html__( 'Fit Fullscreen Height Elements', 'rhye' ),
		'description' => esc_html__( 'This option calculates the full height elements to fit the entire screen considering the height of bottom navigation bar.', 'rhye' ),
		'section'     => 'layout',
		'default'     => true,
		'priority'    => $priority++,
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'switch',
		'settings'    => 'mobile_bar_fix_update',
		'label'       => esc_html__( 'Update Fullscreen Height Elements on Window Resize', 'rhye' ),
		'description' => esc_html__( 'Disable to avoid page jump when scrolling on mobile devices.', 'rhye' ),
		'section'     => 'layout',
		'default'     => true,
    'priority'    => $priority++,
    'active_callback' => array(
			array(
				'setting'  => 'mobile_bar_fix_enabled',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
