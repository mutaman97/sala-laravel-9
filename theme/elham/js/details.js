"use strict";

var totalprice=0;
var totaloldprice=0;

$(document).on('click','.page-link',function(){
	var link=$(this).data('url');
	if (link == '') {
		return false;
	}
	getreviews(link);
});

/*-------------------------
		pricesvariations
	-------------------------*/
$('.pricesvariations').on('change',function(){
	var stockstatus=$(this).data('stockstatus');
	var stockmanage=$(this).data('stockmanage');
	var sku=$(this).data('sku');
	var qty=$(this).data('qty');
	var oldprice=$(this).data('oldprice');
	var price=$(this).data('price');
	totalprice=0;
	totaloldprice=0;

	if ($(this).is(':checked')){
		var stockstatus_html= stockstatus == 1 ? `<a href="javascript:void(0)">In stock</a>` : '<a href="javascript:void(0)">Stock Out</a>';
		$('.stock_status_display').html(stockstatus_html);
		$('.stock_status').show();

		if(stockmanage == 1){
			$('.qty_display').show();
		    $('.modal_maxqty').text(qty);
		    $('.modal_qty_display').show();
		}
		
	}
	else{

		$('.stock_status').hide();
		$('.qty_display').hide();
	
	}
	
	variations();


});

/*-------------------------
		variations
	-------------------------*/
variations();

function variations() {

	if ($('.pricesvariationshide').length == 1) {

		$('.pricesvariationshide').each(function() {

		
			var oldprice=$(this).data('oldprice');
		    var price=$(this).data('price');
		    var qty=$(this).data('qty');
		    totalprice= totalprice+price;
		    totaloldprice= totaloldprice+oldprice;

		    if ($(this).data('stockstatus') == 1) {
		    	$('.input_qty').attr('data-max',qty);
		    	$('.input_qty').attr('max',qty);
		    }
		    $('.add_to_cart_btn').removeAttr('disabled');
		       
			
        });

	    $('.pricesvariationshide').each(function() {
	    	if ($(this).is(':checked') && $(this).data('stockstatus') == 0) {
	    		$('.add_to_cart_btn').attr('disabled','');
	    	}
	    });
	}
	else{
		$('.pricesvariations').each(function() {

		if ($(this).is(':checked') && $(this).data('stockstatus') == 1) {
			var oldprice=$(this).data('oldprice');
		    var price=$(this).data('price');
		    var qty=$(this).data('qty');
		    totalprice= totalprice+price;
		    totaloldprice= totaloldprice+oldprice;

		    if ($(this).data('stockmanage') == 1) {
		    	$('.input_qty').attr('data-max',qty);
		    	$('.input_qty').attr('max',qty);
		    }
		    $('.add_to_cart_btn').removeAttr('disabled');
		       
			}
	    });

	    $('.pricesvariations').each(function() {
	    	if ($(this).is(':checked') && $(this).data('stockstatus') == 0) {
	    		$('.add_to_cart_btn').attr('disabled','');
	    	}
	    });


		if (totalprice == 0) {
			$('.price_area').html('');
			return false;
		}
	}
	
    var newtotaloldprice = totaloldprice != 0 ? amount_format(totaloldprice) : '';
    var price_html=`<span class="discount">${amount_format(totalprice)}</span><s>${newtotaloldprice}</s>`;
	$('.price_area').html(price_html);
}


var categories=[];

$('.categories').each(function() {
	categories.push($(this).data('id'));
});

/*-------------------------
		Get Products
	-------------------------*/
var callbackdata = {
	"with_paginate": false,
	"limit":6,
	"categories": categories,
	"with": ["preview","features","discount"]
}

