<?php
/**
 * About treatment principles section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$first_heading   = get_sub_field( 'first_heading' );
$first_content   = get_sub_field( 'first_content' );
$second_heading  = get_sub_field( 'second_heading' );
$second_content  = get_sub_field( 'second_content' );
$image           = get_sub_field( 'image' );
?>

<div class="bloc section section-light" id="treatment-principles">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="align-self-start col-12 col-sm-12 col-lg-4">
				<?php
				if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$image,
						[
							'class'         => 'img-fluid mx-auto d-block img-rd-lg img-breast-screen-style',
							'alt'           => $image['alt'] ?? '',
							'sizes'         => '(max-width: 991px) 100vw, 329px',
							'lazy'          => true,
							'fetchpriority' => 'auto',
							'fallback_size' => 'medium_large',
							'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
						]
					);
				}
				?>
			</div>

			<div class="order-1 col-12 col-sm-12 col-lg-8">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary pt-5 mx-auto d-block text-center pt-lg-0 text-lg-left"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $first_heading ) : ?>
					<h3 class="text-primary pt-5"><?php echo esc_html( $first_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $first_content ) : ?>
					<div class="about-treatment-principles__content">
						<?php echo wp_kses_post( $first_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $second_heading ) : ?>
					<h3 class="text-primary pt-5"><?php echo esc_html( $second_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $second_content ) : ?>
					<div class="about-treatment-principles__content">
						<?php echo wp_kses_post( $second_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
