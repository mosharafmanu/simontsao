<?php
/**
 * Recovery guide section layout.
 *
 * @package Simontsao
 */

$section_heading       = get_sub_field( 'section_heading' );
$highlight_text        = get_sub_field( 'highlight_text' );
$body_content          = get_sub_field( 'body_content' );
$guide_groups          = get_sub_field( 'guide_groups' );
?>

<div class="bloc section bg-repeat section-light">
	<div class="container bloc-lg b-divider bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 mt-lg-5 mb-5 text-lg-center"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="callout-accent"><?php echo nl2br( esc_html( $highlight_text ) ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="recovery-guide-section__content mb-lg-5 mt-5">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $guide_groups ) : ?>
					<div class="recovery-guide-section__groups mt-5">
						<?php foreach ( $guide_groups as $group ) : ?>
							<?php
							$group_heading = $group['group_heading'] ?? '';
							$group_items   = $group['group_items'] ?? [];
							?>
							<?php if ( $group_heading ) : ?>
								<h3 class="text-primary mb-4"><?php echo esc_html( $group_heading ); ?></h3>
							<?php endif; ?>

							<?php if ( $group_items ) : ?>
								<ul class="custom-list">
									<?php foreach ( $group_items as $item ) : ?>
										<?php
										$lead_text       = $item['lead_text'] ?? '';
										$supporting_text = $item['supporting_text'] ?? '';
										?>
										<?php if ( $lead_text || $supporting_text ) : ?>
											<li>
												<p>
													<?php if ( $lead_text ) : ?>
														<span class="year"><?php echo esc_html( $lead_text ); ?></span>
													<?php endif; ?>
													<?php if ( $lead_text && $supporting_text ) : ?>
														<?php echo esc_html( ' - ' ); ?>
													<?php endif; ?>
													<?php if ( $supporting_text ) : ?>
														<?php echo esc_html( $supporting_text ); ?>
													<?php endif; ?>
												</p>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
