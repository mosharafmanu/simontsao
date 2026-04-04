<?php
/**
 * Compact resources section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$list_items      = get_sub_field( 'list_items' );
?>

<div class="bloc section bg-repeat section-light">
	<div class="container bloc-sm-lg bloc-sm">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12 mb-lg-5">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-lg-0 text-lg-left mt-lg-5 mb-5 pt-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div class="mt-lg-5">
						<ul class="custom-list">
							<?php foreach ( $list_items as $item ) : ?>
								<?php if ( ! empty( $item['item'] ) ) : ?>
									<li>
										<p><?php echo wp_kses_post( $item['item'] ); ?></p>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
