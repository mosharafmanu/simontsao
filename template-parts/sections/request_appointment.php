<?php
/**
 * Request appointment section layout.
 *
 * @package Simontsao
 */

$button_text     = get_sub_field( 'button_text' );
$form_embed_code = get_sub_field( 'form_embed_code' );
$has_button_text = ! empty( $button_text );
$form_classes    = 'col-lg-10 offset-lg-1';

if ( $has_button_text ) {
	$form_classes .= ' object-hidden';
}
?>

<div class="bloc section text-primary section-light" id="urgent-appointment">
	<div class="container bloc-lg bloc-lg-lg" id="emergency-appointment-form">
		<div class="row" id="fast-appointment">
			<?php if ( $has_button_text ) : ?>
				<div class="col-lg-10 offset-lg-1" id="urgent-appointment-button">
					<div class="text-center" id="appointment-button">
						<button
							type="button"
							class="btn btn-lg btn-style urgent-button button-accent"
							data-toggle-visibility="urgent-appointment-form"
							id="click-here-for-an-appointment"
						>
							<?php echo esc_html( $button_text ); ?>
						</button>
					</div>
				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr( $form_classes ); ?>" id="urgent-appointment-form">
				<?php if ( $form_embed_code ) : ?>
					<div class="appointment-form-embed">
						<?php echo do_shortcode( $form_embed_code ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				<?php elseif ( current_user_can( 'manage_options' ) ) : ?>
					<p><?php esc_html_e( 'Add a shortcode or embed code to the Request Appointment section.', 'simontsao' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
