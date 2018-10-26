<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Theme Palace
 * @subpackage Corporate Education
 * @since Corporate Education 0.1
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses corporate_education_header_style()
 */
function corporate_education_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'corporate_education_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'corporate_education_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'corporate_education_custom_header_setup' );

if ( ! function_exists( 'corporate_education_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see corporate_education_custom_header_setup().
	 */
	function corporate_education_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
			// Has the text been hidden?
		if ( ! display_header_text() ) :
			$css = ".site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}";
		// If the user has set a custom color for the text use that.
		else :
			$css = ".site-title a,
			.site-description {
				color: #" . esc_attr( $header_text_color ) . "}";
		endif; 

		wp_add_inline_style( 'corporate-education-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'corporate_education_header_style', 10 );


if ( ! function_exists( 'corporate_education_custom_header' ) ) :
	/**
	 * Custom Header Codes
	 *
	 * @since Corporate Education 0.1
	 *
	 */
	function corporate_education_custom_header() {
		
		/**
		 * header image
		 *
		 * @since Graduate Pro 1.0
		 *
		 */
		$header_image_meta = corporate_education_header_image_meta_option();
		
		if ( ( '' == $header_image_meta && ! get_header_image() ) || ! $header_image_meta ) {
			return;
		}

		if ( is_array( $header_image_meta ) ) {
			$header_image = $header_image_meta[0];
		} else {
			$header_image = $header_image_meta;
		}
		?>
		<section id="header-featured-image" class="page-section" style="background-image:url('<?php echo esc_url( $header_image ); ?>')">
                <div class="black-overlay"></div>
                <div class="wrapper">
                    <div class="page-detail">
                        <header class="page-header">
                            <h1 class="page-title"><?php corporate_education_title_as_per_template(); ?></h1>
                        </header><!-- .page-header -->

                        <?php
						/**
					     * corporate_education_add_breadcrumb hook
					     *
					     * @hooked corporate_education_add_breadcrumb -  10
					     *
					     */
					    do_action( 'corporate_education_add_breadcrumb' );
					    ?>
                    </div><!-- .page-detail -->
                </div><!-- .wrapper -->

                <div class="white-shape bottom"></div>
                <div class="white-shape bottom left"></div>

            </section><!-- #header-featured-image  -->

		<?php
	}
endif;
add_action( 'corporate_education_content_start_action', 'corporate_education_custom_header', 20 );
