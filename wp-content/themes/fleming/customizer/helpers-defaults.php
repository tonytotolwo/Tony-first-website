<?php

function academia_option_defaults() {
    $defaults = array(

        // Copyright
        'footer-text'                         => sprintf( esc_html__( 'Copyright &copy; %1$s %2$s.', 'fleming' ), date( 'Y' ), get_bloginfo( 'name' ) ),
    );

    return $defaults;
}

function academia_get_default( $option ) {
    $defaults = academia_option_defaults();
    $default  = ( isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : false;

    return $default;
}
