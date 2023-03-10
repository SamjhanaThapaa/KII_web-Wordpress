<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

$options = educollege_get_theme_options();


if ( ! function_exists( 'educollege_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Educollege 1.0.0
	 */
	function educollege_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'educollege_doctype', 'educollege_doctype', 10 );


if ( ! function_exists( 'educollege_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'educollege_before_wp_head', 'educollege_head', 10 );

if ( ! function_exists( 'educollege_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'educollege' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'educollege_page_start_action', 'educollege_page_start', 10 );

if ( ! function_exists( 'educollege_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'educollege_page_end_action', 'educollege_page_end', 10 );

if ( ! function_exists( 'educollege_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'educollege_header_action', 'educollege_header_start', 20 );

if ( ! function_exists( 'educollege_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_site_branding() {
		$options  = educollege_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>		
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-details">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( educollege_is_latest_posts() || educollege_is_frontpage() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
	    	<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'educollege_header_action', 'educollege_site_branding', 20 );

if ( ! function_exists( 'educollege_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_site_navigation() {
		$options = educollege_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu','educollege'); ?>">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-label"><?php esc_html__( 'Menu', 'educollege' ); ?></span>			
				<?php
				echo educollege_get_svg( array( 'icon' => 'menu' ) );
				echo educollege_get_svg( array( 'icon' => 'close' ) );
				?>		
			</button>
				<?php 
					$search = '';
					if ( $options['nav_search_enable'] ) :
						$search = '<li class="search-menu">';
						$search .= '<a href="#" class="">';
						$search .= educollege_get_svg( array( 'icon' => 'search' ) );
						$search .= educollege_get_svg( array( 'icon' => 'close' ) );
						$search .= '</a><div id="search" style="display: none;">';
						$search .= get_search_form( $echo = false );
		                $search .= '</div></li>';
	                endif;

	        		wp_nav_menu( array(
	        			'theme_location' => 'primary',
	        			'container' => 'div',
	        			'menu_class' => 'menu nav-menu',
	        			'menu_id' => 'primary-menu',
	        			'echo' => true,
	        			'fallback_cb' => 'educollege_menu_fallback_cb',
	        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
	        		) );
	        	?>
        	</div><!-- .wrapper -->
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'educollege_header_action', 'educollege_site_navigation', 30 );


if ( ! function_exists( 'educollege_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_header_end() {
		?>
			
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'educollege_header_action', 'educollege_header_end', 50 );

if ( ! function_exists( 'educollege_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'educollege_content_start_action', 'educollege_content_start', 10 );

if ( ! function_exists( 'educollege_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_header_image() {
		if ( educollege_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( is_singular() ) :
			$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php educollege_custom_header_banner_title(); ?>
                </header>

                <?php do_action('educollege_add_breadcrumb'); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->
		<?php
	}
endif;
add_action( 'educollege_header_image_action', 'educollege_header_image', 10 );

if ( ! function_exists( 'educollege_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Educollege 1.0.0
	 */
	function educollege_add_breadcrumb() {
		$options = educollege_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( educollege_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * educollege_simple_breadcrumb hook
				 *
				 * @hooked educollege_simple_breadcrumb -  10
				 *
				 */
				do_action( 'educollege_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

add_action( 'educollege_add_breadcrumb', 'educollege_add_breadcrumb', 10 );

if ( ! function_exists( 'educollege_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'educollege_content_end_action', 'educollege_content_end', 10 );

if ( ! function_exists( 'educollege_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'educollege_footer', 'educollege_footer_start', 10 );

if ( ! function_exists( 'educollege_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_footer_site_info() {
		$theme_data = wp_get_theme(); 
		$options = educollege_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( 
			date_i18n( _x( 'Y', 'copyright date format', 'educollege' ) ), 
			'<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' 
		);

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		?>
		<div class="site-info <?php echo $options['footer_social_enable'] == true ? esc_attr__('col-2', 'educollege') : '' ?>">
            <div class="wrapper">
                <span>
                	<?php 
                		echo educollege_santize_allow_tag( $copyright_text ); 
                    	echo esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'By', 'educollege' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                	?>
            	</span>
            	<span>
            		<?php if ( $options['footer_social_enable']):   
	            	
	            		wp_nav_menu( array(
	            			'theme_location' => 'social',
	            			'container' => false,
	            			'menu_class' => 'social-icons',
	            			'echo' => true,
	            			'fallback_cb' => false,
	            			'depth' => 1,
	            			'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>',
	            		) );
	            	endif; ?>
            	</span>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'educollege_footer', 'educollege_footer_site_info', 40 );

if ( ! function_exists( 'educollege_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_footer_scroll_to_top() {
		$options  = educollege_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo educollege_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'educollege_footer', 'educollege_footer_scroll_to_top', 40 );

if ( ! function_exists( 'educollege_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Educollege 1.0.0
	 *
	 */
	function educollege_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'educollege_footer', 'educollege_footer_end', 100 );

