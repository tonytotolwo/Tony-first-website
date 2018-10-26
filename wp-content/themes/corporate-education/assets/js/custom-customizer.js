/**
 * Add a listener to update other controls to new values/defaults.
 */

( function( api ) {

    wp.customize( 'corporate_education_theme_options[reset_options]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: corporate_education_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );

} )( wp.customize );