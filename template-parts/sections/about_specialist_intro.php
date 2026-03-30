<?php
/**
 * About specialist intro section layout.
 *
 * @package Simontsao
 */

$main_heading             = get_sub_field( 'main_heading' );
$subheading               = get_sub_field( 'subheading' );
$highlight_text           = get_sub_field( 'highlight_text' );
$specialist_heading       = get_sub_field( 'specialist_heading' );
$specialist_content       = get_sub_field( 'specialist_content' );
$expertise_heading        = get_sub_field( 'expertise_heading' );
$expertise_content        = get_sub_field( 'expertise_content' );
$supporting_links_content = get_sub_field( 'supporting_links_content' );
$profile_image            = get_sub_field( 'profile_image' );
?>

<div class="bloc section section-light" id="surgical-specialist">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="align-self-start col-12 col-sm-12 col-lg-4">
				<?php
				if ( $profile_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$profile_image,
						[
							'class'         => 'img-fluid rounded-circle mx-auto d-block img-protected',
							'alt'           => $profile_image['alt'] ?? '',
							'sizes'         => '(max-width: 991px) 100vw, 360px',
							'lazy'          => true,
							'fetchpriority' => 'auto',
							'fallback_size' => 'medium_large',
							'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
						]
					);
				}
				?>
			</div>

			<div class="order-1 pt-5 pt-lg-0 col-sm-12 col-lg-8">
				<?php if ( $main_heading ) : ?>
					<h1 class="mg-md mx-auto d-block text-lg-left text-primary text-center"><?php echo esc_html( $main_heading ); ?></h1>
				<?php endif; ?>

				<?php if ( $subheading ) : ?>
					<h2 class="text-primary text-center pt-5 text-lg-left pt-lg-0"><?php echo nl2br( esc_html( $subheading ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent mt-4">
						<p class="mt-lg-4"><?php echo nl2br( esc_html( $highlight_text ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $specialist_heading ) : ?>
					<h3 class="text-primary pt-5"><?php echo esc_html( $specialist_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $specialist_content ) : ?>
					<div class="about-specialist-intro__content">
						<?php echo wp_kses_post( $specialist_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $expertise_heading ) : ?>
					<h3 class="text-primary pt-5"><?php echo esc_html( $expertise_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $expertise_content ) : ?>
					<div class="about-specialist-intro__content">
						<?php echo wp_kses_post( $expertise_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $supporting_links_content ) : ?>
					<div class="mb-4 h5 about-specialist-intro__links">
						<?php echo wp_kses_post( $supporting_links_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
