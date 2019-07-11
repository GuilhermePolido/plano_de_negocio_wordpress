<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add About section
$wp_customize->add_section( 'officepress_about_section', array(
	'title'             => esc_html__( 'About Us','officepress' ),
	'description'       => esc_html__( 'About Section options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'officepress_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'officepress' ),
	'section'           => 'officepress_about_section',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

for ( $i = 1; $i <= 1; $i++ ) :
	// about pages drop down chooser control and setting
	$wp_customize->add_setting( 'officepress_theme_options[about_content_page_' . $i . ']', array(
		'sanitize_callback' => 'officepress_sanitize_page',
	) );

	$wp_customize->add_control( new OfficePress_Dropdown_Chooser( $wp_customize, 'officepress_theme_options[about_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'officepress' ), $i ),
		'section'           => 'officepress_about_section',
		'choices'			=> officepress_page_choices(),
		'active_callback'	=> 'officepress_is_about_section_enable',
	) ) );
endfor;

// About btn title setting and control
$wp_customize->add_setting( 'officepress_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
) );

$wp_customize->add_control( 'officepress_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'officepress' ),
	'section'        	=> 'officepress_about_section',
	'active_callback' 	=> 'officepress_is_about_section_enable',
	'type'				=> 'text',
) );
