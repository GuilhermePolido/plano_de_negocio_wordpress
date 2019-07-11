<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'officepress_service_section', array(
	'title'             => esc_html__( 'Services','officepress' ),
	'description'       => esc_html__( 'Services Section options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'officepress_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'officepress' ),
	'section'           => 'officepress_service_section',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'officepress_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new OfficePress_Icon_Picker( $wp_customize, 'officepress_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'officepress' ), $i ),
		'section'           => 'officepress_service_section',
		'active_callback'	=> 'officepress_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'officepress_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'officepress_sanitize_page',
	) );

	$wp_customize->add_control( new OfficePress_Dropdown_Chooser( $wp_customize, 'officepress_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'officepress' ), $i ),
		'section'           => 'officepress_service_section',
		'choices'			=> officepress_page_choices(),
		'active_callback'	=> 'officepress_is_service_section_enable',
	) ) );

	// service hr setting and control
	$wp_customize->add_setting( 'officepress_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new OfficePress_Customize_Horizontal_Line( $wp_customize, 'officepress_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'officepress_service_section',
			'active_callback' => 'officepress_is_service_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
