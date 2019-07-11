<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage OfficePress
	 * @since OfficePress 1.0.0
	 */

	/**
	 * officepress_doctype hook
	 *
	 * @hooked officepress_doctype -  10
	 *
	 */
	do_action( 'officepress_doctype' );

?>
<head>
<?php
	/**
	 * officepress_before_wp_head hook
	 *
	 * @hooked officepress_head -  10
	 *
	 */
	do_action( 'officepress_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * officepress_page_start_action hook
	 *
	 * @hooked officepress_page_start -  10
	 *
	 */
	do_action( 'officepress_page_start_action' ); 

	/**
	 * officepress_header_action hook
	 *
	 * @hooked officepress_header_start -  10
	 * @hooked officepress_site_branding -  20
	 * @hooked officepress_site_navigation -  30
	 * @hooked officepress_header_end -  50
	 *
	 */
	do_action( 'officepress_header_action' );

	/**
	 * officepress_content_start_action hook
	 *
	 * @hooked officepress_content_start -  10
	 *
	 */
	do_action( 'officepress_content_start_action' );

	/**
	 * officepress_header_image_action hook
	 *
	 * @hooked officepress_header_image -  10
	 *
	 */
	do_action( 'officepress_header_image_action' );

    if ( officepress_is_frontpage() ) {
    	$i = 1;
    	$sections = officepress_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'officepress_primary_content', 'officepress_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'officepress_primary_content' );
	}
	