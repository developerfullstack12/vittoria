<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Rhye_Widget_Button extends Rhye_Widget_Base {

	protected static $_instance = null;

	public function get_name() {
		return 'rhye-widget-button';
	}

	public function get_title() {
		return esc_html__( 'Button', 'rhye' );
	}

	public function get_icon() {
		return 'eicon-plug icon-rhye-widget-static';
	}

	public function get_categories() {
		return [ 'rhye-static' ];
	}

	public function wpml_widgets_to_translate_filter( $widgets ) {
		$name  = $this->get_name();
		$title = $this->get_title();

		$widgets[ $name ] = [
			'conditions' => [ 'widgetType' => $name ],
			'fields'     => [
				[
					'field'       => 'button_text',
					'type'        => sprintf( '<strong>%1$s</strong><br>%2$s', $title, esc_html__( 'Title', 'rhye' ) ),
					'editor_type' => 'LINE',
				],
				[
					'field'       => 'button_text_hover',
					'type'        => sprintf( '<strong>%1$s</strong><br>%2$s', $title, esc_html__( 'Hover Title', 'rhye' ) ),
					'editor_type' => 'LINE',
				],
				[
					'field'       => 'button_link',
					'type'        => sprintf( '<strong>%1$s</strong><br>%2$s', $title, esc_html__( 'Link', 'rhye' ) ),
					'editor_type' => 'LINE',
				],
			],
		];

		return $widgets;
	}

	public function add_wpml_support() {
		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'rhye' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'   => esc_html__( 'Title', 'rhye' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button...', 'rhye' ),
			]
		);

		$this->add_control(
			'button_text_hover',
			[
				'label'   => esc_html__( 'Hover Title', 'rhye' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button...', 'rhye' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'         => esc_html__( 'Link', 'rhye' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => 'https://...',
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'button_style',
			[
				'label'       => esc_html__( 'Style', 'rhye' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'button_solid'    => esc_html__( 'Solid', 'rhye' ),
					'button_bordered' => esc_html__( 'Bordered', 'rhye' ),
				],
				'default'     => 'button_solid',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'       => esc_html__( 'Color', 'rhye' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => ARTS_THEME_COLORS_ARRAY,
				'default'     => 'bg-dark-1',
			]
		);

		$this->add_responsive_control(
			'button_alignment',
			[
				'label'        => esc_html__( 'Alignment', 'rhye' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'justify' => [
						'title' => esc_html__( 'Fullwidth', 'rhye' ),
						'icon'  => 'fa fa-fw fa-arrows-h',
					],
					'left'    => [
						'title' => esc_html__( 'Left', 'rhye' ),
						'icon'  => 'fa fa-fw fa-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'rhye' ),
						'icon'  => 'fa fa-fw fa-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'rhye' ),
						'icon'  => 'fa fa-fw fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'toggle'       => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'animation_section',
			[
				'label' => esc_html__( 'Animation', 'rhye' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'animation_enabled',
			[
				'label'   => esc_html__( 'Enable On-scroll Animation', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
			'section', [
				'class' => [ 'section', 'section-content' ],
			]
		);

		$this->add_render_attribute(
			'button', [
				'class' => [ 'elementor-button-link', 'button', $settings['button_style'], $settings['button_color'] ],
				'href'  => esc_url( $settings['button_link']['url'] ),
			]
		);

		if ( $settings['button_text_hover'] ) {
			$this->add_render_attribute( 'button', 'data-hover', $settings['button_text_hover'] );
		}

		if ( $settings['button_link']['is_external'] ) {
			$this->add_render_attribute( 'button', 'target', '_blank' );
		}

		if ( $settings['button_link']['nofollow'] ) {
			$this->add_render_attribute( 'button', 'rel', 'nofollow' );
		}

		if ( $settings['animation_enabled'] ) {
			$this->add_render_attribute( 'section', 'data-arts-os-animation', 'true' );
		}

		?>

		<?php if ( $settings['button_text'] ) : ?>
			<div <?php $this->print_render_attribute_string( 'section' ); ?>>
				<div class="section-content__button">
					<a <?php $this->print_render_attribute_string( 'button' ); ?>>
						<span class="button__label-hover"><?php echo $settings['button_text']; ?></span>
					</a>
				</div>
			</div>
		<?php endif; ?>

		<?php
	}

}
