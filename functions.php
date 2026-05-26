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
