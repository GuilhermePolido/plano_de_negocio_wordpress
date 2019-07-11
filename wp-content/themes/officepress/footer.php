<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

/**
 * officepress_footer_primary_content hook
 *
 * @hooked officepress_add_contact_section -  10
 *
 */
do_action( 'officepress_footer_primary_content' );

/**
 * officepress_content_end_action hook
 *
 * @hooked officepress_content_end -  10
 *
 */
do_action( 'officepress_content_end_action' );

/**
 * officepress_content_end_action hook
 *
 * @hooked officepress_footer_start -  10
 * @hooked OfficePress_Footer_Widgets->add_footer_widgets -  20
 * @hooked officepress_footer_site_info -  40
 * @hooked officepress_footer_end -  100
 *
 */
do_action( 'officepress_footer' );

/**
 * officepress_page_end_action hook
 *
 * @hooked officepress_page_end -  10
 *
 */
do_action( 'officepress_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
