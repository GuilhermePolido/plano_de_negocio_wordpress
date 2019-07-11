<?php
/**
 * Introduction Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add Introduction section
$wp_customize->add_section( 'officepress_introduction_section', array(
	'title'             => esc_html__( 'Introduction','officepress' ),
	'description'       => esc_html__( 'Introduction Section options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// Introduction content enable control and setting
$wp_customize->add_setting( 'officepress_theme_options[introduction_section_enable]', array(
	'default'			=> 	$options['introduction_section_enable'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[introduction_section_enable]', array(
	'label'             => esc_html__( 'Introduction Section Enable', 'officepress' ),
	'section'           => 'officepress_introduction_section',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'officepress_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'officepress_sanitize_page',
) );

$wp_customize->add_control( new OfficePress_Dropdown_Chooser( $wp_customize, 'officepress_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'officepress' ),
	'section'           => 'officepress_introduction_section',
	'choices'			=> officepress_page_choices(),
	'active_callback'	=> 'officepress_is_introduction_section_enable',
) ) );

// introduction btn title setting and control
$wp_customize->add_setting( 'officepress_theme_options[introduction_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['introduction_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[introduction_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'officepress' ),
	'section'        	=> 'officepress_introduction_section',
	'active_callback' 	=> 'officepress_is_introduction_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'officepress_theme_options[introduction_btn_title]', array(
		'selector'            => '#introduction-section a.btn',
		'settings'            => 'officepress_theme_options[introduction_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'officepress_introduction_btn_title_partial',
    ) );
}
