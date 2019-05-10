(function($){
	$('.slideshow').each(function(){
		var autoPlay = $(this).data('autoplay'),
			items = $(this).data('items'),
			singleItem = $(this).data('singleitem');
		if ( autoPlay == 0 || autoPlay == false ) {
			autoPlay = false;
		}

		if ( singleItem ) {
			singleItem = true;
		}
		else {
			singleItem = false;
		}

		if ( items == 0 ) {
			items: false
		}

		$(this).owlCarousel({
			singleItem: singleItem,
			autoPlay: autoPlay,
			items: items
		});
	});

})(jQuery);

function openNav() {
  document.getElementById("myNav").style.width = "100%";
  document.getElementById("myNav").style.zIndex = "99999999999999999999999";

}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


(function($) {


function new_map( $el ) {

	var $markers = $el.find('.marker');

	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map( $el[0], args);


	map.markers = [];

	$markers.each(function(){

    	add_marker( $(this), map );

	});


	center_map( map );

	return map;

}



function add_marker( $marker, map ) {


	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );


	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});


	map.markers.push( marker );


	if( $marker.html() )
	{

		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});


		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}



function center_map( map ) {

	var bounds = new google.maps.LatLngBounds();

	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	if( map.markers.length == 1 )
	{
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{

		map.fitBounds( bounds );
	}

}


var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		map = new_map( $(this) );

	});

});

})(jQuery);




jQuery(function( $ ){

	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault();

		var target = this.hash;
		var $target = $(target);

		if ( $(window).width() > 1023 ) {
			var $scrollTop = $target.offset().top-120;
		} else {
			var $scrollTop = $target.offset().top;
		}

		$('html, body').stop().animate({
			'scrollTop': $scrollTop
		}, 900, 'swing');
	});

});
