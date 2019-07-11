<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'officepress_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','officepress' ),
	'description'       => esc_html__( 'Archive section options.', 'officepress' ),
	'panel'             => 'officepress_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'officepress_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'officepress_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'officepress' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'officepress' ),
	'section'           => 'officepress_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'officepress_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'officepress_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'officepress' ),
	'section'           => 'officepress_archive_section',
	'on_off_label' 		=> officepress_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'officepress_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'officepress' ),
	'section'           => 'officepress_archive_section',
	'on_off_label' 		=> officepress_hide_options(),
) ) );
