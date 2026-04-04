<?php
/**
 * Sensation preservation overview section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$highlight_text  = get_sub_field( 'highlight_text' );
$intro_content   = get_sub_field( 'intro_content' );
$list_heading    = get_sub_field( 'list_heading' );
$list_items      = get_sub_field( 'list_items' );
$bottom_heading  = get_sub_field( 'bottom_heading' );
$bottom_content  = get_sub_field( 'bottom_content' );
$section_image   = get_sub_field( 'section_image' );
$image_position  = get_sub_field( 'image_position' ) ?: 'right';

$content_column_classes = 'col-sm-12 col-lg-8 col-md-8';
$image_column_classes   = 'col-sm-12 col-lg-4 col-md-4 mt-lg-5 align-self-start';

if ( 'right' === $image_position ) {
	$content_column_classes .= ' order-sm-2 order-2 order-md-1 order-lg-0';
	$image_column_classes   .= ' order-sm-1';
} else {
	$content_column_classes .= ' order-sm-2';
	$image_column_classes   .= ' order-sm-1';
}
?>

<div class="bloc section section-light" id="understanding-top-surgery">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="<?php echo esc_attr( $content_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center h3-padding-bottom float-none mb-5 text-lg-left"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="mb-lg-5"><?php echo nl2br( esc_html( $highlight_text ) ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $intro_content ) : ?>
					<div>
						<?php echo wp_kses_post( $intro_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $list_heading ) : ?>
					<h3 class="text-primary mt-lg-4 text-center text-lg-left mb-5 mt-5 mb-lg-4"><?php echo esc_html( $list_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div>
						<ul class="custom-list">
							<?php foreach ( $list_items as $item ) : ?>
								<?php
								$lead_text       = $item['lead_text'] ?? '';
								$lead_link       = $item['lead_link'] ?? '';
								$supporting_text = $item['supporting_text'] ?? '';
								?>
								<?php if ( $lead_text || $supporting_text ) : ?>
									<li>
										<p>
											<?php if ( $lead_text ) : ?>
												<span class="year">
													<?php if ( $lead_link ) : ?>
														<a href="<?php echo esc_url( $lead_link ); ?>" style="color:#FF0080; text-decoration:none;"><?php echo esc_html( $lead_text ); ?></a>
													<?php else : ?>
														<?php echo esc_html( $lead_text ); ?>
													<?php endif; ?>
												</span>
											<?php endif; ?>
											<?php if ( $supporting_text ) : ?>
												<br><?php echo nl2br( esc_html( $supporting_text ) ); ?>
											<?php endif; ?>
										</p>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( $bottom_heading ) : ?>
					<h3 class="text-primary mt-lg-4 mt-5 mb-5 mb-lg-4"><?php echo esc_html( $bottom_heading ); ?></h3>
				<?php endif; ?>

				<?php if ( $bottom_content ) : ?>
					<div>
						<?php echo wp_kses_post( $bottom_content ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="<?php echo esc_attr( $image_column_classes ); ?>">
				<?php
				if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$section_image,
						[
							'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-5 img-protected',
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
		</div>
	</div>
</div>
