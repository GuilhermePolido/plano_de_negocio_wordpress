<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

$wp_customize->add_section( 'officepress_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','officepress' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'officepress' ),
	'panel'             => 'officepress_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'officepress_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'officepress_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'officepress' ),
	'section'          	=> 'officepress_breadcrumb',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'officepress_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'officepress_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'officepress' ),
	'active_callback' 	=> 'officepress_is_breadcrumb_enable',
	'section'          	=> 'officepress_breadcrumb',
) );
