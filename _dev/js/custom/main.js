$( document ).ready( function() {

	let logoHeight = $( '.navbar-brand img' ).height();

	$( '.navbar-brand' ).css( 'height', logoHeight + 'px' );

	// Masthead search
	$( '.masthead-search' ).keypress( function( e ) {
		if ( 13 === e.which ) {
			let searchVal = $( this ).val();
			window.location.href = '/courses?q=' + searchVal;
		}
	} );

	var title = $( '.landing-masthead .fallback-title h2, .landing-masthead .masthead-copy-area h2' ).text();
	$( '.landing-masthead .fallback-title h2, .landing-masthead .masthead-copy-area h2' ).replaceWith( '<h1>' + title + '</h1>' );

	$( '.sidebar.nav-sidebar ul' ).addClass( 'nav sidenav-menu' );

	$( '.cff-header' ).remove();

	// fade in/out for scroll to top button
	$( '.scroll-top' ).hide();

	$( window ).scroll( function() {
		var distance = $( this ).scrollTop();

		if ( 200 < distance ) {

			// if the window's position is greater than 200 pixels away from the top
			// of the page, fade the scroll button in
			$( '.scroll-top' ).fadeIn();
		} else {

			// if not, fade the button so it's out of the way
			$( '.scroll-top' ).fadeOut();
		}
	} );

	// add smooth scrolling for in-page anchor links
	$( 'a[href^="#"]' ).attr( 'data-scroll', '' );

	// clean up some junk
	$( 'article figure' ).removeAttr( 'style' );

	$( 'article img' ).removeAttr( 'width' ).removeAttr( 'height' );

	// set focus to the search bar when it's been exposed
	// at sizes larger than 767px.
	$( '.dropdown' ).on( 'shown.bs.dropdown', function( event ) {
		var dropdown = $( event.target );

		setTimeout( function() {
			dropdown.find( '.search-query.form-control' ).focus();
		}, 10 );
	} );

	// Make sure that iframes and embeds are wrapped properly for responsive display
	// collect everything that might contain embedded content
	var allIframes = $( 'iframe[ src*="//player.vimeo.com" ], iframe[ src*="//www.youtube.com" ], iframe[ src*="//www.google.com/maps" ], object, embed' );

	allIframes.each( function() {

		// clean up the iframe element and add a
		// responsive class to key on later for adding wrappers
		$( this ).removeAttr( 'height width' ).addClass( 'embed-responsive-item' );

		// add a wrapper around the iframe
		$( this ).wrap( '<div class="embed-responsive embed-responsive-16by9"></div>' );
	} );

	// Protect against tabnapping.
	$( 'a[href="_blank"]' ).each( function() {
		$( this ).attr( 'rel', 'noopener noreferrer' );
	} );

	// facebook feed styling fixes
	$( '.header-text' ).removeAttr( 'style' );

	// add class to figures that contain
	// images with the class "headshot"
	$( '.headshot' ).each( function() {
		if ( $( this ).parent( 'figure' ) ) {
			$( this ).parent().addClass( 'headshot-figure' );
		}
	} );

	// Guhhh. Events Calendar stuff.
	$( '.tribe-events-ical.tribe-events-button' ).removeClass( 'tribe-events-ical tribe-events-button' ).addClass( 'btn btn-primary btn-sm' );
	$( '.tribe-events-gcal.tribe-events-button' ).removeClass( 'tribe-events-gcal tribe-events-button' ).addClass( 'btn btn-primary btn-sm' );
	$( '.tribe-events-sub-nav' ).css( 'display', 'none' );
	$( '.tribe-bar-views-inner select' ).addClass( 'form-control' );
	$( '#tribe-bar-date, #tribe-bar-search' ).addClass( 'form-control' );
	$( '.tribe-events-gmap' ).addClass( 'btn btn-primary btn-sm' );
	$( '.tribe-events-venue-details a:first-of-type' ).after( '<br>' );
	$( '.tribe-events-event-image' ).remove();

	$( 'article table' ).each( function() {
		$( this ).removeAttr( 'style' ).find( 'td' ).removeAttr( 'style' );
	} );

	$( 'form .gfield_checkbox li, form .gfield_radio li' ).each( function() {
		$( this ).children( 'label' ).append( function() {
			return $( this ).siblings( 'input' );
		} );
	} );

	$( '.widget-title ~ ul' ).addClass( 'widget-list' );
} );

