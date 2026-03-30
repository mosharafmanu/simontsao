<?php
/**
 * The header for our theme.
 *
 * @package Simontsao
 */

$header_button = function_exists( 'simontsao_get_header_button' ) ? simontsao_get_header_button() : [];
$site_logo     = function_exists( 'simontsao_get_site_logo' ) ? simontsao_get_site_logo() : false;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="keywords" content="breast surgery, breast cancer treatment, oncoplastic surgery, breast reconstruction, top surgery, transgender chest surgery, surgical oncology, Melbourne surgeon ">
	<meta name="description" content="A/Prof Simon Tsao: Melbourne Breast Cancer & Transgender Surgeon. Expert in breast surgery, cancer care & top surgery.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="robots" content="index, follow">
	<link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.png' ); ?>">

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-87RGNEDVTW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-87RGNEDVTW');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->
<!-- Main container -->
<div class="page-container">
<header class="site-header" id="site-header">
	<div class="container">
		<div class="site-header__inner">
			<div class="site-header__brand">
				<?php if ( $site_logo && function_exists( 'simontsao_render_site_logo' ) ) : ?>
					<?php
					simontsao_render_site_logo(
						[
							'class'      => 'site-logo',
							'alt'        => get_bloginfo( 'name' ),
							'link_class' => 'site-logo-link',
						]
					);
					?>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link site-title-link"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>

			<button
				class="site-header__toggle"
				type="button"
				aria-expanded="false"
				aria-controls="site-header-panel"
				aria-label="<?php esc_attr_e( 'Toggle navigation', 'simontsao' ); ?>"
			>
				<span class="site-header__toggle-box" aria-hidden="true">
					<span class="site-header__toggle-line"></span>
					<span class="site-header__toggle-line"></span>
					<span class="site-header__toggle-line"></span>
				</span>
			</button>

			<?php if ( ! empty( $header_button['url'] ) && ! empty( $header_button['title'] ) ) : ?>
				<div class="site-header__cta">
					<a href="<?php echo esc_url( $header_button['url'] ); ?>" class="site-header__button btn button-accent"<?php echo ( ! empty( $header_button['target'] ) && '_blank' === $header_button['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $header_button['title'] ); ?></a>
				</div>
			<?php endif; ?>

			<div class="site-header__panel" id="site-header-panel" aria-hidden="true">
				<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Primary menu', 'simontsao' ); ?>">
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'mainMenu',
							'container'      => false,
							'menu_class'     => 'site-header__menu',
							'fallback_cb'    => false,
						]
					);
					?>
				</nav>
			</div>
		</div>
	</div>
</header>






