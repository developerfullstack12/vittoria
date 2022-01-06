<?php

$priority = 1;

/**
 * XL
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'XLarge Distance Preset', 'rhye' ),
		'settings' => 'paddings_margins_generic_heading' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_max_xlarge',
		'description' => esc_html__( 'Desktop Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 400,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-max-xlarge',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-max-xlarge',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_min_xlarge',
		'description' => esc_html__( 'Mobile Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 160,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-min-xlarge',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-min-xlarge',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'paddings_margins_generic_divider' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * L
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Large Distance Preset', 'rhye' ),
		'settings' => 'paddings_margins_generic_heading' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_max_large',
		'description' => esc_html__( 'Desktop Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 240,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-max-large',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-max-large',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_min_large',
		'description' => esc_html__( 'Mobile Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 100,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-min-large',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-min-large',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'paddings_margins_generic_divider' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * M
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Medium Distance Preset', 'rhye' ),
		'settings' => 'paddings_margins_generic_heading' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_max_medium',
		'description' => esc_html__( 'Desktop Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 160,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-max-medium',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-max-medium',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_min_medium',
		'description' => esc_html__( 'Mobile Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 40,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-min-medium',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-min-medium',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'paddings_margins_generic_divider' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * S
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Small Distance Preset', 'rhye' ),
		'settings' => 'paddings_margins_generic_heading' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_max_small',
		'description' => esc_html__( 'Desktop Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 80,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-max-small',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-max-small',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_min_small',
		'description' => esc_html__( 'Mobile Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 30,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-min-small',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-min-small',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'paddings_margins_generic_divider' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * XS
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'XSmall Distance Preset', 'rhye' ),
		'settings' => 'paddings_margins_generic_heading' . $priority,
		'section'  => 'paddings_margins',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_max_xsmall',
		'description' => esc_html__( 'Desktop Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 50,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-max-xsmall',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-max-xsmall',
				'context'  => array( 'editor' ),
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'distance_min_xsmall',
		'description' => esc_html__( 'Mobile Distance (px)', 'rhye' ),
		'section'     => 'paddings_margins',
		'default'     => 30,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--distance-min-xsmall',
			),
			array(
				'element'  => ':root',
				'property' => '--distance-min-xsmall',
				'context'  => array( 'editor' ),
			),
		),
	)
);
