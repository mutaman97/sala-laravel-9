"use strict";

/*-------------------------
		render_pagination
	-------------------------*/
runpreloader();
function render_pagination(target,data,left_icon="icon-arrow-left",right_icon="icon-arrow-right"){
	$('.page-item').remove();
	$.each(data, function(key,value){
		if(value.label === '&laquo; Previous'){
			if(value.url === null){
				var is_disabled="disabled"; 
				var is_active=null;
			}
			else{
				var is_active='page-link-no'+key;
				var is_disabled='';
			}
			var html='<li  class="page-item '+is_active+'"><a '+is_disabled+' class="products-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="'+left_icon+'"></i></a></li>';

        }
		else if(value.label === 'Next &raquo;'){
			if(value.url === null){
				var is_disabled="disabled"; 
				var is_active=null;
			}
			else{
				var is_active='page-link-no'+key;
				var is_disabled='';
			}
			var html='<li class="page-item '+is_active+'"><a '+is_disabled+'  class=" products-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="'+right_icon+'"></i></a></li>';
           
        }
		else if(value.label === '&laquo; السابق'){
			if(value.url === null){
				var is_disabled="disabled"; 
				var is_active=null;
			}
			else{
				var is_active='page-link-no'+key;
				var is_disabled='';
			}
			var html='<li class="page-item '+is_active+'"><a '+is_disabled+'  class=" products-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="'+right_icon+'"></i></a></li>';
           
        }
		else if(value.label === 'التالي &raquo;'){
			if(value.url === null){
				var is_disabled="disabled"; 
				var is_active=null;
			}
			else{
				var is_active='page-link-no'+key;
				var is_disabled='';
			}
			var html='<li  class="page-item '+is_active+'"><a '+is_disabled+' class="products-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="'+left_icon+'"></i></a></li>';

        }
		else{
			if(value.active==true){
				var is_active="active";
				var is_disabled="disabled";
				var url=null;

			}
			else{
				var is_active='page-link-no'+key;
				var is_disabled='';
				var url=value.url;
			}
			var html='<li class="page-item '+is_active+'"><a class="products-link '+is_active+'" '+is_disabled+' href="javascript:void(0)" data-url="'+url+'">'+value.label+'</a></li>';
            // console.log(value.label);

        }
		if(value.url !== null){
			$(target).append(html);
		}
		
	});
}

var callbackdata = {
	"categories":{
		"limit": -1,
		"withcount":true
	},
	"brands":{
		"limit": -1,
		"withcount":true
	},
	"prices":{
		"maxPrice":true,
		"minPrice":true
	},
	"featuredAttributes":{
		"limit": -1,
		"withcount":true
	},

	
}

var term_src=$('#term_src').val();

var callback_url = base_url+'/databack';

var categories=[];
var variations=[];
var checked_cat=null;
$('#cat').val() != '' ? categories.push($('#cat').val()) : '';
checked_cat=$('#cat').val();


$(document).on('change','.menu_item',function(){
	
	
	if ($(this).data('count') == 0 && $(this).is(':checked') == true) {
		$('.product-item').hide();
		$('.zero_product').show();
		$('.pagination-list').hide();
		
		return false;
	}
	
	
	$('.product-item').show();
	$('.pagination-list').show();
	$('.zero_product').hide();
	categories=[];
	variations=[];

	var $boxes = $('input[name=categories]:checked');
	$boxes.each(function(){
		categories.push($(this).val());
	});

	var $variationsBox = $('input[name=variations]:checked');
	$variationsBox.each(function(){
		variations.push($(this).val());
	});
	getproducts(base_url + '/get-product');
});

