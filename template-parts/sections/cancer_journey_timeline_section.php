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

<div>
	<?php if ( $intro_heading || $intro_content ) : ?>
		<div class="bloc section bg-soft section-light">
			<div class="container bloc-lg">
				<div class="row">
					<div class="col">
						<?php if ( $intro_heading ) : ?>
							<h2 class="mg-md text-primary text-lg-center h1"><?php echo esc_html( $intro_heading ); ?></h2>
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
					$is_odd                 = 0 === $index % 2;
					$is_first_odd           = 0 === $index;
					$stage_title            = $item['stage_title'] ?? '';
					$stage_image            = $item['stage_image'] ?? null;
					$body_content           = $item['body_content'] ?? '';
					$reading_heading        = $item['reading_heading'] ?? '';
					$reading_content        = $item['reading_content'] ?? '';
					$desktop_heading_classes = 'h2-padding-top d-sm-block d-none mg-md text-primary';

					if ( $is_odd ) {
						$desktop_heading_classes .= $is_first_odd
							? ' mx-auto d-block text-lg-right scroll-fx-left-in'
							: ' text-lg-left float-lg-right scroll-fx-left-in';
					} else {
						$desktop_heading_classes .= ' mx-auto d-block text-lg-left scroll-fx-right-in';
					}
					?>
					<div class="row">
						<?php if ( $is_odd ) : ?>
							<div class="col left-heading-align d-sm-block d-none align-self-center order-sm-2 order-lg-0">
								<?php if ( $stage_title ) : ?>
									<h2 class="<?php echo esc_attr( $desktop_heading_classes ); ?>"><?php echo esc_html( $stage_title ); ?></h2>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<div class="col-1 <?php echo esc_attr( $is_odd ? 'order-lg-1 order-sm-1 animated fadeInDown' : 'order-0 order-sm-1 animated fadeInDown' ); ?>" data-appear-anim-style="fadeInDown">
							<div class="custom-line animated fadeInDown" data-appear-anim-style="fadeInDown">
								<p class="p-style text-lg-center mg-clear float-lg-none animated fadeInDown" data-appear-anim-style="fadeInDown">&#10687;</p>
							</div>
						</div>

						<div class="col content-column align-self-center <?php echo $is_odd ? 'order-lg-2' : 'order-1 order-sm-0'; ?>">
							<?php if ( $stage_title ) : ?>
								<h2 class="mg-md d-sm-none d-block scroll-fx-right-in text-primary"><?php echo esc_html( $stage_title ); ?></h2>
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
							<div class="col left-heading-align d-sm-block d-none align-self-center <?php echo esc_attr( ( 0 === $index % 4 ) ? 'order-sm-1 order-lg-0' : 'order-sm-1' ); ?>">
								<?php if ( $stage_title ) : ?>
									<h2 class="<?php echo esc_attr( $desktop_heading_classes ); ?>"><?php echo esc_html( $stage_title ); ?></h2>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
