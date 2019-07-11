<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage OfficePress
* @since OfficePress 1.0.0
*/

if ( ! function_exists( 'officepress_introduction_btn_title_partial' ) ) :
    // introduction btn title
    function officepress_introduction_btn_title_partial() {
        $options = officepress_get_theme_options();
        return esc_html( $options['introduction_btn_title'] );
    }
endif;

if ( ! function_exists( 'officepress_blog_title_partial' ) ) :
    // blog title
    function officepress_blog_title_partial() {
        $options = officepress_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'officepress_testimonial_title_partial' ) ) :
    // testimonial title
    function officepress_testimonial_title_partial() {
        $options = officepress_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'officepress_copyright_text_partial' ) ) :
    // copyright text
    function officepress_copyright_text_partial() {
        $options = officepress_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
