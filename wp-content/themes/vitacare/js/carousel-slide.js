$(document).ready(function() {
    $(".owl-carousels").owlCarousel({
     
        //Basic Speeds
        slideSpeed : 200,
        paginationSpeed : 800,
     
        //Autoplay
        autoPlay : true,
        goToFirst : true,
        goToFirstSpeed : 1000,
     
        // Navigation
        navigation : false,
        navigationText : ["prev","next"],
        pagination : true,
        paginationNumbers: false,
     
        // Responsive 
        responsive: true,
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,3],
        itemsMobile : [479,1]
     
    })
});