<?php
/**
 * Recovery info section layout.
 *
 * @package Simontsao
 */

$show_divider_above = (bool) get_sub_field( 'show_divider_above' );
$image_position     = get_sub_field( 'image_position' ) ?: 'left';
$section_heading    = get_sub_field( 'section_heading' );
$highlight_text     = get_sub_field( 'highlight_text' );
$intro_content      = get_sub_field( 'intro_content' );
$list_items         = get_sub_field( 'list_items' );
$body_content       = get_sub_field( 'body_content' );
$section_image      = get_sub_field( 'section_image' );

$image_column_classes = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 align-self-start';
$content_column_classes = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';
$heading_classes = 'text-primary text-center mb-5 h3';
$blockquote_classes = 'blockquote callout-accent mb-lg-3';
$callout_paragraph_classes = 'mt-5 mb-5';
$image_classes = 'img-fluid mx-auto d-block img-hospital--style mb-5 img-protected';

if ( 'right' === $image_position ) {
	$image_column_classes = 'text-left mb-5 col-sm-12 col-md-4 order-md-1 mt-md-5 align-self-start';
	$content_column_classes = 'text-left order-1 mt-5 col-sm-12 col-md-8 order-md-0';
	$heading_classes = 'mb-4 text-primary text-lg-center h3';
	$blockquote_classes = 'blockquote callout-accent';
	$callout_paragraph_classes = 'mb-lg-3 mt-5 mb-5';
	$image_classes = 'img-fluid mx-auto d-block mt-lg-3 mb-lg-5 img-protected img-58-style mb-sm-5';
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
}
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="<?php echo esc_attr( $image_column_classes ); ?>">
				<?php
				if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$section_image,
						[
							'class'         => $image_classes,
							'sizes'         => '(max-width: 991px) 100vw, 213px',
							'lazy'          => true,
							'fetchpriority' => 'auto',
							'fallback_size' => 'medium',
							'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
						]
					);
				}
				?>
			</div>

			<div class="<?php echo esc_attr( $content_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="<?php echo esc_attr( $heading_classes ); ?>"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="<?php echo esc_attr( $blockquote_classes ); ?>">
						<p class="<?php echo esc_attr( $callout_paragraph_classes ); ?>"><?php echo nl2br( esc_html( $highlight_text ) ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $intro_content ) : ?>
					<div>
						<?php echo wp_kses_post( $intro_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div>
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<ul class="custom-list">
						<?php foreach ( $list_items as $item ) : ?>
							<?php $bullet_text = $item['bullet_text'] ?? ''; ?>
							<?php if ( $bullet_text ) : ?>
								<li><p><?php echo wp_kses_post( $bullet_text ); ?></p></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