let timer = 0;

// This function pushes the footer down
// on pages that have short content
$( window ).on( 'load resize', function stickyFooter() {

	// sticky footer stuff
	let windowHeight = $( window ).height(),
		adminBarHeight = $( '#wpadminbar' ).height(),
		contentHeight = $( '.wrapper' ).outerHeight(),
		footerHeight = $( 'footer' ).outerHeight();

	if ( contentHeight + footerHeight < windowHeight ) {
		if ( $( '#wpadminbar' ).length ) {
			$( '.wrapper' ).css( 'margin-bottom', windowHeight - ( contentHeight + footerHeight + adminBarHeight ) );
		} else {
			$( '.wrapper' ).css( 'margin-bottom', windowHeight - ( contentHeight + footerHeight ) );
		}
	}
} );

// Resize the masthead so that it better keeps the aspect ratio
// of the original background image regardless of screen width.
$( window ).on( 'resize', function mastheadSize() {

	var width = $( '.jumbotron' ).width();
	var height = $( '.jumbotron .row' ).height();
	var mqxs = window.matchMedia( 'screen and ( max-width: 767px )' );

	if ( mqxs.matches === false || typeof mqxs.matches === undefined ) {
		$( '.jumbotron.upper-masthead' ).css( 'padding-top', width * 0.265 - height );
		$( '.jumbotron.lower-masthead' ).css( 'padding-bottom', width * 0.43 - height );
		$( '.jumbotron.landing-masthead' ).css( 'padding-top', width * 0.329 - height );
		$( '.jumbotron.landing-masthead' ).css( 'text-align', 'right' );
	} else {
		$( '.jumbotron.landing-masthead' ).css( 'padding-top', width * 0.5 - height );
		console.log( $( window ).width() );
	}

} ).trigger( 'resize' );

$( window ).on( 'load resize', function sidebarFix() {

	// what size are we targeting?
	var mqsm = window.matchMedia( 'screen and ( max-width: 991px )' );

	// Save the heading text. We'll need that in a sec.
	var headingText = $( '.nav-sidebar h3, .nav-sidebar button' ).text();

	// clear the timeout so we can start fresh
	clearTimeout( timer );

	timer = setTimeout( function() {

		if ( false === mqsm.matches ) {

			// Make sure that the dropdown container div is gone.
			if ( $( '.nav-sidebar .dropdown' ).length ) {
				$( '.nav-sidebar .dropdown ul' ).unwrap();
			}

			// Replace the button with a proper heading element
			$( '.nav-sidebar button' ).replaceWith( '<h3>' + headingText + '</h3>' );

			// Fix the menu
			$( '.nav-sidebar ul' ).removeClass( 'dropdown-menu' ).addClass( 'nav sidenav-menu' );

		} else {

			// wrap the list in a container div
			$( '.nav-sidebar' ).wrapInner( '<div class="dropdown"></div>' );

			// Replace the class in the dropdown menu
			$( '.nav-sidebar ul' ).removeClass( 'nav sidenav-menu' ).addClass( 'dropdown-menu' ).attr( 'aria-labelledby', 'sidebar-nav-btn' );

			// Change the heading to a button

			$( '.nav-sidebar h3' ).replaceWith( '<button class="btn btn-primary" id="sidebar-nav-btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' + headingText + '&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></button>' );
		}

	}, 300 );

} ).trigger( 'resize' );

const scroll = new SmoothScroll( 'a[href*="#"]', {

	// Selectors
	ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
	header: null, // Selector for fixed headers (must be a valid CSS selector)
	topOnEmptyHash: true, // Scroll to the top of the page for links with href="#"

	// Speed & Easing
	speed: 666, // Integer. How fast to complete the scroll in milliseconds
	easing: 'cubic-bezier(0.77, 0, 0.175, 1)', // Easing pattern to use

	// History
	updateURL: true, // Update the URL on scroll
	popstate: true, // Animate scrolling with the forward/backward browser buttons (requires updateURL to be true)

	// Custom Events
	emitEvents: true // Emit custom events
} );

$( '.btn-enroll' ).hover(
	function() {
		$( this ).find( 'i' ).last().remove().prepend( '<i class="fas fa-lightbulb"></i>' );
	}, function() {
		$( this ).find( 'i' ).last().remove().prepend( '<i class="far fa-lightbulb"></i>' );
	}
);
