<?php
/**
 * Site Settings Helpers
 *
 * Project-specific helpers for header controls, shared additional-information
 * links, and the footer contact/support area.
 *
 * @package Simontsao
 */

if ( ! function_exists( 'simontsao_get_site_logo' ) ) {
	/**
	 * Get the header site logo.
	 *
	 * @return array|false
	 */
	function simontsao_get_site_logo() {
		if ( ! function_exists( 'get_field' ) ) {
			return false;
		}

		return get_field( 'site_logo', 'options' );
	}
}

if ( ! function_exists( 'simontsao_render_site_logo' ) ) {
	/**
	 * Render the site logo.
	 *
	 * @param array $args Optional render arguments.
	 * @return void
	 */
	function simontsao_render_site_logo( $args = [] ) {
		if ( ! function_exists( 'simontsao_render_responsive_picture' ) ) {
			return;
		}

		$logo = simontsao_get_site_logo();

		if ( ! $logo ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			[
				'class'      => 'site-logo',
				'alt'        => get_bloginfo( 'name' ),
				'link_class' => 'site-logo-link',
			]
		);
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo esc_attr( $args['link_class'] ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php
			simontsao_render_responsive_picture(
				$logo,
				[
					'class' => $args['class'],
					'alt'   => $args['alt'],
					'sizes' => '(max-width: 768px) 100px, 160px',
				]
			);
			?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'simontsao_get_header_button' ) ) {
	/**
	 * Get the header button link.
	 *
	 * @return array|false
	 */
	function simontsao_get_header_button() {
		if ( ! function_exists( 'get_field' ) ) {
			return false;
		}

		return get_field( 'header_button', 'options' );
	}
}

if ( ! function_exists( 'simontsao_render_header_button' ) ) {
	/**
	 * Render the header button.
	 *
	 * @param array $args Optional render arguments.
	 * @return string|void
	 */
	function simontsao_render_header_button( $args = [] ) {
		$button = simontsao_get_header_button();

		if ( ! $button || empty( $button['url'] ) ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			[
				'class'      => 'site-btn purple-pink header-btn',
				'text_class' => 'header-btn-text',
				'icon_class' => 'header-btn-icon',
				'show_text'  => true,
				'show_icon'  => true,
				'echo'       => true,
			]
		);

		$text        = $button['title'] ?? '';
		$url         = $button['url'] ?? '';
		$target      = $button['target'] ?? '';
		$target_attr = '_blank' === $target ? ' target="_blank" rel="noopener noreferrer"' : '';
		$aria_label  = $text ? $text : __( 'Contact Us', 'simontsao' );

		ob_start();
		?>
		<a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" aria-label="<?php echo esc_attr( $aria_label ); ?>"<?php echo $target_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php if ( $args['show_text'] && $text ) : ?>
				<span class="<?php echo esc_attr( $args['text_class'] ); ?>" aria-hidden="true"><?php echo esc_html( $text ); ?></span>
			<?php endif; ?>
			<?php if ( $args['show_icon'] ) : ?>
				<span class="<?php echo esc_attr( $args['icon_class'] ); ?>" aria-hidden="true">
					<?php get_template_part( 'assets/svgs/header-phone-icon' ); ?>
				</span>
			<?php endif; ?>
		</a>
		<?php
		$output = ob_get_clean();

		if ( $args['echo'] ) {
			echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return;
		}

		return $output;
	}
}

if ( ! function_exists( 'simontsao_get_additional_information_links_data' ) ) {
	/**
	 * Get shared additional information link groups.
	 *
	 * @return array
	 */
	function simontsao_get_additional_information_links_data() {
		if ( ! function_exists( 'get_field' ) ) {
			return [];
		}

		return [
			'information_heading' => get_field( 'additional_information_heading', 'options' ),
			'information_links'   => get_field( 'additional_information_links', 'options' ),
			'surgeries_heading'   => get_field( 'additional_surgeries_heading', 'options' ),
			'surgeries_links'     => get_field( 'additional_surgeries_links', 'options' ),
		];
	}
}

if ( ! function_exists( 'simontsao_get_footer_contact_details' ) ) {
	/**
	 * Get footer contact details.
	 *
	 * @return array
	 */
	function simontsao_get_footer_contact_details() {
		if ( ! function_exists( 'get_field' ) ) {
			return [];
		}

		return [
			'heading'       => get_field( 'footer_contact_heading', 'options' ),
			'email'         => get_field( 'footer_email', 'options' ),
			'phone'         => get_field( 'footer_phone', 'options' ),
			'fax'           => get_field( 'footer_fax', 'options' ),
			'location'      => get_field( 'footer_location', 'options' ),
			'hospitals'     => get_field( 'footer_hospitals', 'options' ),
			'language_text' => get_field( 'footer_language_text', 'options' ),
		];
	}
}

if ( ! function_exists( 'simontsao_get_footer_social_links' ) ) {
	/**
	 * Get footer social links.
	 *
	 * @return array
	 */
	function simontsao_get_footer_social_links() {
		if ( ! function_exists( 'get_field' ) ) {
			return [];
		}

		return (array) get_field( 'footer_social_links', 'options' );
	}
}

if ( ! function_exists( 'simontsao_get_footer_support_flags' ) ) {
	/**
	 * Get footer support flags.
	 *
	 * @return array
	 */
	function simontsao_get_footer_support_flags() {
		if ( ! function_exists( 'get_field' ) ) {
			return [];
		}

		return (array) get_field( 'footer_support_flags', 'options' );
	}
}
