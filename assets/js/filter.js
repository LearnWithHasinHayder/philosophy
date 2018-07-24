;(function ($) {
    $(document).ready(function () {
        //alert("Yello");
        setTimeout(function () {
            console.log("trying");
            var containerBricks = $('.masonry');
            containerBricks.masonry('hideItemElements',$(".yelp"));
            $(".yelp").css('display','none');
            containerBricks.masonry('layout');
            // $grid.isotope( 'hideItemElements', elements )
        }, 5000);
    });
})(jQuery);