<?php
/**
 * Media and content section layout.
 *
 * @package Simontsao
 */

$section_heading          = get_sub_field( 'section_heading' );
$content_blocks           = get_sub_field( 'content_blocks' );
$supporting_links_content = get_sub_field( 'supporting_links_content' );
$image                    = get_sub_field( 'image' );
$media_position           = get_sub_field( 'media_position' ) ?: 'left';
$add_divider              = (bool) get_sub_field( 'add_divider' );

$outer_classes     = 'bloc section section-light';
$container_classes = 'container bloc-lg bloc-md-lg';
$text_col_classes  = 'order-1 col-12 col-sm-12 col-lg-8';
$media_col_classes = 'align-self-start col-12 col-sm-12 col-lg-4';

if ( $add_divider ) {
	$container_classes .= ' b-divider';
}

if ( 'right' === $media_position ) {
	$text_col_classes  = 'order-1 col-12 col-sm-12 col-lg-8 order-lg-1 bloc-style';
	$media_col_classes = 'col-12 col-sm-12 col-lg-4 order-lg-2';
}
?>

<div class="<?php echo esc_attr( $outer_classes ); ?>">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="row">
			<?php if ( 'left' === $media_position ) : ?>
				<div class="<?php echo esc_attr( $media_col_classes ); ?>">
					<?php
					if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$image,
							[
								'class'         => 'img-fluid mx-auto d-block img-rd-lg',
								'alt'           => $image['alt'] ?? '',
								'sizes'         => '(max-width: 991px) 100vw, 330px',
								'lazy'          => true,
								'fetchpriority' => 'auto',
								'fallback_size' => 'medium_large',
								'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
							]
						);
					}
					?>
				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr( $text_col_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $content_blocks ) : ?>
					<?php foreach ( $content_blocks as $index => $block ) : ?>
						<?php if ( ! empty( $block['heading'] ) ) : ?>
							<h3 class="text-primary pt-5"><?php echo esc_html( $block['heading'] ); ?></h3>
						<?php endif; ?>

						<?php if ( ! empty( $block['content'] ) ) : ?>
							<div class="media-content-section__content">
								<?php echo wp_kses_post( $block['content'] ); ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if ( $supporting_links_content ) : ?>
					<div class="mb-4 h5 media-content-section__links">
						<?php echo wp_kses_post( $supporting_links_content ); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( 'right' === $media_position ) : ?>
				<div class="<?php echo esc_attr( $media_col_classes ); ?>">
					<?php
					if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$image,
							[
								'class'         => 'img-fluid mx-auto d-block img-rd-lg',
								'alt'           => $image['alt'] ?? '',
								'sizes'         => '(max-width: 991px) 100vw, 330px',
								'lazy'          => true,
								'fetchpriority' => 'auto',
								'fallback_size' => 'medium_large',
								'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
							]
						);
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
