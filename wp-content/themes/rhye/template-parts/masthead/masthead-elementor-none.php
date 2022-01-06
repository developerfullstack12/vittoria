<?php

global $post;

$titles        = arts_set_page_title();
$page_title    = $titles[0];
$page_subtitle = $titles[1];
$page_text     = $titles[2];

$has_post_thumbnail = has_post_thumbnail();

$attrs_section  = '';
$class_section  = ' ' . arts_get_document_option( 'page_masthead_background' );
$class_section .= ' ' . arts_get_document_option( 'page_masthead_content_alignment' );
$class_section .= ' ' . arts_get_document_option( 'page_masthead_pt' );
$class_section .= ' ' . arts_get_document_option( 'page_masthead_pb' );
$class_section .= ' ' . arts_get_document_option( 'page_masthead_mt' );
$class_section .= ' ' . arts_get_document_option( 'page_masthead_mb' );

$class_inner = arts_get_document_option( 'page_masthead_content_container' );
$class_image = arts_get_document_option( 'page_masthead_image_alignment' );

$page_masthead_theme = arts_get_document_option( 'page_masthead_theme' );

if ( $page_masthead_theme ) {
	$attrs_section = 'data-arts-theme-text=' . $page_masthead_theme;
}

$page_masthead_heading_preset    = arts_get_document_option( 'page_masthead_heading_preset' );
$page_masthead_subheading_preset = arts_get_document_option( 'page_masthead_subheading_preset' );
$page_masthead_text_preset       = arts_get_document_option( 'page_masthead_text_preset' );
$page_masthead_text_enabled      = arts_get_document_option( 'page_masthead_text_enabled' );
$page_masthead_headline_enabled  = arts_get_document_option( 'page_masthead_headline_enabled' );

$page_color_theme_curtain = arts_get_document_option( 'page_masthead_background' );
$page_curtain_color       = get_theme_mod( esc_attr( $page_color_theme_curtain ), '#eeece6' );

?>

<section class="section section-masthead <?php echo esc_attr( trim( $class_section ) ); ?>" data-arts-os-animation="true" data-background-color="<?php echo esc_attr( $page_curtain_color ); ?>" <?php echo esc_attr( $attrs_section ); ?>>
	<div class="section-masthead__inner <?php echo esc_attr( $class_inner ); ?>">
		<header class="row section-masthead__header">
			<div class="col-12">
				<?php if ( ! empty( $page_subtitle ) ) : ?>
					<div class="section-masthead__subheading mt-0 mb-1 mb-md-2 <?php echo esc_attr( $page_masthead_subheading_preset ); ?> split-text js-split-text" data-split-text-type="lines,words" data-split-text-set="words"><?php echo esc_html( $page_subtitle ); ?></div>
					<div class="w-100"></div>
				<?php endif; ?>
				<?php if ( ! empty( $page_title ) ) : ?>
					<h1 class="entry-title section-masthead__heading my-0 <?php echo esc_attr( $page_masthead_heading_preset ); ?> split-text js-split-text" data-split-text-type="lines,words" data-split-text-set="words"><?php echo esc_html( $page_title ); ?></h1>
					<div class="w-100"></div>
				<?php endif; ?>
				<?php if ( $page_masthead_headline_enabled ) : ?>
					<div class="section-masthead__headline section__headline mt-2"></div>
				<?php endif; ?>
				<?php if ( $page_masthead_text_enabled && ! empty( $page_text ) ) : ?>
					<div class="section-masthead__text mt-2 <?php echo esc_attr( $page_masthead_text_preset ); ?> split-text js-split-text" data-split-text-type="lines" data-split-text-set='lines'><?php echo wp_kses( $page_text, wp_kses_allowed_html( 'post' ) ); ?></div>
				<?php endif; ?>
			</div>
		</header>
	</div>
</section>
