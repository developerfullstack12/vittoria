<?php

$priority = 1;

/**
 * 404 Preview Link
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => '404_preview_link',
		'label'    => esc_html__( 'Preview', 'rhye' ),
		'section'  => '404',
		'priority' => $priority++,
		'default'  => esc_html__( 'Load Page', 'rhye' ),
		'choices'  => array(
			'element' => 'input',
			'type'    => 'button',
			'class'   => 'button button-secondary',
			'onclick' => 'javascript:wp.customize.previewer.previewUrl.set( "../not-found-" + String( Math.random() ) + "/" );',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => '404_generic_divider' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Content
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Content', 'rhye' ),
		'settings' => '404_generic_heading' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

/**
 * Title
 */
Kirki::add_field(
	'arts', array(
		'type'        => 'text',
		'settings'    => '404_title',
		'description' => esc_html__( 'Title', 'rhye' ),
		'section'     => '404',
		'default'     => esc_html__( '404 Error', 'rhye' ),
		'priority'    => $priority++,
		'transport'   => 'postMessage',
	)
);

/**
 * Message
 */
Kirki::add_field(
	'arts', array(
		'type'        => 'textarea',
		'settings'    => '404_message',
		'description' => esc_html__( 'Message', 'rhye' ),
		'section'     => '404',
		'default'     => esc_html__( 'It looks like nothing found here. Try to navigate the menu or return to the home page.', 'rhye' ),
		'priority'    => $priority++,
		'transport'   => 'postMessage',
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => '404_generic_divider' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Style
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Style', 'rhye' ),
		'settings' => '404_generic_heading' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'select',
		'settings'    => '404_theme',
		'description' => esc_html__( 'Color Theme', 'rhye' ),
		'section'     => '404',
		'default'     => '',
		'priority'    => $priority++,
		'choices'     => ARTS_THEME_COLORS_ARRAY,
		'transport' => 'postMessage',
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'select',
		'settings'    => '404_main_theme',
		'description' => esc_html__( 'Main Elements Color', 'rhye' ),
		'section'     => '404',
		'default'     => 'dark',
		'priority'    => $priority++,
		'transport' => 'postMessage',
		'choices'     => ARTS_THEME_COLOR_THEMES_ARRAY,
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => '404_generic_divider' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Button
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Button', 'rhye' ),
		'settings' => '404_generic_heading' . $priority,
		'section'  => '404',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'text',
		'settings'    => '404_button_label',
		'description' => esc_html__( 'Label', 'rhye' ),
		'section'     => '404',
		'default'     => esc_html__( 'Back to home page', 'rhye' ),
		'priority'    => $priority++,
		'transport'   => 'postMessage',
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'select',
		'settings'    => '404_button_style',
		'description' => esc_html__( 'Style', 'rhye' ),
		'section'     => '404',
		'default'     => 'button_bordered',
		'priority'    => $priority++,
		'transport' => 'postMessage',
		'choices'     => array(
			'button_bordered' => esc_html__( 'Bordered', 'rhye' ),
			'button_solid'    => esc_html__( 'Solid', 'rhye' ),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'        => 'select',
		'settings'    => '404_button_theme',
		'description' => esc_html__( 'Color Theme', 'rhye' ),
		'section'     => '404',
		'default'     => 'bg-dark-1',
		'priority'    => $priority++,
		'transport'   => 'postMessage',
		'choices'     => ARTS_THEME_COLORS_ARRAY,
	)
);
