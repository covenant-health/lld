( function( $ ) {
	let count = $( '.courses-count' ),
		endMsg = $( '.courses-results-end' ),
		head = $( '.courses-head' ),
		loading = $( '.courses-loading' ),
		results = $( '.courses-results-list' ),
		userMsg = $( '.user-msg p' ),
		queryString = '',
		url = courses.rest_url + 'courses';

	$( count, head, userMsg ).hide();

	getData();

	function getData() {
		results.empty();

		if ( -1 < window.location.href.indexOf( 'search' ) ) {
			queryString = window.location.search;
			userMsg.show().addClass( 'bg-success text-success' ).append( 'You are viewing courses based on your search criteria. <a class="reset-link" href="javascript: void(0);">Reset to view all courses</a>.' );
		}

		let updatedUrl = url + queryString;
		console.log( updatedUrl );
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
					userMsg.show().addClass( 'text-danger' ).text( 'No results. Please try a different set of search criteria.' );
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
				course += '<li id="' + data[c].id + '">';

				// Title field
				course += '<div class="course-title"><a href="' + data[c].link + '">' + data[c].title.rendered + '</a></div>';

				// Course taxes
				course += '<div class="course-tax">';
				course += '<p><span class="tax-name">Programs</span><br>';

				//  Program tax output
				for ( let i = 0; i < data[c].programs.length; i++ ) {
					course += data[c].programs[i].name + '<br>';
				}
				course += '</p>';
				course += '<p><span class="tax-name">Paths</span><br>';

				//  Program tax output
				for ( let o = 0; o < data[c].paths.length; o++ ) {
					course += data[c].paths[o].name + '<br>';
				}
				course += '</p>';
				course += '</div>';
				course += '<div class="course-desc">' + data[c].excerpt.rendered + '</div>';
				course += '</div>';
				course += '</li>';
			}

			$( loading ).hide();
			$( results ).append( course );
		}
	}

	$( '#filter' ).on( 'click', function( e ) {
		e.stopPropagation();
		e.preventDefault();
		$( loading ).show();

		let filters = $( '#search, #location, #program, #path' ).serialize();

		if ( 1 > filters.length || ! typeof ( filters ) ) {
			userMsg.show().addClass( 'bg-danger text-danger' ).text( 'Please enter a search term or select a filter above, then resubmit the form.' );
			getData();
		} else {
			userMsg.hide().removeClass();
			queryString = '?' + filters;
			getData();
		}
	} );

	// Reset the form and kill off the storage item for
	// any search filters that have been set.
	$( '#reset, .reset-link' ).on( 'click', function( e ) {
		if ( -1 < window.location.href.indexOf( 'search' ) ) {
			window.history.pushState( '', document.title, window.location.pathname );
		}

		e.stopPropagation();
		e.preventDefault();
		results.empty();
		$( '.user-msg' ).hide().removeClass();
		count.hide();
		loading.show();
		queryString = '';

		$( '#program, #location, #path' ).prop( 'selectedIndex', 0 );
		$( '#search' ).val( '' );

		getData();
	} );

	$( '#filter, #reset, .reset-link' ).keypress( function() {
		$( this ).keypress( function( e ) {
			let keycode = ( e.keyCode ? e.keyCode : e.which );
			if ( keycode === '13' ) {
				$( this ).click();
			}
		} );
	} );

	$( '#search, #location, #program, #path' ).keypress( function( e ) {
		if ( 13 === e.which ) {
			$( '#filter' ).click();
		}
	} );
} )( jQuery );
