"use strict";

render_product_preloaded(5, '.latest_products_preloader');
render_product_preloaded(5, '.new_arrivals_preloader');

render_product_preloaded(5, '.random_products_preload',);
render_product_preloaded(5, '.toprated_products_preload');


runpreloader();
ActiveCarousel('.latest_products_preloader',5,false);
ActiveCarousel('.new_arrivals_preloader',5,false);

ActiveCarousel('.random_products_preload',5,false);
ActiveCarousel('.toprated_products_preload',5,false);


var next_url = $('#next_page').val();

var categories = [];


var callbackdata = [];

if ($('.hero_slider_section').length != 0) {
   callbackdata.push({
       "key":"heroslider",
       "row":"heroslider",
       "with":['preview','description']
    });
}


if ($('.short_banner_section').length != 0) {
   callbackdata.push({
       "key":"shortbanner",
       "row":"shortbanner",
       "with":['preview','description']
    });
}


if ($('.latest_product_section').length != 0) {
   callbackdata.push({
        "key":"products",
        "row":"latest_products",
        "is_random":false,
        "limit":12,
        "with": ["preview","features","discount","medias"]
    });
}

if ($('.new_arrivals_section').length != 0) {
   callbackdata.push({
        "key":"products",
        "row":"latest_products",
        "is_random":false,
        "limit":10,
        "with": ["preview","features","discount","medias"]
    });
}


if ($('.category_section').length != 0) {
   callbackdata.push({
       "key":"categories",
       "row":"featured_category",
       "featured":1,
       "limit": 6,
       "type":"category",
       "with":['preview']
    });
}

if ($('.product_tab_section').length != 0) {
   callbackdata.push({
       "key":"productmenu",
       "row":"productmenu",
       "limit": 5,
       "type":"category",
       "with":['icon']
    },
    {
        "key":"products",
        "row":"random_products",
        "is_random":true,
        "limit":12,
        "with": ["preview","features","discount"]
    });
}

if ($('.featured_products_area').length != 0) {
   callbackdata.push({
       "key":"HomePageFeaturedWithProducts",
       "row":"home_page_featured_with_products",
       "limit":2,
       "with": ["preview"],
       "product_with":["preview","features","discount","medias"],
       "is_product_random":true
    });
}

if ($('.toprated_products_area').length != 0) {
   callbackdata.push({
        "key":"topratedproducts",
        "row":"topratedproducts",
        "limit":12,
        "with": ["preview","features","discount","medias"]
    });
}

if ($('.blog_section').length != 0) {
   callbackdata.push({
       "key":"latestblogs",
       "row":"latestblogs",
       "limit":6,
       "with": ["preview","thum_image", "excerpt"]
    });
}


if ($('.brand_section').length != 0) {
   callbackdata.push({
       "key":"categories",
       "row":"brands",
       "featured":1,
       "limit": 6,
       "type":"brand",
       "with":['preview']
    });
}




var callback_url = $('#callback_url').val();

