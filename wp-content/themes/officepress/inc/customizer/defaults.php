<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 * @return array An array of default values
 */

function officepress_get_default_theme_options() {
	$officepress_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'officepress' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'officepress' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'officepress' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'officepress' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_login_register_enable'	=> false,
		'topbar_login_label'			=> esc_html__( 'Log In', 'officepress' ),
		'topbar_register_label'			=> esc_html__( 'Register', 'officepress' ),

		// Introduction
		'introduction_section_enable'	=> true,
		'introduction_btn_title'		=> esc_html__( 'Contact Us', 'officepress' ),

		// service
		'service_section_enable'		=> true,

		// About
		'about_section_enable'			=> true,
		'about_btn_title'				=> esc_html__( 'Learn More', 'officepress' ),

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'What&#39;s happening around us', 'officepress' ),
		'blog_readmore_title'			=> esc_html__( 'Learn More', 'officepress' ),

		// testimonial
		'testimonial_section_enable'	=> true,
		'testimonial_title'				=> esc_html__( 'Loved by business, and individuals', 'officepress' ),

	);

	$output = apply_filters( 'officepress_default_theme_options', $officepress_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}