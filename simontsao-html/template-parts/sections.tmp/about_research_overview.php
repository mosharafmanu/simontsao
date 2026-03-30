<?php
/**
 * About research overview section layout.
 *
 * @package Simontsao
 */

$section_heading          = get_sub_field( 'section_heading' );
$feature_heading          = get_sub_field( 'feature_heading' );
$body_content             = get_sub_field( 'body_content' );
$supporting_links_content = get_sub_field( 'supporting_links_content' );
$image                    = get_sub_field( 'image' );
?>

<div class="bloc section bg-repeat section-light" id="research">
	<div class="container bloc-lg b-divider bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 col-lg-8 order-lg-1 bloc-style">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $feature_heading ) : ?>
					<h3 class="text-primary pt-5"><?php echo esc_html( $feature_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="about-research-overview__content">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $supporting_links_content ) : ?>
					<div class="mb-4 h5 about-research-overview__links">
						<?php echo wp_kses_post( $supporting_links_content ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-12 col-sm-12 col-lg-4 order-lg-2">
				<?php
				if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$image,
						[
							'class'         => 'img-fluid mx-auto d-block img-rd-lg img-research-style',
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
		</div>
	</div>
</div>
