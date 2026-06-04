<?php
/**
 * Theme bootstrap for Paradis Flooring Codex.
 */

if ( ! function_exists( 'paradis_flooring_codex_editor_style' ) ) :
	/**
	 * Load editor styling.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'paradis_flooring_codex_editor_style' );

if ( ! function_exists( 'paradis_flooring_codex_enqueue_styles' ) ) :
	/**
	 * Load the theme stylesheet directly.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_enqueue_styles() {
		wp_enqueue_style(
			'paradis-flooring-codex-style',
			get_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_style_add_data(
			'paradis-flooring-codex-style',
			'path',
			get_theme_file_path( 'style.css' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_enqueue_styles' );

if ( ! function_exists( 'paradis_flooring_codex_enqueue_google_fonts' ) ) :
	/**
	 * Load Google Fonts used by the theme.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_enqueue_google_fonts() {
		wp_enqueue_style(
			'paradis-flooring-codex-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
			array(),
			null
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_enqueue_google_fonts' );

if ( ! function_exists( 'paradis_flooring_codex_cleanup_image_links' ) ) :
	/**
	 * Prevent branded images from opening attachment/lightbox views.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_cleanup_image_links() {
		wp_register_script(
			'paradis-flooring-codex-image-links',
			false,
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);

		wp_enqueue_script( 'paradis-flooring-codex-image-links' );

		$home_url = wp_json_encode( home_url( '/' ) );

		wp_add_inline_script(
			'paradis-flooring-codex-image-links',
			"(function () {
				var homeUrl = " . $home_url . ";
				var allowedGallerySelector = '.pfc-gallery, .pfc-gallery-masonry';

				function isGalleryImage(node) {
					return !!(node && node.closest(allowedGallerySelector));
				}

				function isBrandLogo(node) {
					return !!(node && (node.classList.contains('pfc-brand-logo') || node.closest('.pfc-brand-logo')));
				}

				function cleanupImageLinks() {
					document.querySelectorAll('.wp-block-image').forEach(function (figure) {
						if (isGalleryImage(figure) || isBrandLogo(figure)) {
							return;
						}

						figure.querySelectorAll('a').forEach(function (link) {
							var image = link.querySelector('img');
							if (image && link.parentNode) {
								link.parentNode.insertBefore(image, link);
							}
							link.remove();
						});

						figure.querySelectorAll('[data-elementor-open-lightbox],[data-lightbox]').forEach(function (node) {
							node.removeAttribute('data-elementor-open-lightbox');
							node.removeAttribute('data-lightbox');
						});

						figure.addEventListener('click', function (event) {
							event.preventDefault();
							event.stopPropagation();
						}, true);
					});

					document.querySelectorAll('.pfc-brand-logo a').forEach(function (link) {
						link.href = homeUrl;
						link.removeAttribute('data-elementor-open-lightbox');
						link.removeAttribute('data-lightbox');
						link.removeAttribute('target');
						link.removeAttribute('rel');
						link.addEventListener('click', function (event) {
							event.preventDefault();
							event.stopPropagation();
							window.location.href = homeUrl;
						}, true);
					});
				}

				if (document.readyState === 'loading') {
					document.addEventListener('DOMContentLoaded', cleanupImageLinks, { once: true });
				} else {
					cleanupImageLinks();
				}

				window.setTimeout(cleanupImageLinks, 250);
			}());"
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_cleanup_image_links' );

if ( ! function_exists( 'paradis_flooring_codex_gallery_links' ) ) :
	/**
	 * Link homepage gallery thumbnails to the full Gallery page.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_gallery_links() {
		if ( ! is_front_page() ) {
			return;
		}

		wp_register_script(
			'paradis-flooring-codex-gallery-links',
			false,
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);

		wp_enqueue_script( 'paradis-flooring-codex-gallery-links' );

		wp_add_inline_script(
			'paradis-flooring-codex-gallery-links',
			"document.querySelectorAll('.pfc-gallery figure img').forEach(function (img) {
				if (img.closest('a')) {
					return;
				}
				var link = document.createElement('a');
				link.href = '/client/gallery/';
				link.setAttribute('aria-label', 'View full flooring gallery');
				img.parentNode.insertBefore(link, img);
				link.appendChild(img);
			});"
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_gallery_links' );

if ( ! function_exists( 'paradis_flooring_codex_filter_site_title' ) ) :
	/**
	 * Filter core/site-title to render "Paradis" instead of the full site title on inner pages.
	 *
	 * @param string $block_content The block content HTML.
	 * @param array  $block         The block details.
	 * @return string               Filtered block content HTML.
	 */
	function paradis_flooring_codex_filter_site_title( $block_content, $block ) {
		$classes = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
		if ( strpos( $classes, 'pfc-inner-logo' ) !== false || strpos( $classes, 'pfc-logo-main' ) !== false ) {
			if ( preg_match( '/<a[^>]*>/i', $block_content ) ) {
				$block_content = preg_replace( '/(<a[^>]*>).*?(<\/a>)/is', '$1Paradis$2', $block_content );
			} else {
				$block_content = preg_replace( '/(<[^>]+>).*?(<\/[^>]+>)/is', '$1Paradis$2', $block_content );
			}
		}
		return $block_content;
	}
endif;
add_filter( 'render_block_core/site-title', 'paradis_flooring_codex_filter_site_title', 10, 2 );

if ( ! function_exists( 'paradis_flooring_codex_mobile_nav_script' ) ) :
	/**
	 * Animate mobile menu open/close transitions.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_mobile_nav_script() {
		wp_register_script(
			'paradis-flooring-codex-mobile-nav',
			false,
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);

		wp_enqueue_script( 'paradis-flooring-codex-mobile-nav' );

		wp_add_inline_script(
			'paradis-flooring-codex-mobile-nav',
			"(function () {
				function initMobileNav() {
					var details = document.querySelector('.pfc-mobile-nav');
					if (!details) return;
					var summary = details.querySelector('summary');
					if (!summary) return;
					
					if (details.dataset.pfcNavInitialized) return;
					details.dataset.pfcNavInitialized = 'true';
					
					summary.addEventListener('click', function (e) {
						e.preventDefault();
						
						if (details.classList.contains('pfc-nav-animating')) return;
						
						var isOpen = details.hasAttribute('open');
						
						if (!isOpen) {
							details.classList.add('pfc-nav-animating');
							details.setAttribute('open', '');
							requestAnimationFrame(function () {
								requestAnimationFrame(function () {
									details.classList.add('pfc-nav-open');
								});
							});
							
							setTimeout(function () {
								details.classList.remove('pfc-nav-animating');
							}, 700);
						} else {
							details.classList.add('pfc-nav-animating');
							details.classList.remove('pfc-nav-open');
							
							setTimeout(function () {
								details.removeAttribute('open');
								details.classList.remove('pfc-nav-animating');
							}, 700);
						}
					});
				}
				
				if (document.readyState === 'loading') {
					document.addEventListener('DOMContentLoaded', initMobileNav, { once: true });
				} else {
					initMobileNav();
				}
				
				window.setTimeout(initMobileNav, 250);
			}());"
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_mobile_nav_script' );


