<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Page Masthead in Elementor Document Settings
 */
add_action( 'elementor/element/wp-page/document_settings/after_section_end', 'arts_add_elementor_document_settings_page_masthead' );
add_action( 'elementor/element/wp-post/document_settings/after_section_end', 'arts_add_elementor_document_settings_page_masthead' );

function arts_add_elementor_document_settings_page_masthead( \Elementor\Core\DocumentTypes\PageBase $page ) {

	/**
	 * Page Masthead Settings
	 */
	$page->start_controls_section(
		'page_masthead_section',
		[
			'label' => esc_html__( 'Page Masthead', 'rhye' ),
			'tab'   => \Elementor\Controls_Manager::TAB_SETTINGS,
		]
	);

	$page->add_control(
		'page_masthead_layout',
		[
			'label'   => esc_html__( 'Layout', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'none'                              => esc_html__( 'Hide Background', 'rhye' ),
				'beneath'                           => esc_html__( 'Background Beneath Content', 'rhye' ),
				'fullscreen'                        => esc_html__( 'Fullscreen', 'rhye' ),
				'halfscreen-image-left'             => esc_html__( 'Halfscreen / Image Left / Content Right', 'rhye' ),
				'halfscreen-image-left-properties'  => esc_html__( 'Halfscreen / Image Left / Content Left / Properties Right', 'rhye' ),
				'halfscreen-image-right'            => esc_html__( 'Halfscreen / Image Right / Content Left', 'rhye' ),
				'halfscreen-image-right-properties' => esc_html__( 'Halfscreen / Image Right / Content Right / Properties Left', 'rhye' ),
			],
			'default' => 'beneath',
		]
	);

	$page->add_control(
		'page_masthead_fullscreen_fixed_enabled',
		[
			'label'     => esc_html__( 'Enable Fixed Layout', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'default'   => '',
			'condition' => [
				'page_masthead_layout' => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_fullscreen_fixed_speed',
		[
			'label'     => esc_html__( 'Scene Duration Multiplier', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => [
				'factor' => [
					'min'  => 0.1,
					'max'  => 2,
					'step' => 0.01,
				],
			],
			'default'   => [
				'unit' => 'factor',
				'size' => 0.2,
			],
			'condition' => [
				'page_masthead_layout'                   => 'fullscreen',
				'page_masthead_fullscreen_fixed_enabled' => 'yes',
			],
		]
	);

	$page->add_control(
		'page_masthead_heading_content',
		[
			'label'     => esc_html__( 'Content', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
		]
	);

	$page->add_control(
		'page_masthead_content_alignment',
		[
			'label'   => esc_html__( 'Alignment', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::CHOOSE,
			'options' => [
				'text-left'   => [
					'title' => esc_html__( 'Left', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-left',
				],
				'text-center' => [
					'title' => esc_html__( 'Center', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-center',
				],
				'text-right'  => [
					'title' => esc_html__( 'Right', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-right',
				],
			],
			'default' => 'text-center',
			'toggle'  => false,
		]
	);

	$page->add_control(
		'page_masthead_content_container',
		[
			'label'      => esc_html__( 'Container', 'rhye' ),
			'type'       => \Elementor\Controls_Manager::SELECT,
			'options'    => [
				'container'       => esc_html__( 'Boxed', 'rhye' ),
				'container-fluid' => esc_html__( 'Fullwidth', 'rhye' ),
			],
			'default'    => 'container-fluid',
			'conditions' => [
				'relation' => 'or',
				'terms'    => [
					[
						'name'     => 'page_masthead_layout',
						'operator' => '!=',
						'value'    => 'yes',
					],
				],
			],
		]
	);

	$page->add_control(
		'page_masthead_content_position',
		[
			'label'     => esc_html__( 'Position', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'options'   => [
				'section-masthead__inner_background-left'  => [
					'title' => esc_html__( 'Left', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-left',
				],
				''                                         => [
					'title' => esc_html__( 'Center', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-center',
				],
				'section-masthead__inner_background-right' => [
					'title' => esc_html__( 'Right', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-right',
				],
			],
			'default'   => 'section-masthead__inner_background-left',
			'toggle'    => false,
			'condition' => [
				'page_masthead_content_enable_background' => 'yes',
				'page_masthead_layout'                    => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_pt',
		[
			'label'     => esc_html__( 'Padding Top', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => 'pt-large',
			'options'   => [
				''          => esc_html__( 'None', 'rhye' ),
				'pt-xsmall' => esc_html__( '+ XSmall', 'rhye' ),
				'pt-small'  => esc_html__( '+ Small', 'rhye' ),
				'pt-medium' => esc_html__( '+ Medium', 'rhye' ),
				'pt-large'  => esc_html__( '+ Large', 'rhye' ),
				'pt-xlarge' => esc_html__( '+ XLarge', 'rhye' ),
			],
			'condition' => [
				'page_masthead_layout!' => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_pb',
		[
			'label'     => esc_html__( 'Padding Bottom', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => 'pb-medium',
			'options'   => [
				''          => esc_html__( 'None', 'rhye' ),
				'pb-xsmall' => esc_html__( '+ XSmall', 'rhye' ),
				'pb-small'  => esc_html__( '+ Small', 'rhye' ),
				'pb-medium' => esc_html__( '+ Medium', 'rhye' ),
				'pb-large'  => esc_html__( '+ Large', 'rhye' ),
				'pb-xlarge' => esc_html__( '+ XLarge', 'rhye' ),
			],
			'condition' => [
				'page_masthead_layout!' => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_mt',
		[
			'label'     => esc_html__( 'Margin Top', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => '',
			'options'   => [
				''          => esc_html__( 'None', 'rhye' ),
				'mt-xsmall' => esc_html__( '+ XSmall', 'rhye' ),
				'mt-small'  => esc_html__( '+ Small', 'rhye' ),
				'mt-medium' => esc_html__( '+ Medium', 'rhye' ),
				'mt-large'  => esc_html__( '+ Large', 'rhye' ),
				'mt-xlarge' => esc_html__( '+ XLarge', 'rhye' ),
			],
			'condition' => [
				'page_masthead_layout!' => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_mb',
		[
			'label'     => esc_html__( 'Margin Bottom', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => '',
			'options'   => [
				''          => esc_html__( 'None', 'rhye' ),
				'mb-xsmall' => esc_html__( '+ XSmall', 'rhye' ),
				'mb-small'  => esc_html__( '+ Small', 'rhye' ),
				'mb-medium' => esc_html__( '+ Medium', 'rhye' ),
				'mb-large'  => esc_html__( '+ Large', 'rhye' ),
				'mb-xlarge' => esc_html__( '+ XLarge', 'rhye' ),
			],
			'condition' => [
				'page_masthead_layout!' => 'fullscreen',
			],
		]
	);

	$page->add_control(
		'page_masthead_heading_image',
		[
			'label'     => esc_html__( 'Background', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'page_masthead_layout!' => 'none',
			],
		]
	);

	$page->add_control(
		'page_masthead_image_placement',
		[
			'label'     => esc_html__( 'Element Placement', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'options'   => [
				'image'      => [
					'title' => esc_html__( 'Preserve Aspect Ratio', 'rhye' ),
					'icon'  => 'fa fa-fw fa-file-image-o',
				],
				'background' => [
					'title' => esc_html__( 'Cover Background', 'rhye' ),
					'icon'  => 'fa fa-fw fa-picture-o',
				],
			],
			'default'   => 'background',
			'toggle'    => false,
			'condition' => [
				'page_masthead_layout' => 'beneath',
			],
		]
	);

	$page->add_responsive_control(
		'page_masthead_image_width',
		[
			'label'           => esc_html__( 'Maximum Width', 'rhye' ),
			'type'            => \Elementor\Controls_Manager::SLIDER,
			'desktop_default' => [
				'size' => 100,
				'unit' => '%',
			],
			'tablet_default'  => [
				'size' => 100,
				'unit' => '%',
			],
			'mobile_default'  => [
				'size' => 100,
				'unit' => '%',
			],
			'range'           => [
				'px' => [
					'min' => 0,
					'max' => 1440,
				],
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
			],
			'size_units'      => [ 'px', '%' ],
			'selectors'       => [
				'.section-masthead .section-masthead__background' => 'max-width: {{SIZE}}{{UNIT}};',
			],
			'condition'       => [
				'page_masthead_layout'           => 'beneath',
				'page_masthead_image_placement'  => 'image',
				'page_masthead_image_alignment!' => 'w-100',
			],
		]
	);

	$page->add_responsive_control(
		'page_masthead_image_height',
		[
			'label'           => esc_html__( 'Height', 'rhye' ),
			'type'            => \Elementor\Controls_Manager::SLIDER,
			'desktop_default' => [
				'size' => 900,
				'unit' => 'px',
			],
			'tablet_default'  => [
				'size' => 70,
				'unit' => 'vh',
			],
			'mobile_default'  => [
				'size' => 50,
				'unit' => 'vh',
			],
			'range'           => [
				'px' => [
					'min' => 0,
					'max' => 1440,
				],
				'vh' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'size_units'      => [ 'px', 'vh' ],
			'selectors'       => [
				'.section-masthead .section-masthead__background' => 'height: {{SIZE}}{{UNIT}};',
			],
			'condition'       => [
				'page_masthead_layout'          => 'beneath',
				'page_masthead_image_placement' => 'background',
			],
		]
	);

	$page->add_responsive_control(
		'page_masthead_background_position_x',
		[
			'label'           => esc_html__( 'Background Position X', 'rhye' ),
			'type'            => \Elementor\Controls_Manager::SLIDER,
			'desktop_default' => [
				'size' => 50,
				'unit' => '%',
			],
			'tablet_default'  => [
				'size' => 50,
				'unit' => '%',
			],
			'mobile_default'  => [
				'size' => 50,
				'unit' => '%',
			],
			'range'           => [
				'%' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'size_units'      => [ '%' ],
			'selectors'       => [
				'(desktop).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x.SIZE}}{{page_masthead_background_position_x.UNIT}} {{page_masthead_background_position_y.SIZE}}{{page_masthead_background_position_y.UNIT}};',
				'(tablet).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x_tablet.SIZE}}{{page_masthead_background_position_x_tablet.UNIT}} {{page_masthead_background_position_y_tablet.SIZE}}{{page_masthead_background_position_y_tablet.UNIT}};',
				'(mobile).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x_mobile.SIZE}}{{page_masthead_background_position_x_mobile.UNIT}} {{page_masthead_background_position_y_mobile.SIZE}}{{page_masthead_background_position_y_mobile.UNIT}};',
			],
			'condition'       => [
				'page_masthead_image_placement' => 'background',
				'page_masthead_layout!'         => 'none',
			],
		]
	);

	$page->add_responsive_control(
		'page_masthead_background_position_y',
		[
			'label'           => esc_html__( 'Background Position Y', 'rhye' ),
			'type'            => \Elementor\Controls_Manager::SLIDER,
			'desktop_default' => [
				'size' => 50,
				'unit' => '%',
			],
			'tablet_default'  => [
				'size' => 50,
				'unit' => '%',
			],
			'mobile_default'  => [
				'size' => 50,
				'unit' => '%',
			],
			'range'           => [
				'%' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'size_units'      => [ '%' ],
			'selectors'       => [
				'(desktop).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x.SIZE}}{{page_masthead_background_position_x.UNIT}} {{page_masthead_background_position_y.SIZE}}{{page_masthead_background_position_y.UNIT}};',
				'(tablet).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x_tablet.SIZE}}{{page_masthead_background_position_x_tablet.UNIT}} {{page_masthead_background_position_y_tablet.SIZE}}{{page_masthead_background_position_y_tablet.UNIT}};',
				'(mobile).section-masthead .section-masthead__background img.of-cover' => 'object-position: {{page_masthead_background_position_x_mobile.SIZE}}{{page_masthead_background_position_x_mobile.UNIT}} {{page_masthead_background_position_y_mobile.SIZE}}{{page_masthead_background_position_y_mobile.UNIT}};',
			],
			'condition'       => [
				'page_masthead_image_placement' => 'background',
				'page_masthead_layout!'         => 'none',
			],
		]
	);

	$page->add_control(
		'page_masthead_image_alignment',
		[
			'label'     => esc_html__( 'Alignment', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'options'   => [
				'w-100'                     => [
					'title' => esc_html__( 'Fullwidth', 'rhye' ),
					'icon'  => 'fa fa-fw fa-arrows-h',
				],
				'section_w-container-left'  => [
					'title' => esc_html__( 'Left', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-left',
				],
				'container'                 => [
					'title' => esc_html__( 'Center', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-center',
				],
				'section_w-container-right' => [
					'title' => esc_html__( 'Right', 'rhye' ),
					'icon'  => 'fa fa-fw fa-align-right',
				],
			],
			'default'   => 'w-100',
			'condition' => [
				'page_masthead_layout' => 'beneath',
			],
			'toggle'    => false,
		]
	);

	$page->add_control(
		'page_masthead_image_gutters_enabled',
		[
			'label'     => esc_html__( 'Enable Background Gutters', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'default'   => '',
			'condition' => [
				'page_masthead_layout' => [ 'halfscreen-image-left', 'halfscreen-image-right' ],
			],
		]
	);

	$page->add_control(
		'page_masthead_image_parallax_enabled',
		[
			'label'     => esc_html__( 'Enable Parallax', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'default'   => 'yes',
			'condition' => [
				'page_masthead_layout!' => 'none',
			],
		]
	);

	$page->add_control(
		'page_masthead_image_parallax_speed',
		[
			'label'     => esc_html__( 'Parallax Speed', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => [
				'factor' => [
					'min'  => -0.5,
					'max'  => 0.5,
					'step' => 0.01,
				],
			],
			'default'   => [
				'unit' => 'factor',
				'size' => 0.1,
			],
			'condition' => [
				'page_masthead_image_parallax_enabled' => 'yes',
				'page_masthead_layout!'                => 'none',
			],
		]
	);

	/**
	 * Overlay
	 */
	$page->add_control(
		'page_masthead_heading_overlay',
		[
			'label'     => esc_html__( 'Overlay', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'page_masthead_layout' => [ 'fullscreen', 'halfscreen-image-left-properties', 'halfscreen-image-right-properties' ],
			],
		]
	);

	$page->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name'      => 'page_masthead_background_overlay',
			'selector'  => '.section-masthead .section-masthead__overlay',
			'condition' => [
				'page_masthead_layout' => [ 'fullscreen', 'halfscreen-image-left-properties', 'halfscreen-image-right-properties' ],
			],
		]
	);

	$page->add_control(
		'page_masthead_background_overlay_dither_enabled',
		[
			'label'        => esc_html__( 'Enable Dither', 'rhye' ),
			'type'         => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'overlay_dither',
			'default'      => 'overlay_dither',
			'condition'    => [
				'page_masthead_layout' => [ 'fullscreen', 'halfscreen-image-left-properties', 'halfscreen-image-right-properties' ],
			],
		]
	);

	$page->add_control(
		'page_masthead_background_overlay_dither_opacity',
		[
			'label'     => esc_html__( 'Dither Opacity', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'default'   => [
				'size' => .2,
			],
			'range'     => [
				'px' => [
					'max'  => 1,
					'step' => 0.01,
				],
			],
			'selectors' => [
				'.section-masthead .section-masthead__overlay:before' => 'opacity: {{SIZE}};',
			],
			'condition' => [
				'page_masthead_layout' => [ 'fullscreen', 'halfscreen-image-left-properties', 'halfscreen-image-right-properties' ],
				'page_masthead_background_overlay_dither_enabled' => 'overlay_dither',
			],
		]
	);

	$page->add_control(
		'page_masthead_heading_themes',
		[
			'label'     => esc_html__( 'Color Theme', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
		]
	);

	$page->add_control(
		'page_masthead_background_image',
		[
			'label'     => esc_html__( 'Image Background Color', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => '',
			'options'   => ARTS_THEME_COLORS_ARRAY,
			'condition' => [
				'page_masthead_layout' => [ 'halfscreen-image-left', 'halfscreen-image-right' ],
			],
		]
	);

	$page->add_control(
		'page_masthead_background',
		[
			'label'   => esc_html__( 'Transition & Background Color', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => ARTS_THEME_COLORS_ARRAY,
		]
	);

	$page->add_control(
		'page_masthead_theme',
		[
			'label'   => esc_html__( 'Main Elements Color', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'dark',
			'options' => ARTS_THEME_COLOR_THEMES_ARRAY,
		]
	);

	$page->add_control(
		'page_masthead_heading_typography',
		[
			'label'     => esc_html__( 'Typography', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
		]
	);

	$page->add_control(
		'page_masthead_heading_preset',
		[
			'label'   => esc_html__( 'Heading Preset', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'h1',
			'options' => ARTS_THEME_TYPOGRAHY_ARRAY,
		]
	);

	$page->add_control(
		'page_masthead_subheading_preset',
		[
			'label'     => esc_html__( 'Category / Subheading Preset', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => 'subheading',
			'options'   => ARTS_THEME_TYPOGRAHY_ARRAY,
			'condition' => [
				'page_masthead_subheading_enabled' => 'yes',
			],
		]
	);

	$page->add_control(
		'page_masthead_text_preset',
		[
			'label'     => esc_html__( 'Text Preset', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => 'paragraph',
			'options'   => ARTS_THEME_TYPOGRAHY_ARRAY,
			'condition' => [
				'page_masthead_text_enabled' => 'yes',
			],
		]
	);

	$page->add_control(
		'heading_additional',
		[
			'label'     => esc_html__( 'Additional Options', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
		]
	);

	$page->add_control(
		'page_masthead_animation_enabled',
		[
			'label'   => esc_html__( 'Enable On-scroll Animation', 'rhye' ),
			'type'    => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);

	$page->add_control(
		'page_masthead_subheading_enabled',
		[
			'type'    => \Elementor\Controls_Manager::SWITCHER,
			'label'   => esc_html__( 'Show Category / Subheading', 'rhye' ),
			'default' => 'yes',
		]
	);

	$page->add_control(
		'page_masthead_text_enabled',
		[
			'type'    => \Elementor\Controls_Manager::SWITCHER,
			'label'   => esc_html__( 'Show Text', 'rhye' ),
			'default' => '',
		]
	);

	$page->add_control(
		'page_masthead_headline_enabled',
		[
			'type'    => \Elementor\Controls_Manager::SWITCHER,
			'label'   => esc_html__( 'Show Headline', 'rhye' ),
			'default' => 'yes',
		]
	);

	$page->add_control(
		'page_masthead_scroll_down_enabled',
		[
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label'     => esc_html__( 'Show Scroll Down', 'rhye' ),
			'default'   => '',
			'condition' => [
				'page_masthead_layout' => [ 'fullscreen', 'halfscreen-image-left', 'halfscreen-image-left-properties', 'halfscreen-image-right', 'halfscreen-image-right-properties' ],
			],
		]
	);

	$page->end_controls_section();

}
