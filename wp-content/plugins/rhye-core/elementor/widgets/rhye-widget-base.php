<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Rhye_Widget_Base extends Widget_Base {

	protected static $_instance;

	public static function instance() {
		if ( is_null( static::$_instance ) ) {
			static::$_instance = new static();
		}

		return static::$_instance;
	}

	public function get_name() {}

	public function get_title() {}

	public function get_icon() {
		return 'eicon-plug icon-rhye-widget-static';
	}

	public function get_categories() {
		return [ 'rhye-static' ];
	}

	protected static $_posts, $_post_type, $_data_static_fields = array();

	/**
	 * WordPress DB query for the posts
	 *
	 * @return void
	 */
	protected static function _get_posts() {

		// get class name in lowercase
		$class_name = ( new \ReflectionClass( static::class ) )->getShortName();
		$class_name = strtolower( $class_name );

		$multilingual_cms_elementor_query_all_languages = get_theme_mod( 'multilingual_cms_elementor_query_all_languages', false );

		// filter to change current widget post type
		$args = apply_filters(
			'arts/elementor/' . $class_name . '/query_args', array(
				'post_type'      => static::$_post_type,
				'posts_per_page' => -1,
			)
		);

		if ( $multilingual_cms_elementor_query_all_languages ) {
			$args['lang'] = '';
		}

		$posts               = array();
		$taxonomies          = array();
		$counter             = 0;
		$categories_taxonomy = 'arts_portfolio_category';

		// map default blog categories for the 'post' post type
		if ( $args['post_type'] === 'post' ) {
			$categories_taxonomy = 'category';
		}

		$loop = new \WP_Query( $args );

		if ( $loop->have_posts() ) {

			while ( $loop->have_posts() ) {

				$loop->the_post();

				$posts[ $counter ]['id']                 = get_the_ID();
				$posts[ $counter ]['title']              = get_the_title();
				$posts[ $counter ]['permalink']          = get_the_permalink();
				$posts[ $counter ]['image_id']           = get_post_thumbnail_id();
				$posts[ $counter ]['image_secondary_id'] = arts_get_field( 'secondary_image', $posts[ $counter ]['id'] );
				$posts[ $counter ]['subheading']         = arts_get_field( 'subheading', $posts[ $counter ]['id'] );
				$posts[ $counter ]['text']               = arts_get_field( 'text', $posts[ $counter ]['id'] );
				$post_categories                         = get_the_terms( $posts[ $counter ]['id'], $categories_taxonomy );
				$posts[ $counter ]['categories']         = $post_categories;
				$posts[ $counter ]['categories_names']   = array();
				$posts[ $counter ]['categories_slugs']   = array();
				$posts[ $counter ]['media_gallery']      = arts_get_field( 'media_gallery', $posts[ $counter ]['id'] );

				if ( is_array( $post_categories ) ) {
					foreach ( $post_categories as $item ) {

						$arr = array(
							'slug' => $item->slug,
							'name' => $item->name,
						);

						array_push( $posts[ $counter ]['categories_names'], $item->name );
						array_push( $posts[ $counter ]['categories_slugs'], $item->slug );

						// don't add the same item multiple times
						if ( ! in_array( $arr, $taxonomies ) ) {
							array_push( $taxonomies, $arr );
						}
					}
				}

				$counter++;

			}

			wp_reset_postdata();

		}

		static::$_posts = $posts;
	}

	/**
	 * Get all posts by a pre-set type
	 *
	 * @return void
	 */
	public function get_posts() {
		if ( is_null( static::$_posts ) ) {
			static::_get_posts();
		}

		return static::$_posts;
	}

	/**
	 * Filter out disabled posts
	 *
	 * @return array
	 */
	public function get_posts_to_display() {
		$posts    = $this->get_posts();
		$settings = $this->get_settings_for_display();

		// static data source
		if ( array_key_exists( 'posts_data_source', $settings ) && $settings['posts_data_source'] === 'static' ) {

			if ( is_array( $settings['posts_static'] ) && ! empty( $settings['posts_static'] ) ) {
				foreach ( $settings['posts_static'] as $key => $value ) {

					if ( array_key_exists( 'permalink', $settings['posts_static'][ $key ] ) ) {
						$settings['posts_static'][ $key ]['permalink'] = $settings['posts_static'][ $key ]['permalink']['url'];
					}

					if ( array_key_exists( 'image', $settings['posts_static'][ $key ] ) ) {
						$settings['posts_static'][ $key ]['image_id'] = $settings['posts_static'][ $key ]['image']['id'];
					}

					if ( array_key_exists( 'subheading', $settings['posts_static'][ $key ] ) ) {
						$settings['posts_static'][ $key ]['categories_names'][0] = $settings['posts_static'][ $key ]['subheading'];
						$settings['posts_static'][ $key ]['categories_slugs'][0] = sanitize_title( $settings['posts_static'][ $key ]['subheading'] );
					}
				}
			}

			$posts = $settings['posts_static'];

		} else { // dynamic data source

			// limit posts amount
			if ( $settings['posts_amount']['size'] > 0 ) {
				array_splice( $posts, $settings['posts_amount']['size'] );
			}

			// only "enabled" posts
			$posts = array_filter(
				$posts, function( $item ) {
					$settings = $this->get_settings_for_display();
					return ( array_key_exists( 'enabled' . $item['id'], $settings ) ) && ( $settings[ 'enabled' . $item['id'] ] );
				}
			);

		}

		return $posts;
	}

	/**
	 * Collect the posts categories, remove duplicates
	 *
	 * @return array
	 */
	public function get_taxonomies_to_display( $posts ) {
		$active_taxonomies = [];
		$hicpo_options     = get_option( 'hicpo_options' );
		$is_sortable       = false;

		if ( is_array( $hicpo_options ) && array_key_exists( 'tags', $hicpo_options ) && ! empty( $hicpo_options['tags'] ) ) {
			$hicpo_tags        = $hicpo_options['tags'];
			$is_sortable       = in_array( 'arts_portfolio_category', $hicpo_tags );
		}

		foreach ( $posts as $item ) {
			if ( is_array( $item['categories'] ) ) {
				foreach ( $item['categories'] as $taxonomy ) {

					$arr = array(
						'slug' => $taxonomy->slug,
						'name' => $taxonomy->name,
					);

					// don't add the same item multiple times
					if ( ! in_array( $arr, $active_taxonomies ) ) {
						if ( $is_sortable ) {
							$active_taxonomies[ $taxonomy->term_order ] = $arr;
						} else {
							array_push( $active_taxonomies, $arr );
						}
					}
				}
			}
		}

		if ( $is_sortable ) {
			ksort( $active_taxonomies );
		}

		return $active_taxonomies;
	}

	/**
	 * Helper function: print HTML tag
	 *
	 * @param string $settings_tag_key
	 * @return void
	 */
	public function print_html_tag( $settings_tag_key ) {
		$html_tag = $this->get_settings( esc_attr( $settings_tag_key ) );

		// fallback
		if ( empty( $html_tag ) ) {
			$html_tag = 'div';
		}

		echo $html_tag;
	}

	/**
	 * Select which image to display – primary or secondary
	 * If a secondary featured image is selected but is not set for a post
	 * then it will fallback to a primary featured image.
	 *
	 * @param array  $post
	 * @param string $image_type
	 * @param array  $args
	 * @return void
	 */
	public function get_priority_image_id_to_display( $post, $image_type = 'primary', $args = array() ) {
		if ( ! $post ) {
			return;
		}

		$image_id = '';
		$settings = $this->get_settings_for_display();
		$defaults = array(
			'image_size'         => 'full',
			'id_primary'         => 'image_id',
			'id_secondary'       => 'image_secondary_id',
			'id_video'           => 'video_id',
			'use_featured_video' => array_key_exists( 'featured_video_enabled', $settings ) ? $settings['featured_video_enabled'] : false,
		);

		$args = wp_parse_args( $args, $defaults );

		if ( $args['use_featured_video'] ) {
			$path = wp_get_attachment_image_src( arts_get_field( $post[ $args['id_video'] ], $post['id'] ) );

			if ( $path ) {
				$image_id = $post[ $args['id_video'] ];
				return $image_id;
			}
		}

		if ( $image_type === 'primary' ) {
			$image_id = array_key_exists( $args['id_primary'], $post ) ? $post[ $args['id_primary'] ] : '';
		} else {
			$path = array_key_exists( $args['id_secondary'], $post ) ? wp_get_attachment_image_src( $post[ $args['id_secondary'] ], $args['image_size'] ) : '';
			if ( $path ) {
				$image_id = $post[ $args['id_secondary'] ];
				$image_id = array_key_exists( $args['id_secondary'], $post ) ? $post[ $args['id_secondary'] ] : '';
			} else {
				$image_id = array_key_exists( $args['id_primary'], $post ) ? $post[ $args['id_primary'] ] : '';
			}
		}

		return $image_id;
	}

	/**
	 * Used for widgets with dynamically fetched posts
	 * Prints posts toggles set in the control panel
	 *
	 * @return void
	 */
	public function add_controls_posts_toggles() {
		$posts         = $this->get_posts();
		$post_type     = static::$_post_type;
		$post_type_obj = get_post_type_object( $post_type );

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Posts', 'rhye' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_controls_static_fields();

		if ( ! $posts ) {
			$this->end_controls_section();
			return;
		}

		$this->add_control(
			'dynamic_content_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => sprintf(
					'%1$s <strong>%2$s.</strong> %3$s<br><br>%4$s <a href="%5$s" target="_blank">%6$s</a>',
					esc_html__( 'This widget displays content dynamically from the existing', 'rhye' ),
					$post_type_obj->labels->name,
					esc_html__( 'It\'s not editable directly through Elementor Page Builder.', 'rhye' ),
					esc_html__( 'You can edit or re-order your posts', 'rhye' ),
					admin_url( 'edit.php?post_type=' . $post_type ),
					esc_html__( 'in WordPress admin panel', 'rhye' )
				),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
				'condition'       => [
					'posts_data_source' => 'dynamic',
				],
			]
		);

		$this->add_control(
			'posts_amount',
			[
				'label'     => esc_html__( 'Posts to Display (0 for all)', 'rhye' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'number' => [
						'min'  => 0,
						'max'  => 16,
						'step' => 1,
					],
				],
				'default'   => [
					'unit' => 'number',
					'size' => 0,
				],
				'separator' => 'after',
				'condition' => [
					'posts_data_source' => 'dynamic',
				],
			]
		);

		foreach ( $posts as $index => $item ) {
			/**
			 * Heading Toggle
			 */
			$id = 'heading_toggle' . $item['id'];
			$this->add_control(
				$id,
				[
					'raw'        => sprintf(
						'<h3 class="elementor-control-title"><strong>%1$s</strong>&nbsp;&nbsp;<a href="%2$s" target="_blank"><i class="fa fa-edit"></i></a></h3>',
						$item['title'],
						admin_url( 'post.php?post=' . $item['id'] . '&action=edit' ),
						esc_html__( 'Edit', 'rhye' )
					),
					'type'       => Controls_Manager::RAW_HTML,
					'separator'  => 'before',
					'conditions' => [
						'relation' => 'and',
						'terms'    => [
							[
								'relation' => 'or',
								'terms'    => [
									[
										'name'     => 'posts_amount[size]',
										'operator' => '>',
										'value'    => $index,
									],
									[
										'name'     => 'posts_amount[size]',
										'operator' => '<=',
										'value'    => '0',
									],
								],
							],
							[
								'relation' => 'and',
								'terms'    => [
									[
										'name'     => 'posts_data_source',
										'operator' => '==',
										'value'    => 'dynamic',
									],
								],
							],
						],
					],
				]
			);

			/**
			 * Toggle
			 */
			$id = 'enabled' . $item['id'];
			$this->add_control(
				$id,
				[
					'label'      => esc_html__( 'Enabled', 'rhye' ),
					'type'       => Controls_Manager::SWITCHER,
					'default'    => 'yes',
					'conditions' => [
						'relation' => 'and',
						'terms'    => [
							[
								'relation' => 'or',
								'terms'    => [
									[
										'name'     => 'posts_amount[size]',
										'operator' => '>',
										'value'    => $index,
									],
									[
										'name'     => 'posts_amount[size]',
										'operator' => '<=',
										'value'    => '0',
									],
								],
							],
							[
								'relation' => 'and',
								'terms'    => [
									[
										'name'     => 'posts_data_source',
										'operator' => '==',
										'value'    => 'dynamic',
									],
								],
							],
						],
					],
				]
			);

		}

		$this->end_controls_section();
	}

	/**
	 * Adds controls to handle static data
	 *
	 * @return void
	 */
	public function add_controls_static_fields() {
		$static_fields = static::$_data_static_fields;

		if ( empty( $static_fields ) ) {

			// fallback data source type is "dynamic"
			$this->add_control(
				'posts_data_source',
				[
					'label'   => esc_html__( 'Data Source Type', 'rhye' ),
					'type'    => Controls_Manager::HIDDEN,
					'default' => 'dynamic',
				]
			);

			return;
		}

		$this->add_control(
			'posts_data_source',
			[
				'label'   => esc_html__( 'Data Source Type', 'rhye' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'dynamic' => esc_html__( 'Dynamic', 'rhye' ),
					'static'  => esc_html__( 'Static', 'rhye' ),
				],
				'default' => 'dynamic',
			]
		);

		$repeater = new Repeater();

		if ( in_array( 'title', $static_fields ) ) {
			$repeater->add_control(
				'title',
				[
					'label'   => esc_html__( 'Title', 'rhye' ),
					'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Item...', 'rhye' ),
				]
			);
		}

		if ( in_array( 'subheading', $static_fields ) ) {
			$repeater->add_control(
				'subheading',
				[
					'label'   => esc_html__( 'Subheading / Category', 'rhye' ),
					'type'    => Controls_Manager::TEXT,
					'default' => '',
				]
			);
		}

		if ( in_array( 'text', $static_fields ) ) {
			$repeater->add_control(
				'text',
				[
					'label'   => esc_html__( 'Text', 'rhye' ),
					'type'    => Controls_Manager::TEXTAREA,
					'default' => '',
				]
			);
		}

		if ( in_array( 'permalink', $static_fields ) ) {
			$repeater->add_control(
				'permalink',
				[
					'label'         => esc_html__( 'Link', 'rhye' ),
					'type'          => Controls_Manager::URL,
					'placeholder'   => 'https://...',
					'show_external' => false,
					'default'       => [
						'url'         => '#',
						'is_external' => false,
						'nofollow'    => false,
					],
				]
			);
		}

		if ( in_array( 'image', $static_fields ) ) {
			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Choose Image', 'rhye' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
		}

		$this->add_control(
			'posts_static',
			[
				'type'          => Controls_Manager::REPEATER,
				'fields'        => $repeater->get_controls(),
				'title_field'   => '{{{ title }}}',
				'prevent_empty' => false,
				'condition'     => [
					'posts_data_source' => 'static',
				],
			]
		);
	}

	/**
	 * Add a section with interactive cursor controls
	 *
	 * @return void
	 */
	public function add_controls_cursor_interaction() {
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
					'size' => 1.0,
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
				'default'   => '',
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
				'default'   => '',
				'condition' => [
					'cursor_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'cursor_helper',
			[
				'label'     => esc_html__( 'Cursor Helper', 'rhye' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''      => esc_html__( 'None', 'rhye' ),
					'label' => esc_html__( 'Label', 'rhye' ),
					'icon'  => esc_html__( 'Icon', 'rhye' ),
				],
				'condition' => [
					'cursor_enabled' => 'yes',
				],
			]
		);

		$this->add_control(
			'cursor_label',
			[
				'label'     => esc_html__( 'Label', 'rhye' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '',
				'condition' => [
					'cursor_enabled' => 'yes',
					'cursor_helper'  => 'label',
				],
			]
		);

		$this->add_control(
			'cursor_icon',
			[
				'label'     => esc_html__( 'Icon', 'rhye' ),
				'type'      => Controls_Manager::ICON,
				'condition' => [
					'cursor_enabled' => 'yes',
					'cursor_helper'  => 'icon',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Translate the string values to the correct columns proportion value
	 */
	public function translate_columns_settings( $option ) {
		if ( ! $option ) {
			return 12;
		}

		if ( $option === '2dot4' ) {
			return 2.4;
		}

		return $option;
	}

}
