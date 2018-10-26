<?php

function academia_customizer_define_footer_sections( $sections ) {
    $panel           = 'academia' . '_footer';
    $footer_sections = array();

    $footer_sections['footer'] = array(
        'title'   => esc_html__( 'Footer', 'fleming' ),
        'priority' => 5000,
        'options' => array(

            'footer-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academia_sanitize_text',
                ),
                'control' => array(
                    'label'             => esc_html__( 'Copyright Text', 'fleming' ),
                    'type'              => 'text',
                ),
            ),

        ),
    );

    return array_merge( $sections, $footer_sections );
}

add_filter( 'academia_customizer_sections', 'academia_customizer_define_footer_sections' );