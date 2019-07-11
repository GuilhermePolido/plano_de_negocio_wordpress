<?php
/**
 * Header Meta Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add Header Meta section
$wp_customize->add_section( 'officepress_topbar_section', array(
	'title'             => esc_html__( 'Header Meta','officepress' ),
	'description'       => esc_html__( 'Header Meta options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// top bar menu visible
$wp_customize->add_setting( 'officepress_theme_options[topbar_login_register_enable]',
	array(
		'default'       	=> $options['topbar_login_register_enable'],
		'sanitize_callback' => 'officepress_sanitize_switch_control',
	)
);
$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[topbar_login_register_enable]',
    array(
		'label'      		=> esc_html__( 'Display Login / Register', 'officepress' ),
		'section'    		=> 'officepress_topbar_section',
		'on_off_label' 		=> officepress_switch_options(),
    )
) );

// topbar login setting and control
$wp_customize->add_setting( 'officepress_theme_options[topbar_login_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_login_label'],
) );

$wp_customize->add_control( 'officepress_theme_options[topbar_login_label]', array(
	'label'           	=> esc_html__( 'Login Label', 'officepress' ),
	'section'        	=> 'officepress_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'officepress_is_login_register_meta_section_enable',
) );

// topbar login url setting and control
$wp_customize->add_setting( 'officepress_theme_options[topbar_login_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[topbar_login_url]', array(
	'label'           	=> esc_html__( 'Login Url', 'officepress' ),
	'section'        	=> 'officepress_topbar_section',
	'type'				=> 'url',
	'active_callback'	=> 'officepress_is_login_register_meta_section_enable',
) );

// topbar register setting and control
$wp_customize->add_setting( 'officepress_theme_options[topbar_register_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_register_label'],
) );

$wp_customize->add_control( 'officepress_theme_options[topbar_register_label]', array(
	'label'           	=> esc_html__( 'Register Label', 'officepress' ),
	'section'        	=> 'officepress_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'officepress_is_login_register_meta_section_enable',
) );

// topbar register url setting and control
$wp_customize->add_setting( 'officepress_theme_options[topbar_register_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[topbar_register_url]', array(
	'label'           	=> esc_html__( 'Register Url', 'officepress' ),
	'section'        	=> 'officepress_topbar_section',
	'type'				=> 'url',
	'active_callback'	=> 'officepress_is_login_register_meta_section_enable',
) );