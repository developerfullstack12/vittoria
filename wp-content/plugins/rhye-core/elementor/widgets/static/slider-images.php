<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Rhye_Widget_Slider_Images extends Rhye_Widget_Base {

	protected static $_instance = null;

	public function get_name() {
		return 'rhye-widget-slider-images';
	}

	public function get_title() {
		return esc_html__( 'Slider Images', 'rhye' );
	}

	public function get_icon() {
		return 'eicon-plug icon-rhye-widget-static';
	}

	public function get_categories() {
		return [ 'rhye-static' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Images', 'rhye' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'images_gallery',
			[
				'type'    => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'label'   => esc_html__( 'Thumbnail Size', 'rhye' ),
				'name'    => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
			]
		);

		$this->add_control(
			'images_fullwidth_enabled',
			[
				'label'   => esc_html__( 'Enable Fullwidth', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_section',
			[
				'label' => esc_html__( 'Slider', 'rhye' ),
				'tab'   => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'slides_heading',
			[
				'label' => esc_html__( 'Slides', 'rhye' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'speed',
			[
				'label'   => esc_html__( 'Speed', 'rhye' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => [
					'ms' => [
						'min'  => 100,
						'max'  => 10000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'ms',
					'size' => 1200,
				],
			]
		);

		$this->add_responsive_control(
			'slides_per_view',
			[
				'label'           => esc_html__( 'Slides Per Screen', 'rhye' ),
				'type'            => Controls_Manager::SLIDER,
				'range'           => [
					'number' => [
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 3.5,
					'unit' => 'number',
				],
				'tablet_default'  => [
					'size' => 1.33,
					'unit' => 'number',
				],
				'mobile_default'  => [
					'size' => 1.33,
					'unit' => 'number',
				],
			]
		);

		$this->add_responsive_control(
			'centered_slides',
			[
				'label'           => esc_html__( 'Horizontaly Centered Slides', 'rhye' ),
				'label_block'     => true,
				'type'            => Controls_Manager::SWITCHER,
				'desktop_default' => true,
				'tablet_default'  => true,
				'mobile_default'  => true,
			]
		);

		$this->add_control(
			'vertical_centered_slides',
			[
				'label'   => esc_html__( 'Vertically Centered Slides', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label'           => esc_html__( 'Space Between Slides', 'rhye' ),
				'type'            => Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min'  => 0,
						'max'  => 160,
						'step' => 1,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 20,
					'unit' => 'px',
				],
			]
		);

		$this->add_control(
			'autoplay_heading',
			[
				'label'     => esc_html__( 'Autoplay', 'rhye' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'autoplay_enabled',
			[
				'label'   => esc_html__( 'Enable Autoplay', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_delay',
			[
				'label'     => esc_html__( 'Delay (ms)', 'rhye' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'ms' => [
						'min'  => 1000,
						'max'  => 60000,
						'step' => 100,
					],
				],
				'default'   => [
					'unit' => 'ms',
					'size' => 6000,
				],
				'condition' => [
					'autoplay_enabled' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'controls_section',
			[
				'label' => esc_html__( 'Controls', 'rhye' ),
				'tab'   => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'dots_heading',
			[
				'label' => esc_html__( 'Dots', 'rhye' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'dots_enabled',
			[
				'label'   => esc_html__( 'Enable Dots', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'counter_heading',
			[
				'label'     => esc_html__( 'Counter', 'rhye' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'counter_enabled',
			[
				'label'   => esc_html__( 'Enable Counter', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'counter_style',
			[
				'label'     => esc_html__( 'Counter Style', 'rhye' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'roman',
				'options'   => [
					'roman'  => esc_html__( 'Roman', 'rhye' ),
					'arabic' => esc_html__( 'Arabic', 'rhye' ),
				],
				'condition' => [
					'counter_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'counter_zeros',
			[
				'label'     => esc_html__( 'Counter Prefix', 'rhye' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 2,
				'options'   => [
					0 => esc_html__( 'None', 'rhye' ),
					1 => esc_html__( '1 Zero', 'rhye' ),
					2 => esc_html__( '2 Zeros', 'rhye' ),
				],
				'condition' => [
					'counter_style'  => 'arabic',
					'counter_enabled' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'interaction_section',
			[
				'label' => esc_html__( 'Interaction', 'rhye' ),
				'tab'   => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'mouse_heading',
			[
				'label' => esc_html__( 'Mouse', 'rhye' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'mouse_cursor_enabled',
			[
				'label'   => esc_html__( 'Enable Mouse Dragging', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'on_drag_cursor_class',
			[
				'label'       => esc_html__( 'On Mouse Drag Class', 'rhye' ),
				'description' => sprintf(
					'%1s: <strong>slider-images_touched</strong><br>%2s',
					esc_html__( 'Default', 'rhye' ),
					esc_html__( 'CSS class WITHOUT the dot that will be temporarily applied to the slider during the dragging.', 'rhye' )
				),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'slider-images_touched', 'rhye' ),
				'condition'   => [
					'mouse_cursor_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'touch_heading',
			[
				'label'     => esc_html__( 'Touch', 'rhye' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'touch_ratio',
			[
				'label'   => esc_html__( 'Touch Ratio', 'rhye' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => [
					'px' => [
						'min'  => 1,
						'max'  => 4,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
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
				'label'   => esc_html__( 'Enable Parallax', 'rhye' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'image_parallax_speed',
			[
				'label'     => esc_html__( 'Parallax Speed', 'rhye' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'factor' => [
						'min'  => 0.0,
						'max'  => 0.5,
						'step' => 0.1,
					],
				],
				'default'   => [
					'unit' => 'factor',
					'size' => 0.1,
				],
				'condition' => [
					'image_parallax' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
			'section', [
				'class' => [ 'section', 'section-slider-images' ],
			]
		);

		$this->add_render_attribute(
			'slide_wrapper', [
				'class' => [ 'w-100', 'h-100' ],
			]
		);

		$this->add_render_attribute(
			'swiper', [
				'class'                       => [ 'swiper-container', 'js-slider-images__slider' ],
				'data-speed'                  => $settings['speed']['size'],
				'data-slides-per-view'        => $settings['slides_per_view']['size'],
				'data-slides-per-view-tablet' => $settings['slides_per_view_tablet']['size'],
				'data-slides-per-view-mobile' => $settings['slides_per_view_mobile']['size'],
				'data-space-between'          => $settings['space_between']['size'],
				'data-space-between-tablet'   => $settings['space_between_tablet']['size'],
				'data-space-between-mobile'   => $settings['space_between_mobile']['size'],
				'data-centered-slides'        => $settings['centered_slides'],
				'data-centered-slides-tablet' => $settings['centered_slides_tablet'],
				'data-centered-slides-mobile' => $settings['centered_slides_mobile'],
				'data-touch-ratio'            => $settings['touch_ratio']['size'],
				'data-counter-style'          => $settings['counter_style'],
				'data-counter-add-zeros'      => $settings['counter_zeros'],
				'data-auto-height'            => 'true',
			]
		);

		if ( $settings['autoplay_enabled'] ) {
			$this->add_render_attribute(
				'swiper', [
					'data-autoplay-enabled' => 'true',
					'data-autoplay-delay'   => $settings['autoplay_delay']['size'],
				]
			);
		}

		if ( $settings['vertical_centered_slides'] ) {
			$this->add_render_attribute(
				'swiper', [
					'class' => 'slider_vertical-centered',
				]
			);
		}

		if ( $settings['mouse_cursor_enabled'] ) {
			$this->add_render_attribute(
				'swiper', [
					'data-drag-mouse'  => 'true',
					'data-drag-cursor' => 'true',
					'data-drag-class'  => $settings['on_drag_cursor_class'],
				]
			);
		}

		if ( $settings['animation_enabled'] ) {
			$this->add_render_attribute(
				'section', [
					'data-arts-os-animation' => 'true',
				]
			);
		}

		if ( $settings['image_parallax'] && is_array( $settings['image_parallax_speed'] ) && $settings['image_parallax_speed']['size'] > 0 ) {
			$this->add_render_attribute(
				'slide_wrapper', [
					'data-swiper-parallax'      => $settings['image_parallax_speed']['size'] * 100 . '%',
					'data-swiper-parallax-zoom' => $settings['image_parallax_speed']['size'] * 100 . '%',
				]
			);
		}

		?>

		<div <?php $this->print_render_attribute_string( 'section' ); ?>>
			<div class="slider slider-images js-slider-images">
				<?php if ( $settings['counter_enabled'] ) : ?>
					<!-- slider HEADER -->
					<div class="slider-images__header">
						<div class="row no-gutters justify-content-between">
							<div class="col-auto">
								<div class="slider__counter slider__counter_mini">
									<div class="js-slider__counter-current swiper-container">
										<div class="swiper-wrapper"></div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="slider__total slider__total_mini js-slider__counter-total"></div>
							</div>
						</div>
					</div>
					<!-- - slider HEADER -->
				<?php endif; ?>
				<div <?php $this->print_render_attribute_string( 'swiper' ); ?>>
					<div class="swiper-wrapper">
						<?php if ( ! empty( $settings['images_gallery'] ) ) : ?>
							<?php foreach ( $settings['images_gallery'] as $image ) : ?>
								<div class="swiper-slide overflow d-flex-centered text-center">
									<div <?php $this->print_render_attribute_string( 'slide_wrapper' ); ?>>
										<div class="slider__zoom-container w-100 h-100 user-select-none pointer-events-none">
											<?php
												arts_the_lazy_image(
													array(
														'id'   => $image['id'],
														'type' => 'image',
														'size' => $settings['image_size'],
														'class' => array(
															'wrapper' => array(),
															'image'   => array( 'swiper-lazy', $settings['images_fullwidth_enabled'] ? 'w-100' : '' ),
														),
													)
												);
											?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( $settings['dots_enabled'] ) : ?>
					<!-- slider FOOTER -->
					<div class="slider-images__footer">
						<div class="row no-gutters justify-content-center">
							<div class="col-auto">
								<!-- slider DOTS -->
								<div class="slider__dots js-slider__dots"></div>
								<!-- - slider DOTS -->
							</div>
						</div>
					</div>
					<!-- - slider FOOTER -->
				<?php endif; ?>
			</div>
		</div>

		<?php
	}

}