$.ajax({
    type: 'get',
    url: callback_url,
    data: {
        body: callbackdata
    },
    dataType: 'json',
    beforeSend: function() {


    },
    success: function(response) {

      


         $('.latest_products_preloader').remove();
         $('.new_arrivals_preloader').remove();

         $('.toprated_products_preload').remove();
         $('.random_products_preload').remove();

        $('.content-preloader').remove();


        if ($('.hero_slider_section').length != 0) {
         if (response.heroslider.length != 0) {
            heroSlider(response.heroslider);
         }
         else{
            $('.hero_slider_section').remove();

         }
        }

        if ($('.short_banner_section').length != 0) {
         if (response.shortbanner.length != 0) {
            render_shortbanner(response.shortbanner);
         }
         else{
            $('.short_banner_section').remove();

         }
        }

        if ($('.latest_product_section').length != 0) {
         if (response.latest_products.length != 0) {
            render_primary_product(response.latest_products,'.latest_products','col-product',false)
         }
         else{
            $('.latest_product_section').remove();

         }
        }

        if ($('.new_arrivals_section').length != 0) {
         if (response.latest_products.length != 0) {
            render_primary_product(response.latest_products,'.new_arrivals','col-6 col-sm-4 col-md-3 col-mds-5 col-product',false)
         }
         else{
            $('.new_arrivals_section').remove();

         }
        }

        if ($('.category_section').length != 0) {
         if (response.featured_category.length != 0) {
            render_featuredcategory(response.featured_category);
         }
         else{
            $('.category_section').remove();

         }
        }


         if ($('.product_tab_section').length != 0) {
         if (response.random_products.length != 0) {
            render_primary_product(response.random_products, '.random_products','tabs-p col-lg-3 col-md-6 col-6',true);

               // edited for tabs by mutaman    
               // product menu for filter products

            $.each(response.productmenu, function(key, category) {
              var html=` <li><a class="list-group-item  filteredtab filterproducts filter_product${category.id}" data-id="${category.id}" data-items="[]" data-bs-toggle="list" href="#f-tab2" role="tab"><img src="${category.icon != null ? category.icon.content : ''}" alt="">${category.name}</a></li>`;
              $('.product_menu').append(html);

            // $.each(response.productmenu, function(key, category) {
            // var html=` <li><a class="list-group-item  filteredtab filterproducts filter_product${category.id}" data-id="${category.id}" data-items="[]" data-bs-toggle="list" href="#f-tab2" role="tab"><img src="${category.icon != null ? category.icon.content : ''}" alt="">${category.name}</a></li>`;
            // $('.product_menu').append(html);

           });

         }
         else{
            $('.product_tab_section').remove();

         }
        }


        if ($('.featured_products_area').length != 0) {

         if (response.home_page_featured_with_products.length != 0) {
            render_featured_products(response.home_page_featured_with_products);

         }
         else{
            $('.featured_products_area').remove();

         }
        }

        if ($('.toprated_products_area').length != 0) {
         if (response.topratedproducts.length != 0) {
             render_primary_product(response.topratedproducts,'.toprated_products',' col-product',true)
         }
         else{
            $('.toprated_products_area').remove();

         }
        }

        if ($('.blog_section').length != 0) {
         if (response.latestblogs.length != 0) {
             render_blogs(response.latestblogs);
         }
         else{
            $('.blog_section').remove();

         }
        }


        if ($('.brand_section').length != 0) {
         if (response.brands.length != 0) {
             render_brands(response.brands);
         }
         else{
            $('.brand_section').remove();

         }
        }

        ActiveCarousel('.latest_products');
        ActiveCarousel('.toprated_products');

        runCountdown();
    },
    error: function(xhr, status, error) {


    }
});

$(document).on('click','.filteredtab',function(){
   $('.tab2').addClass('active');
   $('.tab2').addClass('show');

   $('.tab1').removeClass('show');
   $('.tab1').removeClass('active');


})

/*=====================================
  Hero Slider Gr Shop
======================================= */

