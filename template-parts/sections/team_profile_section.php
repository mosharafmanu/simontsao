<?php
/**
 * Team profile section layout.
 *
 * @package Simontsao
 */

$section_heading    = get_sub_field( 'section_heading' );
$intro_callout      = get_sub_field( 'intro_callout' );
$profile_image      = get_sub_field( 'profile_image' );
$profile_name       = get_sub_field( 'profile_name' );
$pronouns           = get_sub_field( 'pronouns' );
$highlight_text     = get_sub_field( 'highlight_text' );
$profile_content    = get_sub_field( 'profile_content' );
$show_divider_below = (bool) get_sub_field( 'show_divider_below' );
?>

<div class="bloc section section-light">
	<div class="container bloc-md-lg bloc-md">
		<div class="row">
			<div class="col-lg-12 col-md-12 mb-lg-5">
				<?php if ( $section_heading ) : ?>
					<h2 class="mx-auto d-block text-lg-center text-primary h1"><?php echo wp_kses_post( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_callout ) : ?>
					<div class="blockquote callout-accent mt-4">
						<p class="mt-lg-4"><?php echo wp_kses_post( $intro_callout ); ?></p>
					</div>
				<?php endif; ?>
			</div>

			<div class="align-self-start col-12 col-sm-12 col-lg-4 mt-5 mt-lg-0">
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
							'width'         => 360,
							'height'        => 360,
						]
					);
				}
				?>
			</div>

			<div class="order-1 pt-5 pt-lg-0 col-sm-12 col-lg-8">
				<?php if ( $profile_name ) : ?>
					<h3 class="mg-md mx-auto d-block text-lg-left text-primary text-center h1"><?php echo esc_html( $profile_name ); ?></h3>
				<?php endif; ?>

				<?php if ( $pronouns ) : ?>
					<div class="text-center pt-5 text-lg-left pt-lg-0">
						<?php echo wp_kses_post( $pronouns ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent mt-4">
						<p class="mt-lg-4"><?php echo wp_kses_post( $highlight_text ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $profile_content ) : ?>
					<div class="team-profile-section__content">
						<?php echo wp_kses_post( $profile_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $show_divider_below ) : ?>
			<div class="row">
				<div class="col text-left text-sm-left">
					<div class="divider-h divider-0-background-color"></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
