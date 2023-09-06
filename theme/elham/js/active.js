(function($) {
    "use strict";
    $(document).on('ready', function() {

        /*====================================
        	Header Sticky JS
        ======================================*/
        jQuery(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                $('.header-inner').addClass("sticky");
            } else {
                $('.header-inner').removeClass("sticky");
            }
        });
        /*====================================
        	Mobile Menu JS
        ======================================*/
        $('.main-category').slicknav({
            prependTo: ".menu-category-one",
            label: '',
            duration: 100,
            easingOpen: "easeOutBounce",

        });
        /*====================================
        	Mobile Menu JS
        ======================================*/
        $('.main-menu').slicknav({
            prependTo: ".menu-category-menu",
            label: '',
            duration: 100,
            easingOpen: "easeOutBounce",

        });

        $('.topbar-icon').on("click", function() {
            $('.top-left').toggleClass('active');
        });

        $('.mobile-cart-nav,.close-sm-menu').on("click", function() {
            $('.mobile-menu-actives').toggleClass('active');
        });


        $('.filter-menu,.cat-open-close').on("click", function() {
            $('.shop-sidebar-inner').toggleClass('active');
        });


        $(document).on('click','.product-button.prc-button', function() {
            $(this).addClass("active");
        });

        $('.cart-boxed,.close-button').on("click", function() {
            $('.shopping-item').toggleClass('active');
        });


        /*====================================
        	Perfect ScrollBar
        ======================================*/
        $('.shopping-list,.shop-sidebar-active').perfectScrollbar();

        /*====================================
        	Wow JS
        ======================================*/
        var window_width = $(window).width();
        if (window_width > 767) {
            new WOW().init();
        }


        /*=====================================
        	Video Popup
        ======================================*/
        $('.video-popup').magnificPopup({
            type: 'iframe',
            removalDelay: 300,
            mainClass: 'mfp-fade'
        });

        /*================================
        	Hero Slider JS
        ==================================*/
      
        /*================================
        	Hero Slider JS
        ==================================*/
        
        /*================================
        	Hero Slider JS
        ==================================*/
        
        /*================================
        	Hero Slider JS
        ==================================*/
        

        /*================================
        	Hero Slider JS
        ==================================*/
        $('.c-down-slider').owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            smartSpeed: 500,
            merge: true,
            nav: true,
            navText: ['<i class="icofont-simple-left" aria-hidden="true"></i>', '<i class="icofont-simple-right" aria-hidden="true"></i>'],
            dots: false,
            margin: 0,
        });

        /*================================
        	Partner Slider JS
        ==================================*/
        


        /*================================
        	Product Latest JS
        ==================================*/
        
        /*================================
        	Product Slider JS
        ==================================*/
        $('.product-slider-home').owlCarousel({
            items: 3,
            autoplay: true,
            loop: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            smartSpeed: 500,
            merge: true,
            nav: true,
            navText: ['<i class="icofont-rounded-double-left" aria-hidden="true"></i>', '<i class="icofont-rounded-double-right" aria-hidden="true"></i>'],
            dots: false,
            margin: 30,
            responsive: {
                300: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1170: {
                    items: 3,
                },
            }
        });
        /*================================
        	Product Slider JS
        ==================================*/
        
        // TODO Disabled by mutaman
        // $('select').niceSelect();

        /*====================================
        	Flex Slider JS
        ======================================*/
        (function($) {
            'use strict';
            $('.flexslider-thumbnails').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
            });
        })(jQuery);


        /*====================================
        	CountDown
        ======================================*/
        


        /*==================================
			Product page Quantity Counter
		 ===================================*/
        $(document).on('click','.add_to_cart', function() {
            var $qty = $('.input-number');
            var $button = $(this);
            var $input = $button.closest('.quantity').find("input.input-number");
            var currentVal = parseInt($input.val(), 10);
            if (!isNaN(currentVal)) {
               
                $input.val(currentVal + 1);
            }
        });
        $(document).on('click','.add_to_decrease_cart', function() {
            var $qty = $('.input-number');
            var $button = $(this);
            var $input = $button.closest('.quantity').find("input.input-number");
            var currentVal = parseInt($input.val(), 10);
            
            if (!isNaN(currentVal) && currentVal > 1) {

                $input.val(currentVal - 1);
            }
        });

        $(document).on('click','.qty_increase', function() {

            var $qty = $('.input-number');
            var $button = $(this);
            var $input = $button.closest('.quantity').find("input.input-number");
            var currentVal = parseInt($input.val(), 10);
            if (!isNaN(currentVal)) {
             
                if ($('.input_qty').data('max') <= currentVal) {
                    Sweet('error',$('.input_qty').data('max')+' Pieces Available Only');
                    return false;
                }
                else{
                   
                    $input.val(currentVal + 1);
                }
                
            }
        });

        $('.minus_qty').on('click', function() {
            var $qty = $('.input-number');
            var $button = $(this);
            var $input = $button.closest('.quantity').find("input.input-number");
            var currentVal = parseInt($input.val(), 10);
            if (!isNaN(currentVal) && currentVal > 1) {
                $input.val(currentVal - 1);
            }
        });

        /*=====================================
        	Others JS
        ======================================*/
        
        





    });


  

})(jQuery);

