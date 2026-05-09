function changeSizeiview(n) {
	
 var w = n.value;
 var pic = document.getElementById("pic");
pic.style.width = w+'%';
pic.style.margin='auto';
}
$(function(){
    var stickyHeaderTop = $('#mysvgbox').offset().top;
    $(window).scroll(function(){
            if( $(window).scrollTop() > stickyHeaderTop ) {
                      $('#mysvgbox').addClass("sticky");
					   $('#mysvgboxx').addClass("stickyx");
            } else {
                      $('#mysvgbox').removeClass("sticky");
					   $('#mysvgboxx').removeClass("stickyx");
            }
    });
});

$( document ).on( "pagecreate", "#demo-page", function() {
    $( document ).on( "swipeleft swiperight", "#demo-page", function( e ) {
        // We check if there is no open panel on the page because otherwise
        // a swipe to close the left panel would also open the right panel (and v.v.).
        // We do this by checking the data that the framework stores on the page element (panel: open).
        if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
            if ( e.type === "swipeleft" ) {
                $( "#right-panel" ).panel( "open" );
            } else if ( e.type === "swiperight" ) {
                $( "#left-panel" ).panel( "open" );
            }
        }
    });
});
