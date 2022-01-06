<?php

$priority = 1;

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'social_icons_width',
		'description' => esc_html__( 'Icons Width (px)', 'rhye' ),
		'section'     => 'typography_social_icons',
		'default'     => 30,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 8,
			'max'  => 100,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.social__item a',
				'property' => 'width',
        'suffix'   => 'px'
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'social_icons_height',
		'description' => esc_html__( 'Icons Height (px)', 'rhye' ),
		'section'     => 'typography_social_icons',
		'default'     => 30,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 8,
			'max'  => 100,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.social__item a',
				'property' => 'height',
        'suffix'   => 'px'
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'slider',
		'settings'    => 'social_icons_font_size',
		'description' => esc_html__( 'Icons Font Size (px)', 'rhye' ),
		'section'     => 'typography_social_icons',
		'default'     => 14,
		'priority'    => $priority++,
		'choices'     => array(
			'min'  => 8,
			'max'  => 100,
			'step' => 1,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.social__item a',
				'property' => 'font-size',
        'suffix'   => 'px'
			),
		),
	)
);