function heroSlider(data) {

    if (data.length == 0) {
        return false;
    }
    $.each(data, function(key, row) {

         var html=`


      <div class="item lazyload" style="background-image:url(${row.preview})">
         <a href="${row.link}">
            <div class="container">
               <div class="row row-slider-caption align-items-center">
                  <div class="col-12">
                     <div class="caption">
                        <h2 class="title" data-animation="fadeInUp" data-delay="0.5s" style="color: white">${row.title}</h2>
                        <p class="description" data-animation="fadeInUp" data-delay="0.5s" style="color: white">${row.description}</p>
                        <button class="btn btn-slider" data-animation="fadeInUp" data-delay="0.9s" style="background-color: black;border-color: black;color: white">${row.button_text}</button>
                     </div>
                  </div>
               </div>
            </div>
         </a>
      </div>

      `;
        $('.main-slider').append(html);
    });


    $('.hero-slider').owlCarousel({
      autoplay: true,
      autoplayTimeout: 9000,
      autoplayHoverPause: true,
      items: 1,
      loop: true,
      smartSpeed: 500,
      animateOut: (MdsConfig.sliderFadeEffect == 1) ? 'fadeOut' : '',
      rtl: MdsConfig.rtl,
      mouseDrag: true,
      touchDrag: true,
      pullDrag: true,
      nav: true,
      navText: false,
      navContainer: "#main-slider-nav",
      dots: false,
      margin: 0,
    });
    

//    $('.hero-slider').owlCarousel({
//       items: 1,
//       autoplay: true,
//       loop: true,
//       autoplayTimeout: 9000,
//       autoplayHoverPause: true,
//       smartSpeed: 500,
//       merge: true,
//       nav: true,
//       navText: false,
//       navContainer: "#main-slider-nav",
//       dots: false,
//       margin: 0,
//   });

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



/*=====================================
  Short Banner
======================================= */

function render_shortbanner(data) {

   if (data.length == 0) {
        return false;
    }
    data.forEach(function(row) {

         var button=row.button_text != '' ? `
                                 <a href="${row.link}" class="theme-btn primary">${row.button_text}</a>
                              ` : '';

         var html=`

                   <div class="col-6 col-index-bn index_bn_${row.id}">
                       <a href="${row.link}">
                           <img src="${row.preview}" data-src="${row.preview}" alt="banner" class="lazyload img-fluid">

                       </a>
                   </div>
               `;
               
               $('.short_banner_' + row.banner_location).append(html);
            });
}

/*=====================================
  Latest Blog Slider
======================================= */

function render_blogs(data) {
     var blog_read_more=$('#blog_read_more').val();

     $.each(data,function(key, row) {

         var html=`
                  <div class="blog-item">
                     <div class="blog-item-img">
                           <a href="${row.url}">
                              <img src="${preloader}" data-src="${row.thum_image}" alt="${row.title}" class="img-fluid lazyload"/>
                           </a>
                     </div>
                     <h3 class="blog-post-title">
                           <a href="${row.url}">
                              ${escapeHtml(row.title)}
                           </a>
                     </h3>
                     <div class="blog-post-meta">
                           <a href="generate_url">
                              <i class="icon-folder"></i>category
                           </a>
                           <span><i class="icon-clock"></i>${escapeHtml(row.time)}</span>
                     </div>
                     <div class="blog-post-description">
                           ${escapeHtml(row.short_description)}
                     </div>
                  </div>
               `;

      $('.latest_blogs').append(html);
   });





   // Owl carosel - Blog Slider

   $('.latest_blogs').owlCarousel({
      items: 3,
      autoplay: false,
      autoplayTimeout: 4900,
      autoplayHoverPause: true,
      loop: true,
      smartSpeed: 300,
      // swipe: true,
      rtl: MdsConfig.rtl,
      lazyLoad: true,
      nav: true,
      navText: false,
      navContainer: "#blog-slider-nav",
      dots: false,
      responsive: {
          0: {
              items: 1,
              slideBy: 1
          },
          768: {
              items: 2,
              slideBy: 1
          },
          992: {
              items: 3,
              slideBy: 1
          }
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
  

   data.length == 0 ? $('.blog_section').remove() : run_lazy();


}

function render_featuredcategory(data) {
   if (data.length == 0) {
      $('.featured_category').remove();
      return false;
   }

   //  edited to show only six categories at homepage
   // $.each(data.slice(0, 6), function(key, row)  {

   $.each(data,function(key, row) {
      var preview=row.preview != null ? row.preview.content : defaut_img;



      //   var html=`<div >
      //          <a href="${base_url+'/category/'+row.slug}">
      //             <div class="single-category text-center">
      //                <div class="category-img">
      //                   <img src="${preloader}" class="lazy" data-src="${preview}" alt="${row.name}">
      //                </div>
      //                <div class="category-name">
      //                   <h4>${row.name}</h4>

      //                </div>
      //             </div>
      //          </a>
      //       </div>`;

      // $('.department-slider').append(html);

      var html=`                               

      <div class="card lazyload lazy" data-bg="${preview}">
            <a href="${base_url+'/category/'+row.slug}">
               <div class="caption text-truncate">
                     <span>${escapeHtml(row.name)}</span>
               </div>
            </a>
         </div>
         `;
      $('.department-slider').append(html);




   });

   // $('.department-slider').owlCarousel({
   //          items: 4,
   //          autoplay: true,
   //          loop: true,
   //          autoplayTimeout: 5000,
   //          autoplayHoverPause: false,
   //          smartSpeed: 500,
   //          merge: true,
   //          nav: true,
   //          navText: ['<i class="icofont-rounded-double-left" aria-hidden="true"></i>', '<i class="icofont-rounded-double-right" aria-hidden="true"></i>'],
   //          dots: false,
   //          margin: 30,
   //          responsive: {
   //              300: {
   //                  items: 2,
   //                  margin: 15,
   //              },
   //              480: {
   //                  items: 2,
   //              },
   //              768: {
   //                  items: 3,
   //              },
   //              1170: {
   //                  items: 5,
   //              },
   //          }
   //      });
      run_lazy();
}


function render_brands(data) {
    if (data.length == 0) {
      $('.partner-area').remove();
      return false;
    }


   $.each(data,function(key, row) {
      var preview=row.preview != null ? row.preview.content : defaut_img;

      var html=`
               <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                     <a href="${base_url+'/brand/'+row.slug}"><img src="${preloader}" data-src="${preview}" alt="${row.name}" class="avatar avatar-ex-sm lazy"></a>
               </div>
               `;

      $('.partner-slider').append(html);
   });

   // $('.partner-slider').owlCarousel({
   //          items: 6,
   //          autoplay: true,
   //          loop: true,
   //          autoplayTimeout: 4000,
   //          autoplayHoverPause: false,
   //          smartSpeed: 500,
   //          merge: true,
   //          nav: false,
   //          dots: false,
   //          margin: 30,
   //          responsive: {
   //              300: {
   //                  items: 2,
   //              },
   //              480: {
   //                  items: 3,
   //              },
   //              768: {
   //                  items: 4,
   //              },
   //              1170: {
   //                  items: 6,
   //              },
   //          }
   //      });

    run_lazy();
}

function isOdd(n) {
   return Math.abs(n % 2) == 1;
}

function render_featured_products(data) {
   // console.log(data);
   if (data.length == 0) {
      $('.featured_products_area').remove();
      return false;
    }


   $.each(data,function(key, row) {




//       <div class="col-12 section section-latest-products latest_product_section">
//       <h3 class="title">
//           <a href="${base_url+'/featured/'+row.slug}">${row.name}</a>
//       </h3>
//       <p class="title-exp"></p>
//       <div class="row row-product render_featured_product_area${key}">
          
//       </div>
//   </div>

      var html=`
                  <div class="section-header">
                        <h3 class="title"><a href="${base_url+'/featured/'+row.slug}">${row.name}</a></h3>
                     <p class="small-title">shorttitle</p>
                  </div>

                  <div class="row-custom category-slider-container">
                     <div class="row row-product" id="slider_special_offers">
                  
                        <div class="render_featured_product_area${key}">
                        </div>
                     </div>

                     <div id="index-products-slider-nav" class="index-products-slider-nav">
                        <button class="prev prev-owl"><i class="icon-arrow-left"></i></button>
                        <button class="next next-owl"><i class="icon-arrow-right"></i></button>
                     </div>
                  </div>
         `;

     $('.featured_products_area').append(html);
     render_primary_product(row.products,'.render_featured_product_area'+key,'col-product');


     $('.render_featured_product_area'+key).owlCarousel({





            items: 5,
            autoplay: false,
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



   });



}

$(document).on('click','.filterproducts',function(){

    var productid=$(this).data('id');
    var products=$(this).data('items');



   console.log(products)

    if (products == null || products == '') {


        var arr = [];
        arr.push(productid)

        var base_url = $('#base_url').val();
        $('.product').remove();

         var callbackdata = {
        "with_paginate": false,
        "limit":30,
        "categories": arr,
        "with": ["preview","discount"]
        }

        $.ajax({
            type: 'get',
            url: base_url + '/get-product',
            data: callbackdata,
            dataType: 'json',
            beforeSend: function() {
                $('.filteredproduct').remove();

                runpreloader();
            },
            success: function(response) {

                render_primary_product(response.data, '.filtered_product_tab','filteredproduct tabs-p col-lg-3 col-md-6 col-6');
                $('.filter_product'+productid).attr('data-items',JSON.stringify(response.data));


                runCountdown();

            },

        });
    }
    else{

    }


});


