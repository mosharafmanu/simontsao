<?php
/**
 * Heading, intro, and card grid section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$intro_text      = get_sub_field( 'intro_text' );
$cards           = get_sub_field( 'cards' );
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_text ) : ?>
					<h5 class="pt-5 text-lg-center"><?php echo wp_kses_post( $intro_text ); ?></h5>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $cards ) : ?>
			<div class="row mt-lg-5 mb-lg-5">
				<?php foreach ( $cards as $index => $card ) : ?>
					<?php
					$image = $card['image'] ?? null;
					$title = $card['title'] ?? '';
					$link  = $card['link'] ?? null;
					$body  = $card['body_content'] ?? '';

					$card_classes = 'col-sm-12 col-lg-6 col-md-6 mt-lg-5 mt-sm-5 mt-5';
					if ( 1 === (int) $index || 2 === (int) $index ) {
						$card_classes .= ' mb-sm-5';
					}
					?>
					<div class="<?php echo esc_attr( $card_classes ); ?>">
						<?php
						if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
							simontsao_render_responsive_picture(
								$image,
								[
									'class'         => 'img-fluid mx-auto d-block img-hospital--style mt-5 img-protected mb-0 mb-lg-5 mb-sm-5',
									'sizes'         => '(max-width: 991px) 100vw, 213px',
									'lazy'          => true,
									'fetchpriority' => 'auto',
									'fallback_size' => 'medium',
									'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
								]
							);
						}
						?>

						<h3 class="mg-md text-primary text-center">
							<?php if ( ! empty( $link['title'] ) ) : ?>
								<a class="link-primary" href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $link['target'] ) && '_blank' === $link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $link['title'] ); ?></a><br>
							<?php elseif ( $title ) : ?>
								<?php echo esc_html( $title ); ?><br>
							<?php endif; ?>
						</h3>

						<?php if ( $body ) : ?>
							<div class="mb-4 text-lg-center text-center">
								<?php echo wp_kses_post( $body ); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
