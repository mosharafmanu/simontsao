<?php
/**
 * Extended illustration content section layout.
 *
 * @package Simontsao
 */

$image_position          = get_sub_field( 'image_position' ) ?: 'left';
$section_heading         = get_sub_field( 'section_heading' );
$body_content            = get_sub_field( 'body_content' );
$continuation_content    = get_sub_field( 'continuation_content' );
$section_image           = get_sub_field( 'section_image' );
$add_heading_top_margin  = (bool) get_sub_field( 'add_heading_top_margin' );
$add_content_top_spacing = (bool) get_sub_field( 'add_content_top_spacing' );

$container_classes      = 'container bloc-lg bloc-md-lg';
$image_column_classes   = 'col-sm-4 text-left align-self-center col-12';
$content_column_classes = 'col-sm-8 text-left offset-0 order-1 col-12';
$heading_classes        = 'mb-4 text-primary';
$image_classes          = 'img-fluid mx-auto d-block img-protected';
$body_classes           = '';
$continuation_classes   = 'mb-4 mt-5';

if ( $add_heading_top_margin ) {
	$heading_classes .= ' mt-5';
}

if ( $add_content_top_spacing ) {
	$content_column_classes .= ' mt-5';
}

if ( 'right' === $image_position ) {
	$image_column_classes   = 'col-sm-4 text-left align-self-center';
	$content_column_classes = 'col-sm-8 text-left';
	$image_classes          = 'img-fluid mx-auto d-block mt-lg-3 mb-lg-5 img-protected';
	$body_classes           = 'mb-4';
} else {
	$image_column_classes .= ' text-lg-center';
}
?>

<div class="bloc section section-light">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="row">
			<?php if ( 'left' === $image_position ) : ?>
				<div class="<?php echo esc_attr( $image_column_classes ); ?>">
					<?php
					if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$section_image,
							[
								'class'         => $image_classes,
								'sizes'         => '(max-width: 991px) 100vw, 360px',
								'lazy'          => true,
								'fetchpriority' => 'auto',
								'fallback_size' => 'medium',
								'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
							]
						);
					}
					?>
				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr( $content_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="<?php echo esc_attr( $heading_classes ); ?>"><?php echo wp_kses_post( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="<?php echo esc_attr( $body_classes ); ?>">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( 'right' === $image_position ) : ?>
				<div class="<?php echo esc_attr( $image_column_classes ); ?>">
					<?php
					if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$section_image,
							[
								'class'         => $image_classes,
								'sizes'         => '(max-width: 991px) 100vw, 360px',
								'lazy'          => true,
								'fetchpriority' => 'auto',
								'fallback_size' => 'medium',
								'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
							]
						);
					}
					?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $continuation_content ) : ?>
			<div class="row">
				<div class="col">
					<div class="<?php echo esc_attr( $continuation_classes ); ?>">
						<?php echo wp_kses_post( $continuation_content ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
