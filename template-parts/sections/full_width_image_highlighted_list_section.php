<?php
/**
 * Full width image and highlighted list section layout.
 *
 * @package Simontsao
 */

$section_heading        = get_sub_field( 'section_heading' );
$top_image              = get_sub_field( 'top_image' );
$body_content           = get_sub_field( 'body_content' );
$list_intro             = get_sub_field( 'list_intro' );
$list_items             = get_sub_field( 'list_items' );
$bottom_highlight_note  = get_sub_field( 'bottom_highlight_note' );
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-sm-lg">
		<div class="row">
			<div class="text-left col-lg-12 mt-lg-5 col-sm-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="mb-4 text-primary"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php
				if ( $top_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$top_image,
						[
							'class'         => 'img-fluid mx-auto d-block',
							'alt'           => $top_image['alt'] ?? '',
							'sizes'         => '(max-width: 991px) 100vw, 1000px',
							'lazy'          => true,
							'fetchpriority' => 'auto',
							'fallback_size' => 'large',
							'image_sizes'   => [ 'medium_large', 'large', '1536x1536', '2048x2048' ],
						]
					);
				}
				?>

				<?php if ( $body_content ) : ?>
					<div class="mt-lg-4 mt-5">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $list_intro ) : ?>
					<p><?php echo nl2br( esc_html( $list_intro ) ); ?></p>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div>
						<ul class="custom-list">
							<?php foreach ( $list_items as $item ) : ?>
								<?php if ( ! empty( $item['lead_text'] ) || ! empty( $item['supporting_text'] ) ) : ?>
									<li>
										<p>
											<?php if ( ! empty( $item['lead_text'] ) ) : ?>
												<b style="color: #FF0080;"><?php echo esc_html( $item['lead_text'] ); ?></b>
											<?php endif; ?>
											<?php if ( ! empty( $item['lead_text'] ) && ! empty( $item['supporting_text'] ) ) : ?>
												<?php echo esc_html( ' - ' ); ?>
											<?php endif; ?>
											<?php if ( ! empty( $item['supporting_text'] ) ) : ?>
												<?php echo nl2br( esc_html( $item['supporting_text'] ) ); ?>
											<?php endif; ?>
										</p>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( $bottom_highlight_note ) : ?>
					<p class="float-lg-none background-pink pt-lg-3 pb-lg-3 pl-lg-3 pr-lg-3 text-lg-center mt-lg-5 mt-5 pt-3 pb-3 pl-3 pr-3 pt-md-4 pb-md-4 pl-md-4 pr-md-4">
						<?php echo nl2br( esc_html( $bottom_highlight_note ) ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
