<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'officepress_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'officepress' ),
		'priority'   			=> 900,
		'panel'      			=> 'officepress_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'officepress_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'officepress_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'officepress_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'officepress' ),
		'section'    			=> 'officepress_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'officepress_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'officepress_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'officepress_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'officepress_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'officepress_sanitize_switch_control',
	)
);
$wp_customize->add_control( new OfficePress_Switch_Control( $wp_customize, 'officepress_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'officepress' ),
		'section'    		=> 'officepress_section_footer',
		'on_off_label' 		=> officepress_switch_options(),
    )
) );