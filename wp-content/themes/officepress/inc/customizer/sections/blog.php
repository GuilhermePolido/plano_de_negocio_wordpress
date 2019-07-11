<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'officepress_blog_section', array(
	'title'             => esc_html__( 'Blog','officepress' ),
	'description'       => esc_html__( 'Blog Section options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'officepress_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'officepress' ),
	'section'           => 'officepress_blog_section',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'officepress_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'officepress' ),
	'section'        	=> 'officepress_blog_section',
	'active_callback' 	=> 'officepress_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'officepress_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'officepress_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'officepress_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'officepress_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'officepress_sanitize_select',
) );

$wp_customize->add_control( 'officepress_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'officepress' ),
	'section'           => 'officepress_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'officepress_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'officepress' ),
		'recent' 	=> esc_html__( 'Recent', 'officepress' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'officepress_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'officepress_sanitize_single_category',
) ) ;

$wp_customize->add_control( new OfficePress_Dropdown_Taxonomies_Control( $wp_customize,'officepress_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'officepress' ),
	'description'      	=> esc_html__( 'Note: Latest three posts will be shown from selected category', 'officepress' ),
	'section'           => 'officepress_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'officepress_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'officepress_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'officepress_sanitize_category_list',
) ) ;

$wp_customize->add_control( new OfficePress_Dropdown_Category_Control( $wp_customize,'officepress_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'officepress' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'officepress' ),
	'section'           => 'officepress_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'officepress_is_blog_section_content_recent_enable'
) ) );

// blog btn title setting and control
$wp_customize->add_setting( 'officepress_theme_options[blog_readmore_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_readmore_title'],
) );

$wp_customize->add_control( 'officepress_theme_options[blog_readmore_title]', array(
	'label'           	=> esc_html__( 'Read More Label', 'officepress' ),
	'section'        	=> 'officepress_blog_section',
	'active_callback' 	=> 'officepress_is_blog_section_enable',
	'type'				=> 'text',
) );
