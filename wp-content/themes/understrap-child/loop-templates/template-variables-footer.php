<?php include(locate_template('inc/acf-variables.php')); ?>
<!-- enqueue js -->
<?php if(is_category('directory')&&($js && in_array('Isotope Filter & Sort', $js))): // check for isotope filter & sort option ?>
    <!-- Isotope Filter & Sort -->
	<script src="<?php echo get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js'; ?>"></script>
	<script src="<?php echo get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js'; ?>"></script>
<?php endif; ?>
<?php if($js && in_array('Modernizr', $js)): //  check for modernizr option ?>
    <!-- modernizr custom -->
    <script src="<?php echo get_stylesheet_directory_uri() . '/js/modernizr-custom.min.js'; ?>"></script>
<?php endif; ?>
<?php if( $js && in_array('Social Share', $js) ): // check for social share option ?>
    <!-- social share -->
    <script type="text/javascript">
    jQuery(document).ready(function(o){o(".share-social").click(function(){var e=window.open(o(this).prop("href"),"","menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600");return window.focus&&e.focus(),!1})});
</script>
<?php endif; ?>
<?php if($js && in_array('Viewport Checker', $js)): // check for viewport checker option?>
<!-- viewport checker -->
    <script src="<?php echo get_stylesheet_directory_uri() . '/js/viewportchecker.min.js'; ?>"></script>
<?php endif; ?>
<?php if($modernizr_detects && in_array('CSS Object Fit', $modernizr_detects)): // check for modernizr detects ?>
    <!-- css object fill -->
	<script type="text/javascript">
		if (!Modernizr.objectfit) {
			$('.post-image-container').each(function () {
				var $container = $(this),
					imgUrl = $container.find('img').prop('src');
				if (imgUrl) {
				$container
					.css('backgroundImage', 'url(' + imgUrl + ')')
					.addClass('compat-object-fit');
				}  
			});
		}
	</script>
<?php endif; ?>
<?php if($modernizr_detects && in_array('SVG', $modernizr_detects)): // check for modernizr detects ?>
    <!-- svg -->
    <script type="text/javascript">
        if (!Modernizr.svg) {
            $('img.logo').attr('src', '<?php echo $site_primary_logo_url; ?>');
    	}
    </script>
<?php endif; ?>
<?php if($applications && in_array('Google Maps', $applications)): // check for google maps ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $application_google_maps_api_key ?>"></script>
<script type="text/javascript">
(function($) {
/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
function new_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		disableDefaultUI: false,
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		panControl: false,
    	scrollwheel: true,
		styles: [
			{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#373737"
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
					{
						"color": "#f2f2f2"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
					{
						"saturation": -100
					},
					{
						"lightness": 2
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"color": "#deebf6"
					},
					{
						"visibility": "on"
					}
				]
			}
		]
	};
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	// add a markers reference
	map.markers = [];
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	// center map
	center_map( map );
	// return
	return map;
}
/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/
function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	// create marker
	var icon = {
		url: '/wp-content/uploads/2020/04/csp-blue-map-marker.svg', // url
		scaledSize: new google.maps.Size(35, 35), // scaled size
	}
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: icon	
	});
	// add to array
	map.markers.push( marker );
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );
		});
	}
}
/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/
function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}
/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;
$(document).ready(function(){
	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
	});
});
})(jQuery);
</script>
<?php endif; ?>
<?php if(is_category('directory')&&($js && in_array('Isotope Filter & Sort', $js))): // check for isotope filter & sort option ?>
<script>
jQuery(document).ready(function ($) {
	// filtering with url hash
	function getHashFilter() {
		// get filter=filterName
		var matches = location.hash.match( /filter=([^&]+)/i );
		var hashFilter = matches && matches[1];
		return hashFilter && decodeURIComponent( hashFilter );
	}
	// // init Isotope
	// var $grid = $('.grid').isotope({
	// // options
	// });
	// // filter items on button click
	// $('.filter-button-group').on( 'click', 'button', function() {
	// 	var filterValue = $(this).attr('data-filter');
	// 	//removes class from all items to "clear" the class from your menu
	// 	$('button').removeClass('current');
	// 	//adds the class to whichever item you clicked
	// 	$(this).addClass('current');
	// 	$grid.isotope({
	// 		filter: filterValue,
	// 		layoutMode: 'fitRows'
	// 	});
	// });
	// init Isotope
	var $grid = $('.grid');
	// bind filter button click
	var $filterButtonGroup = $('.filter-button-group');
	$filterButtonGroup.on( 'click', 'button', function() {
		var filterAttr = $( this ).attr('data-filter');
		// set filter in hash
		location.hash = 'filter=' + encodeURIComponent( filterAttr );
	});
	var isIsotopeInit = false;
	function onHashchange() {
		var hashFilter = getHashFilter();
		if ( !hashFilter && isIsotopeInit ) {
			return;
	}
	isIsotopeInit = true;
	// filter isotope
	// use imagesLoaded, instead of window.load
	$grid.imagesLoaded().progress( function() {
		$grid.isotope({
			layoutMode: 'fitRows',
			// use filterFns
			filter: hashFilter
		});
	})
	// set selected class on button
	if (hashFilter) {
		$filterButtonGroup.find('.active').removeClass('active');
		$filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('active');
	}
	}
	$(window).on( 'hashchange', onHashchange );
	// trigger event handler to init Isotope
	onHashchange();
});
</script>
<?php endif; ?>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<!-- compiled scripts -->
<script type="text/javascript">
jQuery(document).ready(function ($) {
	var nav = $('.navbar');
	var navicon = $('.navbar-toggler-icon i');
	var navdropdown = $('#navbarNavDropdown');
	var stickyTop = $('.sticky-top');
	navicon.click(function(event){
		// reset
		navdropdown.removeClass('show');
		// toggle
		navicon.toggleClass('fa-bars fa-times');
		if (navicon.hasClass('fa-times')) {
			navdropdown.show();
		} else {
			navdropdown.hide();
		}
	});
    window.onscroll = function changeClass(){  
		var scrollPosY = window.pageYOffset | document.body.scrollTop;
		var top_of_element = stickyTop.offset().top;
		var bottom_of_element = stickyTop.offset().top + stickyTop.outerHeight();
		var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
		var top_of_screen = $(window).scrollTop();
		// if element is top of screen
		if (top_of_element == top_of_screen){
			// add class
			stickyTop.addClass('sticky-top-shadow');
		} else {
			// remove class
			stickyTop.removeClass('sticky-top-shadow');
		}
		// if scroll position is greater than 1px
		if (scrollPosY >= 1) {
			// add class
			nav.addClass('navbar-scroll');
			navdropdown.hide();
			navicon.removeClass('fa-times');
			navicon.addClass('fa-bars');
        } else if(scrollPosY >= 0) {
			// remove class
			nav.removeClass('navbar-scroll');
			nav.removeClass('navbar-refresh');
        }
	}
	var hero = $( ".navbar-toggler" );
	var offset = hero.offset().top;
	if (offset > 100) {
		nav.addClass('navbar-refresh');
	}
});
</script>