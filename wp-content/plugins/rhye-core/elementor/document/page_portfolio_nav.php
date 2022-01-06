<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Page Portfolio Navigation in Elementor Document Settings
 */
add_action( 'elementor/element/wp-page/document_settings/after_section_end', 'arts_add_elementor_document_settings_page_portfolio_nav' );
add_action( 'elementor/element/wp-post/document_settings/after_section_end', 'arts_add_elementor_document_settings_page_portfolio_nav' );

function arts_add_elementor_document_settings_page_portfolio_nav( \Elementor\Core\DocumentTypes\PageBase $page ) {

	$post_id           = get_the_ID();
	$post_type         = get_post_type( $post_id );
	$is_portfolio_item = $post_type === 'arts_portfolio_item';

	// not a portfolio post
	if ( ! $is_portfolio_item ) {
		return;
	}

	$page->start_controls_section(
		'page_portfolio_nav_section',
		[
			'label' => esc_html__( 'Page Portfolio Nav', 'rhye' ),
			'tab'   => \Elementor\Controls_Manager::TAB_SETTINGS,
		]
	);

	$page->add_control(
		'page_portfolio_nav_settings_overridden',
		[
			'label'       => esc_html__( 'Override Page Portfolio Nav Settings', 'rhye' ),
			'description' => esc_html__( 'Use custom portfolio navigation settings for this page instead of WordPress Customizer settings', 'rhye' ),
			'type'        => \Elementor\Controls_Manager::SWITCHER,
			'default'     => '',
		]
	);

	$page->add_control(
		'page_portfolio_nav_heading_color_theme',
		[
			'label'     => esc_html__( 'Color Theme', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'page_portfolio_nav_settings_overridden' => 'yes',
			],
		]
	);

	$page->add_control(
		'page_portfolio_nav_background',
		[
			'label'     => esc_html__( 'Background Color', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => get_theme_mod( 'portfolio_nav_background', 'bg-light-1' ),
			'options'   => ARTS_THEME_COLORS_ARRAY,
			'condition' => [
				'page_portfolio_nav_settings_overridden' => 'yes',
			],
		]
	);

	$page->add_control(
		'page_portfolio_nav_theme',
		[
			'label'     => esc_html__( 'Main Elements Color', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SELECT,
			'default'   => get_theme_mod( 'portfolio_nav_theme', 'dark' ),
			'options'   => ARTS_THEME_COLOR_THEMES_ARRAY,
			'condition' => [
				'page_portfolio_nav_settings_overridden' => 'yes',
			],
		]
	);

	$page->add_control(
		'page_portfolio_nav_divider_enabled',
		[
			'label'     => esc_html__( 'Enable Section Divider', 'rhye' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
      'default'   => get_theme_mod( 'portfolio_nav_divider_enabled', true ),
      'return_value' => true,
			'condition' => [
				'page_portfolio_nav_settings_overridden' => 'yes',
			],
		]
  );

	$page->end_controls_section();

}
