var activeAssign = false;

$(document).ready(function() {
    var categories = $(".home-category");
    var cImages = categories.find("img");
    var counter = 1;
    
    if(categories.children().length > 1) {
        cImages.each(function() {
            jQuery('<img />').attr('src', $(this).attr('src')).load(function(){
                counter++;
                if(counter >= cImages.length){
                    slickPostImage(categories);
                    counter = 1;
                }
            });
        });
        

        function slickPostImage(event) {
            event.slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 6,
                dots: false,
                arrows: true,
                speed: 1000,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            infinite: true,
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    }
                ]
            });
        }
    }

    $("body").on("click", "button.slick-arrow", function(e) {
            e.preventDefault();
    });

});

$( window ).on( "load", readyFn );

function readyFn() {
    var activeCategory = $(".search-category").children().find("a.active:eq(0)").parent().parent();

    $(".search-category .f-category:eq(0)").before(activeCategory);
    console.log($(".search-category").children().find("a.active"));

    activeAssign = true;
    console.log(activeAssign);

    if(activeAssign) {
        var categories = $(".search-category");
        var cImages = categories.find("img");
        var counter = 1;
    
        if(categories.children().length > 1) {
    
            cImages.each(function() {
                jQuery('<img />').attr('src', $(this).attr('src')).load(function(){
                    counter++;
                    if(counter >= cImages.length){
                        slickPostImage(categories);
                        counter = 1;
                    }
                });
            });
            
    
            function slickPostImage(event) {
                event.slick({
                    infinite: true,
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    dots: false,
                    arrows: true,
                    speed: 1000,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                infinite: true,
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                        }
                    ]
                });
            }
        }
    

    }
}

$(document).ready(function() {
    $("body").on("click", "button.slick-arrow", function(e) {
            e.preventDefault();
    });
});