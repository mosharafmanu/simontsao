<?php
/**
 * Cancer journey timeline section layout.
 *
 * @package Simontsao
 */

$intro_heading  = get_sub_field( 'intro_heading' );
$intro_content  = get_sub_field( 'intro_content' );
$timeline_items = get_sub_field( 'timeline_items' );
?>

<?php if ( $intro_heading || $intro_content ) : ?>
	<div class="bloc section bg-soft section-light">
		<div class="container bloc-lg">
			<div class="row">
				<div class="col">
					<?php if ( $intro_heading ) : ?>
						<h2 class="mg-md text-primary text-lg-center"><?php echo esc_html( $intro_heading ); ?></h2>
					<?php endif; ?>

					<?php if ( $intro_content ) : ?>
						<div class="cancer-journey-timeline-section__intro">
							<?php echo wp_kses_post( $intro_content ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ( $timeline_items ) : ?>
	<div class="bloc section section-light">
		<div class="container bloc-no-padding-lg bloc-no-padding-md bloc-no-padding-sm bloc-no-padding">
			<?php foreach ( $timeline_items as $index => $item ) : ?>
				<?php
				$is_odd          = 0 === $index % 2;
				$stage_title     = $item['stage_title'] ?? '';
				$stage_image     = $item['stage_image'] ?? null;
				$body_content    = $item['body_content'] ?? '';
				$reading_heading = $item['reading_heading'] ?? '';
				$reading_content = $item['reading_content'] ?? '';
				?>
				<div class="row">
					<?php if ( $is_odd ) : ?>
						<div class="col left-heading-align d-sm-block d-none align-self-center order-sm-2 order-lg-0">
							<?php if ( $stage_title ) : ?>
								<h2 class="h2-padding-top d-sm-block d-none mg-md mx-auto d-block text-lg-right text-primary"><?php echo esc_html( $stage_title ); ?></h2>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="col-1 <?php echo $is_odd ? 'order-lg-1 order-sm-1' : 'order-0 order-sm-1'; ?>">
						<div class="custom-line">
							<p class="p-style text-lg-center mg-clear float-lg-none">&#10687;</p>
						</div>
					</div>

					<div class="col content-column align-self-center <?php echo $is_odd ? 'order-lg-2' : 'order-1 order-sm-0'; ?>">
						<?php if ( $stage_title ) : ?>
							<h2 class="mg-md d-sm-none d-block text-primary"><?php echo esc_html( $stage_title ); ?></h2>
						<?php endif; ?>

						<?php
						if ( $stage_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
							simontsao_render_responsive_picture(
								$stage_image,
								[
									'class'         => 'img-fluid mx-auto d-block img-rd-lg',
									'alt'           => $stage_image['alt'] ?? '',
									'sizes'         => '(max-width: 991px) 100vw, 466px',
									'lazy'          => true,
									'fetchpriority' => 'auto',
									'fallback_size' => 'medium_large',
									'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
								]
							);
						}
						?>

						<?php if ( $body_content ) : ?>
							<div class="cancer-journey-timeline-section__content mg-md">
								<?php echo wp_kses_post( $body_content ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $reading_heading ) : ?>
							<h4 class="mg-md text-primary"><?php echo esc_html( $reading_heading ); ?></h4>
						<?php endif; ?>

						<?php if ( $reading_content ) : ?>
							<div class="cancer-journey-timeline-section__reading">
								<?php echo wp_kses_post( $reading_content ); ?>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( ! $is_odd ) : ?>
						<div class="col left-heading-align d-sm-block d-none align-self-center order-sm-1 order-lg-0">
							<?php if ( $stage_title ) : ?>
								<h2 class="h2-padding-top d-sm-block d-none mg-md text-lg-left text-primary"><?php echo esc_html( $stage_title ); ?></h2>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