$.ajax({
	type: 'get',
	url: base_url + '/get-product',
	data: callbackdata,
	dataType: 'json',
	beforeSend: function() {

		render_product_preloaded(5, '.related_product_slider_preloader','col-product');
		ActiveCarousel('.related_product_slider_preloader',5,false);
		runpreloader();
	},
	success: function(response) {
		$('.related_product_slider_preloader').remove();
		render_primary_product(response.data, '.related-slider','col-product',false);
		
		$('.related-slider').owlCarousel({
            items: 1,
			autoplay: true,
			autoplayTimeout: 5900,
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


		// ActiveCarousel('.related-slider');
		runCountdown();
		
	},
});


// Gravatar Added By Mutaman 

function gravatar(email) {
    const hash = CryptoJS.MD5(email.trim().toLowerCase()).toString();
    const uri = `https://www.gravatar.com/avatar/${hash}?d=404`;
    const xhr = new XMLHttpRequest();
    xhr.open('HEAD', uri, false);
    // xhr.send();
    const status = xhr.status;
    if (!status.toString().match(/^2\d{2}$/)) {
      return `https://www.gravatar.com/avatar/${hash}?s=80&d=mp`;
    } else {
      return `https://www.gravatar.com/avatar/${hash}?s=200`;
    }
  }

/*-------------------------
		getreviews
	-------------------------*/
function getreviews(url){
	 $.ajax({
		    type: 'get',
		    url: url,
		    dataType: 'json',
		    beforeSend: function() {
		        runpreloader();
		    },
		    success: function(response) {
		    	$('.single-rating').remove();
		    	$.each(response.data,function(key ,row){
		    		var ratings='';

		    		for (var i = 1; i <= 5; i++) {
		    			var review_full=`<i class="icon-star"></i>`;
		    			var review_half=`<i class="icon-star-o"></i>`;

		    			i > row.rating ? ratings += review_half : ratings += review_full;
		    		}
						// Edited by mutaman for elham
                        var html=`  <li class="media single-rating">
                        <a href="javascript:void(0)">
                            <img src="${gravatar(row.email)}">
                        </a>
                        <div class="media-body">
                            <div class="row-custom">
                                <div class="rating">
                                    ${ratings}
                                </div>
                            </div>
                            <div class="row-custom">
                                <a href="javascript:void(0)">
                                    <h5 class="username">${escapeHtml(row.username)}</h5>
                                </a>
                            </div>
                            <div class="row-custom">
                                <div class="review">
                                    ${escapeHtml(row.comment)}
                                </div>
                            </div>
                            <div class="row-custom">
                                <span class="date">${row.created_at}</span>
                            </div>
                        </div>
                    </li>`

			    	   $('.list_reviews').append(html);
		         });		
		    	if(response.links.length > 3) {
		    	render_pagination('.pagination',response.links);
		        }
		        else{
                  $('.page-item').remove();
                }
		       
		    },
		    error: function(xhr, status, error) {


		    }
     });
	}

	/*-------------------------
			product_option_form
		-------------------------*/
  	$(document).on('submit','.product_option_form', function(e) {
        e.preventDefault();

        if ($('.pricesvariationshide').length == 1) {
	        var $qty = $('.input-number');
	        var $button = $(this);
	        var $input = $button.closest('.quantity').find("input.input-number");
	        var currentVal = parseInt($input.val(), 10);
	        if (!isNaN(currentVal)) {
	        	
	        	if ($('.input_qty').data('max') < currentVal) {
	        		Sweet('error',$('.input_qty').data('max')+' Pieces Available Only');
	        		return false;
	        	}
	        	
	        }

        }

        var required=false;
        
        
        if($('.required_var').length > 0){
        	$('.required_var').each(function () {
        		var optionid=$(this).data('id');
        		required = false;

        		$('.variations'+optionid).each(function () {
        			if (this.checked == true) {
        				required = true;
        			}
        		});	

        	});
        }
        else{
        	required = true;
        }

        if(required == false || totalprice == 0){
        	Sweet('error','Select a required variation');
	    	return false;
        }



        

        var form_data = $(this).serialize();
      
        if (required == true) {
           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });

          $.ajax({
            type: 'POST',
            url: cart_link,
            data: form_data,
            dataType: 'json',
            beforeSend: function(){
              $('.add_to_cart_form_btn').text('Please Wait.....');
              $('.add_to_cart_form_btn').attr('disabled','');
            },
            success: function(response){ 
              $('.add_to_cart_form_btn').text('Add To Cart');
              $('.add_to_cart_form_btn').removeAttr('disabled');

              render_cart(response.cart_content);
              $('.subtotal').html(response.cart_subtotal);
              $('.cart_subtotal').html(response.cart_subtotal);
              
              $('.tax').html(response.cart_tax);
              $('.cart_subtotal').html(response.cart_total);
              $('.total_amount').val(response.cart_total);
              $('.cart_count').html(response.cart_count)
              
              Sweet('success','Cart Added');
             
              $('#product_variation_modal').modal('toggle');
             

              
            },
            error: function(xhr, status, error) 
            {
              $('.add_to_cart_form_btn').text('Add To Cart');
              $('.add_to_cart_form_btn').removeAttr('disabled');
        
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                Sweet('error',item)
              });
              
            }
        });

		}
	}); 

	/*-------------------------
			color_single
		-------------------------*/
    $('.color_single').on('change', function () {
			var id=$(this).val();
			var idName=$(this).attr('id');

			if ($(this).is(':checked')){
				$('.'+idName).html('<i class="icofont-verification-check"></i>');
			}
			else{
				$('.'+idName).html('');
			}
			
	});

	/*-------------------------
			wishlist_btn
		-------------------------*/
	$(document).on('click','.wishlist_btn',function(){
		$(this).removeClass('wishlist_btn');
		$(this).addClass('wishlist_active');
		var html= $(this).html();

		   $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });

          $.ajax({
            type: 'POST',
            url: base_url+'/add-to-wishlist',
            data: {id: $(this).data('id'),getrowid:true},
            dataType: 'json',
            beforeSend: function(){
            	var spinner = `<div class="spinner-border spinner-border-sm" role="status">
            	<span class="visually-hidden"></span>
            	</div>`;
            	 $('.wishlist_active').html(spinner);
              
            },
            success: function(response){ 
            	 $('.wishlist_active').html(html);
            	 $('.wishlist_active').attr('data-rowid',response.rowid);
            	 $('.wishlist_count').html(response.count);
            },
            error: function(xhr, status, error) 
            {
              
              $(this).addClass('wishlist_btn');
            }
        });

	});

	/*-------------------------
			wishlist_active
		-------------------------*/
	$(document).on('click','.wishlist_active',function(){
		$(this).removeClass('wishlist_active');
		$(this).addClass('wishlist_btn');
          $.ajax({
            type: 'GET',
            url: base_url+'/remove-wishlist/'+$(this).data('rowid'),
            dataType: 'json',
            success: function(response){ 
            	
            }
        });

	});


	// $(document).on('click', '.btn-add-remove-wishlist', function () {
	// 	var productId = $(this).attr("data-product-id");
	// 	var dataType = $(this).attr("data-type");
	// 	if (dataType == 'list') {
	// 		if ($(this).find("i").hasClass("icon-heart-o")) {
	// 			$(this).find("i").removeClass("icon-heart-o");
	// 			$(this).find("i").addClass("icon-heart");
	// 		} else {
	// 			$(this).find("i").removeClass("icon-heart");
	// 			$(this).find("i").addClass("icon-heart-o");
	// 		}
	// 	}
	// 	if (dataType == 'details') {
	// 		if ($(this).find("i").hasClass("icon-heart-o")) {
	// 			$('.product-add-to-cart-container .btn-add-remove-wishlist').html('<i class="icon-heart"></i><span>' + MdsConfig.textRemoveFromWishlist + '</span>');
	// 		} else {
	// 			$('.product-add-to-cart-container .btn-add-remove-wishlist').html('<i class="icon-heart-o"></i><span>' + MdsConfig.textAddtoWishlist + '</span>');
	// 		}
	// 	}
	// 	var data = {
	// 		'product_id': productId,
	// 	};
	
	// 	if ($(this).find("i").hasClass("icon-heart-o")) {
	
	// 		$.ajax({
	// 			type: 'GET',
	// 			url: base_url+'/remove-wishlist/'+$(this).data('rowid'),
	// 			dataType: 'json',
	// 			success: function(response){ 
					
	// 			}
	// 		});
	
	// 	} else {
	
	// 	  var html= $(this).html();
	
	// 		   $.ajaxSetup({
	// 			headers: {
	// 			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 			}
	// 		   });
	
	// 		  $.ajax({
	// 			type: 'POST',
	// 			url: base_url+'/add-to-wishlist',
	// 			data: {id: $(this).data('id'),getrowid:true},
	// 			dataType: 'json',
	// 			beforeSend: function(){
	// 				var spinner = `<div class="spinner-border spinner-border-sm" role="status">
	// 				<span class="visually-hidden"></span>
	// 				</div>`;
	// 				 $('.wishlist_active').html(spinner);
				  
	// 			},
	// 			success: function(response){ 
	// 				 $('.wishlist_active').html(html);
	// 				 $('.wishlist_active').attr('data-rowid',response.rowid);
	// 				 $('.wishlist_count').html(response.count);
	// 			},
	// 			error: function(xhr, status, error) 
	// 			{
				  
	// 			  $(this).addClass('wishlist_btn');
	// 			}
	// 		});
	// 	}
	
	// });

