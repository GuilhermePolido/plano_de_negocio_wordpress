<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'officepress_reset_section', array(
	'title'             => esc_html__('Reset all settings','officepress'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'officepress' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'officepress_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'officepress_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'officepress_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'officepress' ),
	'section'           => 'officepress_reset_section',
	'type'              => 'checkbox',
) );
