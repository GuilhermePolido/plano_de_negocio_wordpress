<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'officepress_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','officepress' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'officepress' ),
	'panel'             => 'officepress_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'officepress_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'officepress_sanitize_switch_control',
) );

$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'officepress' ),
	'section'           => 'officepress_testimonial_section',
	'on_off_label' 		=> officepress_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'officepress_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'officepress' ),
	'section'        	=> 'officepress_testimonial_section',
	'active_callback' 	=> 'officepress_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'officepress_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial-section .section-header h2.section-title',
		'settings'            => 'officepress_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'officepress_testimonial_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'officepress_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'officepress_sanitize_page',
	) );

	$wp_customize->add_control( new OfficePress_Dropdown_Chooser( $wp_customize, 'officepress_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'officepress' ), $i ),
		'section'           => 'officepress_testimonial_section',
		'choices'			=> officepress_page_choices(),
		'active_callback'	=> 'officepress_is_testimonial_section_enable',
	) ) );

endfor;
