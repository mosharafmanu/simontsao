<?php
/**
 * Heading, intro, list, and CTA section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$intro_text      = get_sub_field( 'intro_text' );
$body_content    = get_sub_field( 'body_content' );
$list_items      = get_sub_field( 'list_items' );
$cta_content     = get_sub_field( 'cta_content' );
?>

<div class="bloc section bg-repeat section-light">
	<div class="container bloc-lg bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_text ) : ?>
					<h5 class="mb-4 mt-lg-4"><?php echo wp_kses_post( $intro_text ); ?></h5>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="mb-lg-5">
						<?php echo wp_kses_post( $body_content ); ?>

						<?php if ( $list_items ) : ?>
							<ul class="custom-list">
								<?php foreach ( $list_items as $item ) : ?>
									<?php if ( ! empty( $item['item'] ) ) : ?>
										<li><p><?php echo esc_html( $item['item'] ); ?></p></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $cta_content ) : ?>
					<h4 class="text-lg-center mt-lg-5 mt-5">
						<?php echo wp_kses_post( $cta_content ); ?>
					</h4>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
