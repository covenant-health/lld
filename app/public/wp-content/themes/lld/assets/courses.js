( function( $ ) {
	let count = $( '.courses-count' ),
		endMsg = $( '.courses-results-end' ),
		head = $( '.courses-head' ),
		loading = $( '.courses-loading' ),
		results = $( '.courses-results-list' ),
		url = courses.rest_url + 'courses';

	$( count, head, endMsg ).hide();
	//$( loading ).hide();

	getData();

	function getData() {
		let queryString = '';
		if ( sessionStorage.getItem( 'search_filters' ) !== '' ) {
			queryString = '?' + sessionStorage.getItem( 'search_filters' );
		}
		let updatedUrl = url + queryString;

		$.ajax( {
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			async: true,
			type: 'GET',
			url: updatedUrl,
			data: {
				per_page: 100
			},
			success: function( data, status, jqXHR ) {
				console.log( data );
				$( endMsg, count, head ).hide();
				$( loading ).show();
				if ( status ) {
					console.log( status );
				}
				let posts = parseInt( jqXHR.getResponseHeader( 'x-wp-total' ) );
				if ( ! data.length ) {
					count.show().addClass( 'text-danger' ).text( 'No results. Please try a different set of search criteria.' );
					loading.hide();
				} else {
					loadData( data, posts );
				}
			},
			error: function( error, status, jqXHR ) {
				count.show().addClass( 'text-danger' ).text( 'No results. Please try a different set of search criteria.' );
				head.hide();
				loading.hide();
				endMsg.show();
				if ( error || status || jqXHR ) {
					console.log( 'Errors found.' );
				}
			}
		} );

		function loadData( data, posts ) {
			let course = '';

			// Loop through all the courses and output them to the page.
			for ( let c = 0; c < data.length; c++ ) {
				course += '<li data-course-id="' + data[c].id + '">';

				for ( let p = 0; p < data[c].programs.length; p++ ) {
					course += '<div class="course-title ' + data[c].programs[p].slug + '">';
				}

				course += '<a href="' + data[c].link + '" title="' + data[c].title.rendered + '">';
				course += data[c].title.rendered;
				course += '</a>';
				course += '</div>';

				// Course details section
				course += '<div class="course-details">';
				course += '<div class="row">';

				for ( let l = 0; l < data[c].locations.length; l++ ) {
					course += '<div class="col-xs-12 col-sm-6">';
					course += '<p><strong>Location</strong><br>';
					course += data[c].locations[l].name;
					course += '</p>';
					course += '</div>';
				}

				for ( let i = 0; i < data[c].locations.length; i++ ) {
					course += '<div class="col-xs-12 col-sm-6">';
					course += '<p><strong>Instructor</strong><br>';
					course += data[c].instructors[i].name;
					course += '</p>';
					course += '</div>';
				}

				for ( let p = 0; p < data[c].locations.length; p++ ) {
					course += '<div class="col-xs-12 col-sm-6">';
					course += '<p><strong>Program</strong><br>';
					course += data[c].programs[p].name;
					course += '</p>';
					course += '</div>';
				}

				for ( let k = 0; k < data[c].locations.length; k++ ) {
					course += '<div class="col-xs-12 col-sm-6">';
					course += '<p><strong>Category</strong><br>';
					course += data[c].categories[k].name;
					course += '</p>';
					course += '</div>';
				}

				course += '</div>';
				course += '<div class="course-desc">' + data[c].excerpt.rendered + '</div>';
				course += '</div>';
				course += '</li>';
			}

			$( loading ).hide();
			$( results ).append( course );
		}
	}

	$( '#filter-results' ).on( 'click', function( e ) {
		e.stopPropagation();
		e.stopPropagation();
		e.preventDefault();
		results.empty();
		count.hide();
		head.hide();
		endMsg.hide();
		$( loading ).show();

		let filters = $( '#search, #location, #instructor, #program, #category' ).serialize().replace( /&?[^=&]+=(&|$)/g, '' );

		if ( 1 > filters.length || ! typeof ( filters ) ) {
			$( '.user-msg' ).show().find( 'p' ).addClass( 'bg-danger text-danger' ).text( 'Please enter a search term or select a filter above, then resubmit the form.' );
		} else {
			$( '.user-msg' ).show().find( 'p' ).addClass( 'bg-success text-success' ).text( 'Success! Your search filters will persist until you reset the form or close the browser window.' );
			sessionStorage.removeItem( 'search_filters' );
			sessionStorage.setItem( 'search_filters', filters );
			getData();
		}
	} );

	// Reset the form and kill off the storage item for
	// any search filters that have been set.
	$( '#reset-form' ).on( 'click', function( e ) {
		e.stopPropagation();
		e.preventDefault();
		results.empty();
		$( '.user-msg' ).hide();
		count.hide();
		loading.show();

		$( '#specialty, #location' ).prop( 'selectedIndex', 0 );
		$( '#search' ).val( '' );

		if ( sessionStorage.getItem( 'search_filters' ) ) {
			sessionStorage.removeItem( 'search_filters' );
		}

		getData();
	} );

	$( '#filter-results, #reset-form, .opps-next-page, #search, #location, #instructor, #program, #category' ).keypress( function() {
		$( this ).keypress( function( e ) {
			let keycode = ( e.keyCode ? e.keyCode : e.which );
			if ( keycode === '13' ) {
				$( this ).click();
			}
		} );
	} );
} )( jQuery );