$.ajax({
	type: 'get',
	url: callback_url,
	data: {
		body: callbackdata
	},
	dataType: 'json',
	beforeSend: function() {
		
		runpreloader();
	},
	success: function(response) {
		$('.menu_preload').remove();

		var cat=$('#cat').val();

		$.each(response.categories, function(key, category) {
			if(cat == category.id){
				var selected="active";
			}
			else{
				var selected='';
			}
			var html=`<li><a href="#" rel="nofollow"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input menu_item ${selected}" ${checked_cat == category.id ? 'checked' : ''} id="category${category.id}" name="categories" data-count="${category.termcategories_count}" data-id="${category.id}" value="${category.id}""><label for="category${category.id}" class="custom-control-label">${category.name} (${category.termcategories_count})</label></div></a></li>`;

			// var html=`<li><label for="category${category.id}"><input ${checked_cat == category.id ? 'checked' : ''} id="category${category.id}" name="categories" type="checkbox" data-count="${category.termcategories_count}" data-id="${category.id}" class="menu_item ${selected}" value="${category.id}">${category.name} (${category.termcategories_count})</label></li>`;

			$('.product_category').append(html);
		});

		// response.categories.length == 0 ? $('.category_area').remove() : '';
		response.categories.length > 0 ? $('.category_area').show() : '';

		$.each(response.brands, function(key, category) {
			if(cat == category.id){
				var selected="active";
			}
			else{
				var selected='';
			}

			var html=`<li><a href="#" rel="nofollow"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input menu_item ${selected}" ${checked_cat == category.id ? 'checked' : ''} id="category${category.id}" name="categories" data-count="${category.termcategories_count}" data-id="${category.id}" value="${category.id}""><label for="category${category.id}" class="custom-control-label">${category.name} (${category.termcategories_count})</label></div></a></li>`;

			// var html=`<li><label for="category${category.id}"><input id="category${category.id}" ${checked_cat == category.id ? 'checked' : ''} name="categories" type="checkbox" data-count="${category.termcategories_count}" data-id="${category.id}" class="menu_item ${selected}" value="${category.id}">${category.name} (${category.termcategories_count})</label></li>`;
			$('.product_brands').append(html);
		});

		response.brands.length > 0 ? $('.brand_area').show() : '';

		renderRange(response.prices.min,response.prices.max);

		$.each(response.featuredAttributes, function(key, attribute) {

			var li='';

			$.each(attribute.childs, function(k, child) {
				li +=`<li><label for="category${child.id}"><input id="category${child.id}" ${checked_cat == child.id ? 'checked' : ''} name="variations" type="checkbox" class="menu_item" data-id="${child.id}" value="${child.id}">${child.title}</label></li>`;
			});

			var html=`<div class="single-widget">
			<h3 class="title">${attribute.title}</h3>
			<ul class="categor-list">
			${li}
			</ul>
			</div>`;

			$('.filter_widget_area').append(html);		

		});	
	},
	error: function(xhr, status, error) {


	}
});

$(document).on('click','.products-link',function(){
	var link=$(this).data('url');
	if (link == '') {
		return false;
	}
	getproducts(link);
});

getproducts(base_url + '/get-product');

$(document).on('change','#product_limit',function(){
	getproducts(base_url + '/get-product');
});

$(document).on('change','#order_by',function(){
	getproducts(base_url + '/get-product');
});	

$(document).on('click','#product_price_filter',function(){
	getproducts(base_url + '/get-product');
});


/*-------------------------
		getproducts
	-------------------------*/
function getproducts(url) {
	var callbackdata = {
		"with_paginate": true,
		"limit":$('#product_limit').val() || 12,
		"categories": categories,
		"variations": variations,
		"maxPrice":$("#price_max").val(),
		"minPrice":$("#price_min").val(),
		"orderby": $('#order_by').val(),
		"with": ["preview","medias", "excerpt","discount","features"],
		"src":term_src,
	}

	$.ajax({
		type: 'get',
		url: url,
		data: callbackdata,
		dataType: 'json',
		beforeSend: function() {
			$('.col-product').remove();
			
			render_product_preloaded($('#product_limit').val() || 12, '.primary_products_area_preloader','col-6 col-sm-4 col-md-4 col-lg-3 col-product','');
			runpreloader();
		},
		success: function(response) {
			$('.content-preloader').remove();
			$('.col-product').remove();

			$('.from_products').html(response.from);
			$('.to_products').html(response.to);
			$('.total_products').html(response.total);

			
			
			response.data.length == 0 ? $('.zero_product').show() : $('.zero_product').hide();

			

			render_primary_product(response.data,'.primary_products_area','col-6 col-sm-4 col-md-4 col-lg-3 col-product',true);
			if(response.links.length > 2) {
				render_pagination('.pagination-list',response.links,'icon-arrow-left','icon-arrow-right');
			}
			else{
				$('.page-item').remove();
			}

			runCountdown();


		},

	});
}

/*-------------------------
    renderRange
-------------------------*/
function renderRange(minPrice, maxPrice) {
    $('#price_min').on('input', function () {
        var priceMin = parseFloat($(this).val());
        var priceMax = parseFloat($('#price_max').val());

        // if (!isNaN(priceMin) && !isNaN(priceMax)) {
        //     updateAmountDisplay(priceMin, priceMax);
        // }
    });

    $('#price_max').on('input', function () {
        var priceMin = parseFloat($('#price_min').val());
        var priceMax = parseFloat($(this).val());

        // if (!isNaN(priceMin) && !isNaN(priceMax)) {
        //     updateAmountDisplay(priceMin, priceMax);
        // }
    });

    // function updateAmountDisplay(priceMin, priceMax) {
    //     var amountDisplay = "$" + priceMin + " - $" + priceMax;
    //     $("#amount").val(amountDisplay);

	// 	console.log($("#amount").val());

    // }
}

$('#product_src').val(term_src);



