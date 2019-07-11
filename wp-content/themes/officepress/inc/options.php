<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage OfficePress
 * @since OfficePress 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function officepress_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'officepress' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function officepress_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'officepress' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'officepress_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function officepress_site_layout() {
        $officepress_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'officepress_site_layout', $officepress_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'officepress_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function officepress_selected_sidebar() {
        $officepress_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'officepress' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'officepress' ),
        );

        $output = apply_filters( 'officepress_selected_sidebar', $officepress_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'officepress_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function officepress_global_sidebar_position() {
        $officepress_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'officepress_global_sidebar_position', $officepress_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'officepress_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function officepress_sidebar_position() {
        $officepress_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'officepress_sidebar_position', $officepress_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'officepress_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function officepress_pagination_options() {
        $officepress_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'officepress' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'officepress' ),
        );

        $output = apply_filters( 'officepress_pagination_options', $officepress_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'officepress_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function officepress_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'officepress' ),
            'off'       => esc_html__( 'Disable', 'officepress' )
        );
        return apply_filters( 'officepress_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'officepress_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function officepress_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'officepress' ),
            'off'       => esc_html__( 'No', 'officepress' )
        );
        return apply_filters( 'officepress_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'officepress_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function officepress_sortable_sections() {
        $sections = array(
            'introduction' => esc_html__( 'Introduction', 'officepress' ),
            'service'   => esc_html__( 'Services', 'officepress' ),
            'about'     => esc_html__( 'About Us', 'officepress' ),
            'blog'      => esc_html__( 'Blog', 'officepress' ),
            'testimonial' => esc_html__( 'Testimonial', 'officepress' ),
        );
        return apply_filters( 'officepress_sortable_sections', $sections );
    }
endif;
