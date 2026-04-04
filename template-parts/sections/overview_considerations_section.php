<?php
/**
 * Overview and considerations section layout.
 *
 * @package Simontsao
 */

$section_heading   = get_sub_field( 'section_heading' );
$highlight_text    = get_sub_field( 'highlight_text' );
$intro_text        = get_sub_field( 'intro_text' );
$pros_items        = get_sub_field( 'pros_items' );
$cons_items        = get_sub_field( 'cons_items' );
$body_content      = get_sub_field( 'body_content' );
$section_image     = get_sub_field( 'section_image' );
$image_row_content = get_sub_field( 'image_row_content' );
$bottom_heading    = get_sub_field( 'bottom_heading' );
$bottom_content    = get_sub_field( 'bottom_content' );
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent mb-lg-5 mt-5">
						<p class="mb-lg-5"><?php echo nl2br( esc_html( $highlight_text ) ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="mt-lg-5 mt-sm-5">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $intro_text || $pros_items || $cons_items ) : ?>
					<div class="mt-lg-5 mt-sm-5">
						<?php if ( $intro_text ) : ?>
							<p><?php echo nl2br( esc_html( $intro_text ) ); ?></p>
						<?php endif; ?>

						<?php if ( $pros_items ) : ?>
							<p><b style="color: #003a5d;">Pros</b></p>
							<ul class="custom-list">
								<?php foreach ( $pros_items as $item ) : ?>
									<?php if ( ! empty( $item['item'] ) ) : ?>
										<li><p><?php echo nl2br( esc_html( $item['item'] ) ); ?></p></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php if ( $cons_items ) : ?>
							<p><b style="color: #003a5d;">Cons</b></p>
							<ul class="custom-list">
								<?php foreach ( $cons_items as $item ) : ?>
									<?php if ( ! empty( $item['item'] ) ) : ?>
										<li><p><?php echo nl2br( esc_html( $item['item'] ) ); ?></p></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $section_image || $image_row_content ) : ?>
					<div class="row mb-lg-5">
						<div class="col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 align-self-center mt-5">
							<?php
							if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
								simontsao_render_responsive_picture(
									$section_image,
									[
										'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-5 mb-lg-0 img-protected',
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
						<div class="col-sm-12 order-sm-2 col-lg-8 col-md-8 align-self-center">
							<?php if ( $image_row_content ) : ?>
								<?php echo wp_kses_post( $image_row_content ); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $bottom_heading || $bottom_content ) : ?>
					<div class="row">
						<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
							<?php if ( $bottom_heading ) : ?>
								<h3 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $bottom_heading ); ?></h3>
							<?php endif; ?>

							<?php if ( $bottom_content ) : ?>
								<?php echo wp_kses_post( $bottom_content ); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
