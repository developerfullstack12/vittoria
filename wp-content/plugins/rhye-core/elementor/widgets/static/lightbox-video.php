<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Rhye_Widget_Lightbox_Video extends Rhye_Widget_Base {

	protected static $_instance = null;

	public function get_name() {
		return 'rhye-widget-lightbox-video';
	}

	public function get_title() {
		return esc_html__( 'Lightbox Video', 'rhye' );
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
					'field'       => 'cursor_label',
					'type'        => sprintf( '<strong>%1$s</strong><br>%2$s', $title, esc_html__( 'Button/Cursor Label', 'rhye' ) ),
					'editor_type' => 'LINE',
				],
				[
					'field'       => 'video_external',
					'type'        => sprintf( '<strong>%1$s</strong><br>%2$s', $title, esc_html__( 'External Video URL', 'rhye' ) ),
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
			'content_section',
			[
				'label' => esc_html__( 'Background', 'rhye' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Background Image', 'rhye' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label'           => esc_html__( 'Background Height', 'rhye' ),
				'type'            => Controls_Manager::SLIDER,
				'desktop_default' => [
					'size' => 800,
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
					'{{WRAPPER}} .section-video' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'image!' => array(
						'id'  => '',
						'url' => '',
					),
				],
			]
		);

		$this->add_responsive_control(
			'background_position_x',
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
					]
				],
				'size_units'      => [ '%' ],
				'selectors'       => [
					'(desktop) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x.SIZE}}{{background_position_x.UNIT}} {{background_position_y.SIZE}}{{background_position_y.UNIT}};',
					'(tablet) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x_tablet.SIZE}}{{background_position_x_tablet.UNIT}} {{background_position_y_tablet.SIZE}}{{background_position_y_tablet.UNIT}};',
					'(mobile) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x_mobile.SIZE}}{{background_position_x_mobile.UNIT}} {{background_position_y_mobile.SIZE}}{{background_position_y_mobile.UNIT}};'
				],
				'condition'       => [
					'image!' => array(
						'id'  => '',
						'url' => '',
					)
				]
			]
		);

		$this->add_responsive_control(
			'background_position_y',
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
					]
				],
				'selectors'       => [
					'(desktop) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x.SIZE}}{{background_position_x.UNIT}} {{background_position_y.SIZE}}{{background_position_y.UNIT}};',
					'(tablet) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x_tablet.SIZE}}{{background_position_x_tablet.UNIT}} {{background_position_y_tablet.SIZE}}{{background_position_y_tablet.UNIT}};',
					'(mobile) {{WRAPPER}} .section-image__wrapper img' => 'object-position: {{background_position_x_mobile.SIZE}}{{background_position_x_mobile.UNIT}} {{background_position_y_mobile.SIZE}}{{background_position_y_mobile.UNIT}};'
				],
				'size_units'      => [ '%' ],
				'condition'       => [
					'image!' => array(
						'id'  => '',
						'url' => '',
					)
				]
			]
		);

		$this->add_control(
			'heading_parallax',
			[
				'label'     => esc_html__( 'Parallax', 'rhye' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_parallax',
			[
				'label'     => esc_html__( 'Enable Parallax', 'rhye' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => [
					'image!' => array(
						'id'  => '',
						'url' => '',
					),
				],
			]
		);

		$this->add_control(
			'image_parallax_speed',
			[
				'label'     => esc_html__( 'Parallax Speed', 'rhye' ),
				'type'      => Controls_Manager::SLIDER,
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
					'image_parallax' => 'yes',
					'image!'         => array(
						'id'  => '',
						'url' => '',
					),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'video_section',
			[
				'label' => esc_html__( 'Video', 'rhye' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'video_type',
			[
				'label'   => esc_html__( 'Video Type', 'rhye' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'self_hosted' => [
						'title' => esc_html__( 'Self Hosted', 'rhye' ),
						'icon'  => 'fa fa-video-camera',
					],
					'external'    => [
						'title' => esc_html__( 'External Source', 'rhye' ),
						'icon'  => 'fa fa-external-link',
					],
				],
				'default' => 'self_hosted',
				'toggle'  => false,
			]
		);

		$this->add_control(
			'video_self_hosted',
			[
				'label'      => esc_html__( 'Choose Video', 'rhye' ),
				'type'       => Controls_Manager::MEDIA,
				'media_type' => 'video',
				'condition'  => [
					'video_type' => 'self_hosted',
				],
			]
		);

		$this->add_control(
			'video_external',
			[
				'label'         => esc_html__( 'External Video URL (YouTube, Vimeo)', 'rhye' ),
				'type'          => Controls_Manager::URL,
				'show_external' => false,
				'condition'     => [
					'video_type' => 'external',
				],
			]
		);

		$this->add_control(
			'video_autoplay_enabled',
			[
				'label'   => esc_html__( 'Enable Autoplay', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

		$this->add_control(
			'animation_type',
			[
				'label'     => esc_html__( 'Animation Type', 'rhye' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'mask_reveal' => esc_html__( 'Mask Reveal', 'rhye' ),
					'jump_up'     => esc_html__( 'Jump Up', 'rhye' ),
				],
				'default'   => 'mask_reveal',
				'condition' => [
					'animation_enabled' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'rhye' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'   => esc_html__( 'Button Background', 'rhye' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'bg-dark-1',
				'options' => ARTS_THEME_COLORS_ARRAY,
			]
		);

		$this->add_control(
			'button_label_color',
			[
				'label'   => esc_html__( 'Label Color', 'rhye' ),
				'type'    => Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,1)',
				'selectors' => [
					'{{WRAPPER}} .section-video__link-inner' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'cursor_label',
			[
				'label'   => esc_html__( 'Label Text', 'rhye' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Play', 'rhye' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'cursor_section',
			[
				'label' => esc_html__( 'Cursor', 'rhye' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cursor_enabled',
			[
				'label'   => esc_html__( 'Enable Cursor Interaction', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'cursor_scale',
			[
				'label'     => esc_html__( 'Scale', 'rhye' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 3,
						'step' => 0.01,
					],
				],
				'default'   => [
					'unit' => 'px',
					'size' => 0.0,
				],
				'condition' => [
					'cursor_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'cursor_hide_native_enabled',
			[
				'label'     => esc_html__( 'Hide Native Cursor', 'rhye' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => [
					'cursor_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'cursor_magnetic_enabled',
			[
				'label'     => esc_html__( 'Enable Magnetic Effect', 'rhye' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => [
					'cursor_enabled' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings             = $this->get_settings_for_display();
		$video_url            = '#';
		$theme_cursor_enabled = get_theme_mod( 'cursor_enabled', false );

		if ( $settings['video_type'] === 'self_hosted' ) {
			$video_url = $settings['video_self_hosted']['url'];
		} else {
			$video_url = $settings['video_external']['url'];
		}

		$this->add_render_attribute(
			'link', [
				'class' => 'section-video__link',
				'href'  => esc_url( $video_url ),
			]
		);

		if ( $settings['video_autoplay_enabled'] ) {
			$this->add_render_attribute(
				'link', [
					'data-autoplay' => 'true',
				]
			);
		}

		$this->add_render_attribute(
			'play', [
				'class'                  => [ 'section-video__link-inner', $settings['button_background_color'] ],
				'data-arts-cursor-label' => empty( $settings['cursor_label'] ) ? 'false' : $settings['cursor_label'],
				'data-arts-cursor-color' => $settings['button_label_color'],
			]
		);

		if ( $settings['cursor_enabled'] && $theme_cursor_enabled ) {
			$this->add_render_attribute(
				'play', arts_get_element_cursor_attributes(
					array(
						'enabled'     => 'true',
						'scale'       => $settings['cursor_scale']['size'],
						'magnetic'    => $settings['cursor_magnetic_enabled'],
						'hide_native' => $settings['cursor_hide_native_enabled'],
						'return'      => 'array',
					)
				)
			);
		}
		?>

		<div class="section section-video js-gallery">
			<div class="section-video__container">
				<a <?php $this->print_render_attribute_string( 'link' ); ?>>
					<div <?php $this->print_render_attribute_string( 'play' ); ?>>
						<div class="section-video__icon material-icons">play_arrow</div>
					</div>
				</a>
				<?php if ( ! empty( $settings['image']['id'] ) ) : ?>
					<div class="section__bg">
						<?php
							arts_the_lazy_image(
								array(
									'id'        => $settings['image']['id'],
									'class'     => array(
										'section' => array( 'section', 'section-image', 'section__bg' ),
										'wrapper' => array( 'section-image__wrapper' ),
									),
									'parallax'  => array(
										'enabled' => $settings['image_parallax'],
										'factor'  => is_array( $settings['image_parallax_speed'] ) ? $settings['image_parallax_speed']['size'] : 0,
									),
									'animation' => $settings['animation_enabled'],
									'mask'      => $settings['animation_enabled'] && $settings['animation_type'] === 'mask_reveal',
								)
							);
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}

}
