<?php
/**
 * The template for displaying the footer.
 *
 * @package Simontsao
 */

$footer_details      = function_exists( 'simontsao_get_footer_contact_details' ) ? simontsao_get_footer_contact_details() : [];
$footer_social_links = function_exists( 'simontsao_get_footer_social_links' ) ? simontsao_get_footer_social_links() : [];
$footer_support_flags = function_exists( 'simontsao_get_footer_support_flags' ) ? simontsao_get_footer_support_flags() : [];

$contact_heading = $footer_details['heading'] ?? __( 'Contact', 'simontsao' );
$email           = $footer_details['email'] ?? '';
$phone           = $footer_details['phone'] ?? '';
$fax             = $footer_details['fax'] ?? '';
$location        = $footer_details['location'] ?? '';
$hospitals       = $footer_details['hospitals'] ?? '';
$language_text   = $footer_details['language_text'] ?? '';
?>
<!-- ScrollToTop Button -->
<button aria-label="Scroll to top button" class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></button>
<!-- ScrollToTop Button END-->
<!-- contact-dr-simon-tsao -->
<div class="bloc section text-primary bg-soft section-light" id="contact-dr-simon-tsao">
	<div class="container bloc-lg bloc-sm-lg" id="simon-tsao-contact-information">
		<div class="row" id="appointment-booking-information">
			<div class="col-sm-8 col-lg-8 align-self-start" id="contact-information">
				<div class="text-lg-left contact-panel" id="contact-links">
					<h3 class="mb-4 text-center text-md-left mb-lg-3 ml-lg-5 mt-lg-5" id="how-to-contact">
						<strong><?php echo esc_html( $contact_heading ); ?></strong>
					</h3>
					<div class="ml-lg-5">
						<table class="contact-table">
							<tbody>
								<?php if ( $email ) : ?>
									<tr>
										<td class="label"><?php esc_html_e( 'Email:', 'simontsao' ); ?></td>
										<td class="content"><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></td>
									</tr>
								<?php endif; ?>
								<?php if ( $phone ) : ?>
									<tr>
										<td class="label"><?php esc_html_e( 'Phone:', 'simontsao' ); ?></td>
										<td class="content"><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></td>
									</tr>
								<?php endif; ?>
								<?php if ( $fax ) : ?>
									<tr>
										<td class="label"><?php esc_html_e( 'Fax:', 'simontsao' ); ?></td>
										<td class="content"><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $fax ) ); ?>"><?php echo esc_html( $fax ); ?></a></td>
									</tr>
								<?php endif; ?>
								<?php if ( $location ) : ?>
									<tr>
										<td class="label"><?php esc_html_e( 'Location:', 'simontsao' ); ?></td>
										<td class="content"><?php echo esc_html( $location ); ?></td>
									</tr>
								<?php endif; ?>
								<?php if ( $hospitals ) : ?>
									<tr>
										<td class="label"><?php esc_html_e( 'Hospitals:', 'simontsao' ); ?></td>
										<td class="content"><?php echo wp_kses_post( $hospitals ); ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="text-center mb-5 text-sm-left order-lg-1 col-lg-4" id="clinic-languages">
				<?php if ( $language_text ) : ?>
					<p class="mt-lg-5 mt-5"><?php echo wp_kses_post( $language_text ); ?></p>
				<?php endif; ?>

				<?php if ( $footer_social_links ) : ?>
					<div class="pl-lg-4 pl-md-4 pb-md-3 pl-sm-3 pb-sm-3 mb-5 mb-lg-0 pb-lg-4">
						<div class="social-link-bric" data-aria="true">
							<?php foreach ( $footer_social_links as $item ) : ?>
								<?php
								$icon = $item['icon'] ?? null;
								$link = $item['link'] ?? '';
								?>
								<?php if ( $icon && $link ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $icon['alt'] ?? __( 'Social link', 'simontsao' ) ); ?>">
										<?php
										if ( function_exists( 'simontsao_render_icon' ) ) {
											simontsao_render_icon(
												$icon,
												[
													'class' => 'footer-social-icon',
													'alt'   => $icon['alt'] ?? '',
												]
											);
										}
										?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $footer_support_flags ) : ?>
					<div class="text-center text-lg-left text-md-left pl-md-4 text-sm-left pl-sm-3 container-div-style pl-lg-4">
						<?php foreach ( $footer_support_flags as $item ) : ?>
							<?php $image = $item['image'] ?? null; ?>
							<?php if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) : ?>
								<?php
								simontsao_render_responsive_picture(
									$image,
									[
										'class'         => 'img-fluid img-contact-us-style float-lg-none ml-lg-3 mr-lg-3 ml-md-3 mr-md-3 ml-sm-3 mr-sm-3 ml-3 mr-3 mb-sm-5 mb-lg-0',
										'alt'           => $image['alt'] ?? '',
										'sizes'         => '50px',
										'lazy'          => true,
										'fetchpriority' => 'auto',
										'fallback_size' => 'thumbnail',
										'image_sizes'   => [ 'thumbnail', 'medium' ],
									]
								);
								?>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- contact-dr-simon-tsao END -->
</div>
<!-- Main container END -->

<?php wp_footer(); ?>

</body>
</html>
