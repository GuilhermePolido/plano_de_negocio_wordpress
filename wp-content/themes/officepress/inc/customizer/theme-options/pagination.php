<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'officepress_pagination', array(
	'title'               => esc_html__('Pagination','officepress'),
	'description'         => esc_html__( 'Pagination section options.', 'officepress' ),
	'panel'               => 'officepress_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'officepress_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'officepress_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'officepress' ),
	'section'             => 'officepress_pagination',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'officepress_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'officepress_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'officepress_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'officepress' ),
	'section'             => 'officepress_pagination',
	'type'                => 'select',
	'choices'			  => officepress_pagination_options(),
	'active_callback'	  => 'officepress_is_pagination_enable',
) );
