<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

if ( ! function_exists( 'officepress_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since OfficePress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function officepress_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'officepress_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'officepress_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since OfficePress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function officepress_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'officepress_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'officepress_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since OfficePress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function officepress_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'officepress_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if login_register_meta section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_login_register_meta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[topbar_login_register_enable]' )->value() );
}

/**
 * Check if introduction section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_introduction_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[introduction_section_enable]' )->value() );
}

/**
 * Check if introduction section content type is post.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_introduction_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'officepress_theme_options[introduction_content_type]' )->value();
	return officepress_is_introduction_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if introduction section content type is page.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_introduction_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'officepress_theme_options[introduction_content_type]' )->value();
	return officepress_is_introduction_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if introduction section content type is custom.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_introduction_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'officepress_theme_options[introduction_content_type]' )->value();
	return officepress_is_introduction_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if service section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'officepress_theme_options[blog_content_type]' )->value();
	return officepress_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'officepress_theme_options[blog_content_type]' )->value();
	return officepress_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since OfficePress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function officepress_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'officepress_theme_options[testimonial_section_enable]' )->value() );
}