// function ActiveCarousel(target,item_limit=5,nav=true) {
//    $(target).owlCarousel({
//             items: item_limit,
//             autoplay: true,
//             loop: true,
//             autoplayTimeout: 5000,
//             autoplayHoverPause: false,
//             smartSpeed: 500,
//             merge: true,
//             nav: true,
//             navText: ['<i class="icofont-rounded-double-left" aria-hidden="true"></i>', '<i class="icofont-rounded-double-right" aria-hidden="true"></i>'],
//             dots: false,
//             margin: 30,
//             responsive: {
//                 300: {
//                     items: 2,
//                 },
//                 480: {
//                     items: 2,
//                 },
//                 768: {
//                     items: 3,
//                 },
//                 1170: {
//                     items: 5,
//                 },
//             }
//         });
// }

function ActiveCarousel(target,item_limit=5,nav=true) {
    $(target).owlCarousel({
    items: item_limit,
    autoplay: true,
    autoplayTimeout: 4900,
    autoplayHoverPause: true,
    smartSpeed: 400,
    loop: true,
    nav: true,
    navText: false,
    navContainer: ".index-products-slider-nav",
    dots: false,
    rtl: MdsConfig.rtl,
    lazyLoad: true,
    responsive: {
        0: {
            items: 2,
            slideBy: 2,
        },
        576: {
            items: 3,
            slideBy: 3,
        },
        768: {
            items: 4,
            slideBy: 4,
        },
        992: {
            items: 5,
            slideBy: 5,
        },
    }
});

var owl = $('.owl-carousel');
owl.owlCarousel();
// Go to the next item
$('.next-owl').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev-owl').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})
}


function runCountdown() {
    $('[data-countdown]').each(function() {
            var $this = $(this);
            var finalDate = $(this).data('countdown');
           
           
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime(
                    '<div class="cdown-main"><div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div><div class="cdown"><span class="minutes"><strong>%M</strong> <p>Min.</p></span></div><div class="cdown"><span class="second"><strong>%S</strong><p>Sec.</p></span></div></div>'
                ));
            });
        });
}

function quickViewSlider(target) {
    
    console.log(target)
    $(target).owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            smartSpeed: 500,
            merge: true,
            nav: true,
            navText: ['<i class="icofont-simple-left" aria-hidden="true"></i>', '<i class="icofont-simple-right" aria-hidden="true"></i>'],
            dots: false,
            margin: 0,
    });
}


// Added By Mutaman For Remove From Cart BUtton 

function removeCartDiscountCoupon() {
    // Get the form element using its ID
    var form = document.getElementById("removeCartDiscountForm");
  
    // Submit the form
    form.submit();
  }


//Added by mutaman--- Function to check if a product is in the wishlist
function isProductInWishlist(productId) 
{
    // Loop through the wishlist array
    for (var i = 0; i < converted_wishlist_content.length; i++) {
      // Check if the current object's 'id' property matches the productId
      if (converted_wishlist_content[i].id === productId) {
        return true; // Product is in the wishlist
      }
    }
    return false; // Product is not in the wishlist
}

