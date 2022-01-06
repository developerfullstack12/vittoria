<?php

$priority = 1;

/**
 * On-scroll
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'On-Scroll', 'rhye' ),
		'settings' => 'animations_generic_heading' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'smc_trigger_hook',
		'description' => esc_html__( 'Trigger hook', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value between 0.0 and 1.0 defining the position of the trigger hook in relation to the viewport.', 'rhye' ),
		'section'     => 'animations',
		'default'     => 0.85,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_on_scroll_reveal_timescale',
		'description' => esc_html__( 'Reveal transition timescale (speed multiplier)', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 1.0,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'animations_generic_divider' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Overlay Menu
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Overlay Menu', 'rhye' ),
		'settings' => 'animations_generic_heading' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_overlay_menu_open_timescale',
		'description' => esc_html__( 'Opening transition timescale', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 1.0,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_overlay_menu_close_timescale',
		'description' => esc_html__( 'Closing transition timescale', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 1.0,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'animations_generic_divider' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Preloader
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Preloader', 'rhye' ),
		'settings' => 'animations_generic_heading' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_preloader_timescale',
		'description' => esc_html__( 'Curtain transition timescale', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 0.9,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'animations_generic_divider' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * AJAX Transitions
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'AJAX Transitions', 'rhye' ),
		'settings' => 'animations_generic_heading' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_ajax_transition_curtain_timescale',
		'description' => esc_html__( 'Curtain transition timescale', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 1.0,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'number',
		'settings'    => 'animations_ajax_transition_image_timescale',
		'description' => esc_html__( 'Flying image transition timescale', 'rhye' ),
		'tooltip'     => esc_html__( 'A float value - speed multiplier. 1.0 = default speed. 0.5 = half speed. 2.0 = double speed', 'rhye' ),
		'section'     => 'animations',
		'default'     => 1.0,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3.0,
			'step' => 0.01,
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'animations_generic_divider' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Scroll Down
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Scroll Down Button', 'rhye' ),
		'settings' => 'animations_generic_heading' . $priority,
		'section'  => 'animations',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'checkbox',
		'settings' => 'animations_scroll_down_enabled',
		'label'    => esc_html__( 'Enable On-Scroll Rotation', 'rhye' ),
		'section'  => 'animations',
		'default'  => true,
		'priority' => $priority++,
	)
);
