<?php

$priority = 1;

Kirki::add_field(
	'arts', array(
		'type'     => 'radio-buttonset',
		'settings' => 'blog_container',
		'label'    => esc_html__( 'Container', 'rhye' ),
		'section'  => 'blog_layout',
		'default'  => 'container',
		'priority' => $priority++,
		'choices'  => array(
			'container-fluid' => esc_html__( 'Fullwidth', 'rhye' ),
			'container'       => esc_html__( 'Boxed', 'rhye' ),
		),
		'transport' => 'postMessage'
	)
);

/**
 * Grid/List Layout
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'radio-buttonset',
		'settings' => 'blog_layout',
		'label'    => esc_html__( 'Layout', 'rhye' ),
		'section'  => 'blog_layout',
		'default'  => 'list',
		'priority' => $priority++,
		'choices'  => array(
			'list' => esc_html__( 'List', 'rhye' ),
			'grid' => esc_html__( 'Grid', 'rhye' ),
		),
	)
);

/**
 * Grid Columns
 */
Kirki::add_field(
	'arts', array(
		'type'            => 'slider',
		'settings'        => 'blog_grid_columns',
		'description'     => esc_html__( 'Columns', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => 2,
		'priority'        => $priority++,
		'choices'         => array(
			'min'  => 1,
			'max'  => 6,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

/**
 * Grid Space Between
 */
Kirki::add_field(
	'arts', array(
		'type'            => 'slider',
		'settings'        => 'blog_grid_space_between',
		'description'     => esc_html__( 'Space Between', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => 4,
		'priority'        => $priority++,
		'choices'         => array(
			'min'  => 1,
			'max'  => 6,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

/**
 * Grid Fancy
 */
Kirki::add_field(
	'arts', array(
		'type'            => 'checkbox',
		'settings'        => 'blog_grid_fancy_enabled',
		'label'           => esc_html__( 'Enable Fancy Grid', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => true,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'generic',
		'settings'        => 'blog_generic_divider' . $priority,
		'section'         => 'blog_layout',
		'priority'        => $priority++,
		'choices'         => array(
			'element' => 'hr',
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

/**
 * Grid Filter
 */
Kirki::add_field(
	'arts', array(
		'type'            => 'switch',
		'settings'        => 'blog_grid_filter_enabled',
		'label'           => esc_html__( 'Enable Filter by Categories', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => true,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'blog_grid_filter_mode',
		'description'           => esc_html__( 'Filter Mode', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => 'current_page',
		'priority'        => $priority++,
		'choices'         => array(
			'current_page' => esc_html__( 'Current Page', 'rhye' ),
			'all'          => esc_html__( 'All Categories', 'rhye' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
			array(
				'setting'  => 'blog_grid_filter_enabled',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'generic',
		'description'     => esc_html__( 'The filter applies for the posts displayed on the current page in paginated blog. Navigating the blog pages updates the categories set depending on the currently displayed posts.', 'rhye' ),
		'settings'        => 'blog_layout_generic_heading' . $priority,
		'section'         => 'blog_layout',
		'priority'        => $priority++,
		'choices'         => array(
			'element' => 'span',
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
			array(
				'setting'  => 'blog_grid_filter_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'blog_grid_filter_mode',
				'operator' => '==',
				'value'    => 'current_page',
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'generic',
		'description'     => esc_html__( 'The filter applies for all the published posts. All the categories assigned to the posts are displayed and remain unchanged. The posts pagination works for the currently active category.', 'rhye' ),
		'settings'        => 'blog_layout_generic_heading' . $priority,
		'section'         => 'blog_layout',
		'priority'        => $priority++,
		'choices'         => array(
			'element' => 'span',
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
			array(
				'setting'  => 'blog_grid_filter_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'blog_grid_filter_mode',
				'operator' => '==',
				'value'    => 'all',
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'checkbox',
		'settings'        => 'blog_grid_hide_page_subheading',
		'label'           => esc_html__( 'Hide Page Subheading', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => true,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'blog_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
			array(
				'setting'  => 'blog_grid_filter_enabled',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'settings' => 'blog_generic_divider' . $priority,
		'section'  => 'blog_layout',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

/**
 * Posts Preview
 */
Kirki::add_field(
	'arts', array(
		'type'     => 'generic',
		'label'    => esc_html__( 'Posts Preview', 'rhye' ),
		'settings' => 'blog_layout_generic_heading' . $priority,
		'section'  => 'blog_layout',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'span',
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'switch',
		'settings' => 'blog_ajax_image_transition_enabled',
		'label'    => esc_html__( 'Enable Seamless Image Transition', 'rhye' ),
		'description' => sprintf(
			'%1$s <a href="javascript:wp.customize.section(\'ajax_transitions\').focus();">%2$s</a> %3$s',
			esc_html__( 'Make sure to have AJAX navigation enabled in', 'rhye' ),
			esc_html__( 'Theme Options -> AJAX Transitions', 'rhye' ),
			esc_html__( 'panel.', 'rhye' )
		),
		'section'  => 'blog_layout',
		'default'  => 'on',
		'priority' => $priority++,
		'choices'  => array(
			true  => esc_html__( 'On', 'rhye' ),
			false => esc_html__( 'Off', 'rhye' ),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'     => 'switch',
		'settings' => 'blog_read_more_enabled',
		'label'    => esc_html__( 'Enable "Read More" Button', 'rhye' ),
		'section'  => 'blog_layout',
		'default'  => 'on',
		'priority' => $priority++,
		'choices'  => array(
			true  => esc_html__( 'On', 'rhye' ),
			false => esc_html__( 'Off', 'rhye' ),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'text',
		'settings'        => 'blog_read_more_label',
		'description'     => esc_html__( 'Label', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => esc_html__( 'Read More', 'rhye' ),
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting' => 'blog_read_more_enabled',
				'value'   => true,
			),
		),
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'slider',
		'settings'        => 'blog_posts_excerpt_words_number',
		'label'           => esc_html__( 'Excerpt length (words)', 'rhye' ),
		'section'         => 'blog_layout',
		'default' => 55,
		'choices'         => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
		'priority'        => $priority++
	)
);

Kirki::add_field(
	'arts', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'blog_posts_date_style',
		'label'           => esc_html__( 'Date Style', 'rhye' ),
		'section'         => 'blog_layout',
		'default'         => 'info',
		'priority'        => $priority++,
		'choices'         => array(
			'info'       => esc_html__( 'Post Meta', 'rhye' ),
			'square_box' => esc_html__( 'Square Box', 'rhye' ),
		)
	)
);
