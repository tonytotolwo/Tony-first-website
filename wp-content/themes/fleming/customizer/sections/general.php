<?php

function academia_customizer_define_general_sections( $sections ) {
    $panel           = 'academia' . '_general';
    $general_sections = array();

    $theme_sidebar_positions = array(
        'both'     => esc_html__('Both', 'fleming'),
        'left'      => esc_html__('Left', 'fleming'),
        'right'     => esc_html__('Right', 'fleming'),
        'none'    => esc_html__('None', 'fleming')
    );

    $general_sections['general'] = array(
        'title'     => esc_html__( 'Theme Settings', 'fleming' ),
        'priority'  => 4900,
        'options'   => array(

            'theme-sidebar-position'    => array(
                'setting'               => array(
                    'default'           => 'both',
                    'sanitize_callback' => 'academia_sanitize_text'
                ),
                'control'           => array(
                    'label'         => esc_html__( 'Default Layout', 'fleming' ),
                    'type'          => 'select',
                    'choices'       => $theme_sidebar_positions
                ),
            ),

            'fleming-display-pages'    => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 0
                ),
                'control'               => array(
                    'label'             => __( 'Display Featured Pages on Homepage', 'fleming' ),
                    'type'              => 'checkbox'
                )
            ),

            'fleming-featured-page-1'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'fleming_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Slideshow: Featured Page #1', 'fleming' ),
                    'description'       => sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Pages</a>.', 'fleming' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php?post_type=page' ) ) ),
                    'type'              => 'select',
                    'choices'           => fleming_get_pages()
                ),
            ),

            'fleming-featured-page-2'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'fleming_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Slideshow: Featured Page #2', 'fleming' ),
                    'type'              => 'select',
                    'choices'           => fleming_get_pages()
                ),
            ),

            'fleming-featured-page-3'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'fleming_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Slideshow: Featured Page #3', 'fleming' ),
                    'type'              => 'select',
                    'choices'           => fleming_get_pages()
                ),
            ),

            'fleming-featured-page-4'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'fleming_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Slideshow: Featured Page #4', 'fleming' ),
                    'type'              => 'select',
                    'choices'           => fleming_get_pages()
                ),
            ),

            'fleming-featured-page-5'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'fleming_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Slideshow: Featured Page #5', 'fleming' ),
                    'type'              => 'select',
                    'choices'           => fleming_get_pages()
                ),
            ),

        ),
    );

    return array_merge( $sections, $general_sections );
}

add_filter( 'academia_customizer_sections', 'academia_customizer_define_general_sections' );
