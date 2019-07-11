<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

$options = officepress_get_theme_options();


if ( ! function_exists( 'officepress_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since OfficePress 1.0.0
	 */
	function officepress_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'officepress_doctype', 'officepress_doctype', 10 );


if ( ! function_exists( 'officepress_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'officepress_before_wp_head', 'officepress_head', 10 );

if ( ! function_exists( 'officepress_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'officepress' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'officepress_page_start_action', 'officepress_page_start', 10 );

if ( ! function_exists( 'officepress_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'officepress_page_end_action', 'officepress_page_end', 10 );

if ( ! function_exists( 'officepress_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_header_start() { ?>

        <img src="<?php echo esc_url( get_template_directory_uri(). '/assets/uploads/triangle.png' ); ?>" class="triangle" />

		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper main-menu">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo officepress_get_svg( array( 'icon' => 'menu' ) );
				echo officepress_get_svg( array( 'icon' => 'close' ) );
				?>					
				<span class="menu-label"><?php esc_html_e( 'Menu', 'officepress' ); ?></span>
			</button>
		<?php
	}
endif;
add_action( 'officepress_header_action', 'officepress_header_start', 10 );

if ( ! function_exists( 'officepress_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_site_branding() {
		$options  = officepress_get_theme_options();
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
						if ( officepress_is_latest_posts() ) : ?>
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
add_action( 'officepress_header_action', 'officepress_site_branding', 20 );

if ( ! function_exists( 'officepress_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_site_navigation() {
		$options = officepress_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			

				<?php 
				$login = '';
				if ( $options['topbar_login_register_enable'] ) :
					$login .= '<li class="login-register-item">';
					$login .= '<div class="login-register">';
					$login .= '<ul>';
					if ( ! empty( $options['topbar_login_label'] ) && ! empty( $options['topbar_login_url'] ) ) :
						$login .= '<li><a href="' . esc_url( $options['topbar_login_url'] ) . '">' . esc_html( $options['topbar_login_label'] ) . '</a></li>';
					endif;
					
					if ( ! empty( $options['topbar_register_label'] ) && ! empty( $options['topbar_register_url'] ) ) :
						$login .= '<li><a href="' . esc_url( $options['topbar_register_url'] ) . '">' . esc_html( $options['topbar_register_label'] ) . '</a></li>';
					endif;
					$login .= '</ul>';
					$login .= '</div><!-- .social-icons -->';
					$login .= '</li>';
                endif;

        		$defaults = array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'officepress_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $login . '</ul>',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'officepress_header_action', 'officepress_site_navigation', 30 );


if ( ! function_exists( 'officepress_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'officepress_header_action', 'officepress_header_end', 50 );

if ( ! function_exists( 'officepress_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'officepress_content_start_action', 'officepress_content_start', 10 );

if ( ! function_exists( 'officepress_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_header_image() {
		if ( officepress_is_frontpage() )
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
                    <h2 class="page-title"><?php echo officepress_custom_header_banner_title(); ?></h2>
                </header>

                <?php officepress_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->
		<?php
	}
endif;
add_action( 'officepress_header_image_action', 'officepress_header_image', 10 );

if ( ! function_exists( 'officepress_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since OfficePress 1.0.0
	 */
	function officepress_add_breadcrumb() {
		$options = officepress_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( officepress_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * officepress_simple_breadcrumb hook
				 *
				 * @hooked officepress_simple_breadcrumb -  10
				 *
				 */
				do_action( 'officepress_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'officepress_header_image_action', 'officepress_add_breadcrumb', 20 );

if ( ! function_exists( 'officepress_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'officepress_content_end_action', 'officepress_content_end', 10 );

if ( ! function_exists( 'officepress_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'officepress_footer', 'officepress_footer_start', 10 );

if ( ! function_exists( 'officepress_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = officepress_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$poweredby_text = esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'officepress' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>'; 
		?>
		<div class="site-info wrapper col-2">
            <span>
            	<?php 
            	echo officepress_santize_allow_tag( $copyright_text ); 
            	echo officepress_santize_allow_tag( $poweredby_text ); 
            	if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( ' | ' );
				}
            	?>
        	</span>

        	<span>
                <?php  
                	$defaults = array(
        			'theme_location' => 'social',
        			'container' => false,
        			'menu_class' => 'social-icons',
        			'echo' => true,
        			'fallback_cb' => 'officepress_menu_fallback_cb',
        			'depth' => 1,
        			'link_before' => '<span class="screen-reader-text">',
					'link_after' => '</span>',
        		);
        	
        		wp_nav_menu( $defaults );
                ?>
            </span>
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'officepress_footer', 'officepress_footer_site_info', 40 );

if ( ! function_exists( 'officepress_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_footer_scroll_to_top() {
		$options  = officepress_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo officepress_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'officepress_footer', 'officepress_footer_scroll_to_top', 40 );

if ( ! function_exists( 'officepress_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since OfficePress 1.0.0
	 *
	 */
	function officepress_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'officepress_footer', 'officepress_footer_end', 100 );
