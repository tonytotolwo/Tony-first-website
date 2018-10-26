( function( api ) {

	// Extends our custom "corporate-education" section.
	api.sectionConstructor['corporate-education'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
