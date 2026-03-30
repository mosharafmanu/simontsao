<?php
/**
 * Callout + list section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$highlight_text  = get_sub_field( 'highlight_text' );
$body_content    = get_sub_field( 'body_content' );
$list_items      = get_sub_field( 'list_items' );
?>

<div class="bloc section section-light">
	<div class="container bloc-sm-lg bloc-sm bloc-md" style="background-color:#FAF6F7;">
		<div class="row">
			<div class="col-lg-12 col-md-12 mb-lg-4">
				<?php if ( $section_heading ) : ?>
					<h2 class="mb-4 text-primary"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="callout-list-section__content mb-lg-3 mb-3">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div class="mb-lg-3 mb-3">
						<ul class="custom-list">
							<?php foreach ( $list_items as $item ) : ?>
								<?php if ( ! empty( $item['item'] ) ) : ?>
									<li><?php echo esc_html( $item['item'] ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
