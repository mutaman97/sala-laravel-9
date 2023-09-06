"use strict";

var currency_name = $('#currency_name').val();
var cart_link = $('#cart_link').val();
var base_url = $('#base_url').val();
var preloader = $('#preloader').val();
var cart_increment = $('#cart_increment').val();
var cart_decrement = $('#cart_decrement').val();
var defaut_img = base_url + '/uploads/placeholder-square.svg';
const cart_content = JSON.parse($('#cart_content').val());
// added by mutaman
const wishlist_content = JSON.parse($('#wishlist_content').val());
// end

/*====================================
       render_product_preloaded
   ======================================*/
function render_product_preloaded(preload_count = 5, target, additional_class = '', pre_class = '') {
    var html = `
                <div class="col-product ${additional_class}">
                    <div class="product-item">
                        <div class="row-custom product-multiple-image content-preloader>
                            <div class="product-head">
                                <div class="image-colors">
                                <div class="image-colors content-placeholder" data-height="205px" data-width="100%"></div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="content-placeholder" data-height="15px" data-width="100%"></h3>
                                <div class="product-button prc-button content-placeholder" data-height="30px" data-width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               `;
    for (var i = 1; i <= preload_count; i++) {
        $(target).append(html);
    }
}

/*====================================
    render_primary_product
======================================*/
function render_primary_product(products, target, additional_class = '', visible_badge = false) {
    var base_url = $('#base_url').val();
    var listview = $('.grid_products_area').length != 0 ? true : false;

    $.each(products, function (key, product) {
        var preview = product.preview != null ? product.preview.value : base_url + '/uploads/placeholder-square.svg';
        // added by mutaman for product galleries
        var gallery = product.medias?.value ? JSON.parse(product.medias.value.replace(/\\(.)/g, '$1'))[0] : null;
        var galleryHtml = '';
        if (gallery !== null) {
            galleryHtml = `
                <img src="${preloader}" data-src="${gallery}" alt="${str_limit(product.title, 40)}" class="lazy lazyload img-fluid img-product img-second">
            `;
        }
        // end

        var badge = '';

        if (visible_badge == true) {
            $.each(product.features, function (k, feature) {
                badge = `<span class="badge badge-dark badge-promoted">${feature.name}</span>`;
            });
        }

        if (product.is_variation == 1) {
            var lastprice = product.lastprice ? product.lastprice.price : 0;
            // OLD FORMAT EDITED BY MUTAMAN
            // var price= product.firstprice.price == lastprice ? lastprice :  product.firstprice.price +' - '+ lastprice;
            var price = `<span class="price">${product.firstprice.price == lastprice ? lastprice : product.firstprice.price + ' - ' + lastprice}</span>`;
        }
        else {
            var price = product.firstprice.old_price == null ? product.firstprice.price : product.firstprice.price + `&nbsp<del class="discount-original-price">${amount_format(product.firstprice.old_price, 'icon')}</del>&nbsp`;
        }

        var price = amount_format(price, 'icon');

        var countDown = '';

        if (product.discount != null) {
            countDown = `<div class="count-down-time">
                        <div class="clearfix" data-countdown="${product.discount.ending_date}"></div>
                        </div>`;
        }
        // Added By Mutaman for product discount
        var discount = '';

        if (product.discount != null) {
            if (product.discount.price_type === 1) {
                discount = `<span class="badge badge-discount">- ${amount_format(product.discount.special_price, 'icon')}</span>`;
            }
            else {
                discount = `<span class="badge badge-discount">- ${product.discount.special_price}%</span>`;
            }
        }
        // end

        if (product.is_variation == 1) {
            // EDITED BY MUTAMAN
            var cart_html = `<a href="${base_url + '/product/' + product.slug}" class="item-option" data-toggle="tooltip" data-placement="left" data-product-id="${product.id}" data-reload="0" title="View Options">
                                <i class="icon-cart"></i>
                            </a>`;
        }
        else {
            if (product.firstprice.stock_status == 0) {
                var cart_html = `<a href="${base_url + '/product/' + product.slug}" class="item-option" data-id="${product.id}" data-toggle="tooltip" data-placement="left" data-product-id="${product.id}" data-reload="0" title="Out Of Stock">
                                <i class="icon-price-tag-o"></i>
                            </a>`;
            }
            else {
                // REMOVED PLUS AND MINUS BY MUTAMAN

                // var cart_html=`<div class="product-button prc-button">
                //            <a class="pc-btn theme-btn prodcut-btn"><i class="icofont-cart"></i> Add To Cart</a>
                //            <div class="quantity">
                //               <div class="input-group">
                //                  <div class="button minus">
                //                     <button type="button" class="btn btn-primary btn-number add_to_decrease_cart add_to_decrease_cart${product.id}" data-id="${product.id}"  disabled="disabled" data-type="minus" data-field="quant[${product.firstprice.stock_status == 1  ? 1 : 0}]"><i class="icofont-minus"></i></button>
                //                  </div>
                //                  <input type="number" readonly name="quant[${product.id}]" class="input-number cart_qty${product.id}" ${product.firstprice.stock_status == 0  ? 'disabled' : ''} data-min="${product.firstprice.stock_status == 1  ? 1 : 0}" data-isvariation="${product.is_variation}"  data-id="${product.id}" data-stockstatus="${product.firstprice.stock_status}" data-stockmanage="${product.firstprice.stock_manage}" data-max="${product.firstprice.qty}" value="0">
                //                  <div class="button plus">
                //                     <button type="button" class="btn btn-primary btn-number add_to_cart cart${product.id}" data-type="plus" ${product.firstprice.stock_status == 0  ? 'disabled' : ''} data-min="${product.firstprice.stock_status == 1  ? 1 : 0}" data-isvariation="${product.is_variation}"  data-id="${product.id}" data-stockstatus="${product.firstprice.stock_status}" data-stockmanage="${product.firstprice.stock_manage}" data-qty="${product.firstprice.qty}"  data-max="${product.firstprice.qty}"  data-field="quant[${product.firstprice.stock_status == 1  ? 1 : 0}]"><i class="icofont-plus"></i></button>
                //                  </div>
                //               </div>
                //            </div>
                //         </div>`;

                // var cart_html=`<a href="javascript:void(0)" class="item-option btn-item-add-to-cart add_to_cart cart${product.id}" data-id="${product.id}" ${product.firstprice.stock_status == 0  ? 'disabled' : ''} data-isvariation="${product.is_variation}"  data-stockstatus="${product.firstprice.stock_status}" data-stockmanage="${product.firstprice.stock_manage}" data-qty="${product.firstprice.qty}" data-max="${product.firstprice.qty}" data-toggle="tooltip" data-placement="left" data-product-id="${product.id}" data-reload="0" title="Add to cart">
                // <i class="icon-cart"></i>
                // </a>`;
                var cart_html = `<a href="javascript:void(0)" class="item-option btn-item-add-to-cart add_to_cart cart${product.id}" data-id="${product.id}" ${product.firstprice.stock_status == 0 ? 'disabled' : ''} data-isvariation="${product.is_variation}"  data-stockstatus="${product.firstprice.stock_status}" data-stockmanage="${product.firstprice.stock_manage}" data-qty="${product.firstprice.qty}" data-max="${product.firstprice.qty}" data-toggle="tooltip" data-placement="left" data-product-id="${product.id}" data-reload="0" title="Add To Cart">
                                    <i class="icon-cart"></i>
                                </a>`;
            }
        }

        // EDITED BY MUTAMAN
        var ratings = '';

        for (var i = 1; i <= 5; i++) {
            var review_full = `<i class="icon-star"></i>`;
            var review_half = `<i class="icon-star-o"></i>`;
            i > product.rating ? ratings += review_half : ratings += review_full;
        }

        var rating_html = `<div class="rating">
                            ${product.rating != null ? ratings : ''}
                            <a href="#" class="total-review">${product.rating != null ? '(' + product.rating + ')' : ''}</a>
                        </div>`;

        var listViewHtml = `<div class="single-product gr-list product-item">
                                <!-- Product Head -->
                                <div class="product-head">
                                    ${badge}
                                    <div class="image-colors"><img class="lazy grid_img" height="450" src="${preloader}" data-src="${preview}"></div>
                                    <!-- Button Head -->
                                    <div class="button-head">
                                        <!-- Action  Button -->
                                        <div class="product-action">
                                            <a data-bs-toggle="modal" class="add_to_cart_modal" data-id="${product.id}" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="icofont-eye-alt"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="javascript:void(0)" data-id="${product.id}" class="add_to_wishlist wishlist${product.id}"><i class="icofont-heart"></i><span>Add to Wishlist</span></a>
                                            <a title="View Product" href="${base_url + '/product/' + product.slug}" ><i class="icofont-search"></i><span>View Product</span></a>
                                        </div>
                                        <!-- Action to Cart Button -->
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="${base_url + '/product/' + product.slug}">View Product</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content -->
                                <div class="product-content">
                                    ${countDown}
                                    <!-- Product Title -->
                                    <h3 class="product-title"><a href="${base_url + '/product/' + product.slug}">${product.title}</a></h3>
                                    <p>${product.excerpt != null ? product.excerpt.value : ''}</p>
                                    <!-- Product Price -->
                                    <div class="product-price">
                                        <b>${price}</b>
                                    </div>
                                    <!-- Ratting -->
                                    ${product.rating != null ? rating_html : ''}
                                    <!-- Product Button -->
                                    ${cart_html}
                                </div>
                            </div>`;

        // THIS IS RESPONSIPLE OF PRODUCTS ITEM IN HOME PAGE

        // var html=`<div class="single-product ${additional_class}">
        //          <!-- Product Head -->
        //          <div class="product-head">
        //             ${badge}
        //             <div class="image-colors"><img class="lazy" src="${preloader}" data-src="${preview}"></div>
        //             <!-- Button Head -->
        //             <div class="button-head">
        //                <!-- Action  Button -->
        //                <div class="product-action">
        //                   <a  data-bs-toggle="modal"  class="add_to_cart_modal" data-id="${product.id}" data-bs-target="#exampleModal" href="#"><i class="icofont-eye-alt"></i><span>Quick Shop</span></a>
        //                   <a title="Wishlist" href="javascript:void(0)" data-id="${product.id}" class="add_to_wishlist wishlist${product.id}"><i class="icofont-heart"></i><span>Add to Wishlist</span></a>
        //                   <a title="View Product" href="${base_url+'/product/'+product.slug}" ><i class="icofont-search"></i><span>View Product</span></a>
        //                </div>
        //                <!-- Action to Cart Button -->
        //                <div class="product-action-2">
        //                   <a title="Add to cart" href="${base_url+'/product/'+product.slug}">View Product</a>
        //                </div>
        //             </div>
        //          </div>
        //          <!-- Product Content -->
        //          <div class="product-content">
        //             ${countDown}

        //             <!-- Product Title -->
        //             <h3 class="product-title"><a href="${base_url+'/product/'+product.slug}">${str_limit(product.title,20)} </a></h3>
        //             <!-- Product Price -->
        //             <div class="product-price">
        //                <b>${price}</b>
        //             </div>
        //             <!-- Ratting -->
        //               ${product.rating != null ? rating_html : ''}
        //             <!-- Product Button -->
        //             ${cart_html}
        //          </div>
        //       </div>`;


        var html = `<div class="${additional_class}">
                    <div class="product-item">
                        <div class="row-custom product-multiple-image">
                            <a class="item-wishlist-button item-wishlist-enable item-wishlist" data-product-id="${product.id}"></a>
                            <div class="img-product-container">
                                <a href="${base_url + '/product/' + product.slug}">
                                    <img src="${preloader}" data-src="${preview}" alt="${str_limit(product.title, 40)}" class="lazy lazyload img-fluid img-product">

                                    ${galleryHtml}
                                </a>
                                <div class="product-item-options">
                                    <a href="javascript:void(0)" data-id="${product.id}" class="item-option btn-add-remove-wishlist add_to_wishlist wishlist${product.id}" data-toggle="tooltip" data-placement="left" data-product-id="${product.id}" data-type="list" title="wishlist">
                                        ${isProductInWishlist(product.id) ? '<i class="icon-heart"></i>' : '<i class="icon-heart-o"></i>'}
                                    </a>

                                    ${cart_html}
                                </div>
                                ${discount}
                            </div>
                            ${badge}
                        </div>
                        <div class="row-custom item-details">
                            <h3 class="product-title">
                                <a href="${base_url + '/product/' + product.slug}">${str_limit(product.title, 40)}</a>
                            </h3>
                            <div class="product-item-rating">
                                ${product.rating != null ? rating_html : ''}
                                <span class="item-wishlist"><i class="icon-heart-o"></i>13</span>
                            </div>
                            <div class="item-meta">
                                <span class="price">${price}</span>
                            </div>
                        </div>
                    </div>
                </div>`;

        listview == true ? $('.grid_products_area').append(listViewHtml) : '';

        $(target).append(html);
    });
}
/*====================================
    End render_primary_product section
======================================*/


/*====================================
    render_reviews
======================================*/
function render_reviews(data, target) {
    $.each(data, function (key, row) {
        var html = `<div class="col-lg-4 col-md-6 col-12">
                        <div class="single-testimonial">
                            <div class="text">
                                <p>${escapeHtml(row.comment)}</p>
                            </div>
                            <div class="testi-author">
                            <div class="image">
                                <div class="quote-icon"><i class="icofont-quote-left"></i></div>
                                <img src="https://ui-avatars.com/api/?background=random&rounded=true&name=${escapeHtml(row.user.name)}" alt="#">
                            </div>
                            <h4 class="name"> ${escapeHtml(row.user.name)} </h4>
                        </div>
                    </div>
                </div>`;
        $(target).append(html);
    });

    testimonial_slider()
}
/*====================================
    End render_reviews Section
======================================*/

/*====================================
    render_discountable_product
======================================*/
function render_discountable_product(products, target) {
    var base_url = $('#base_url').val();

    $.each(products, function (key, product) {
        if (product.is_variation == 1) {
            var lastprice = ' - ' + product.lastprice.price > 0 ? product.lastprice.price : '';
            var price = product.firstprice.price + lastprice;
        }
        else {
            var price = product.firstprice.old_price == null ? product.firstprice.price : product.firstprice.price + ` <span>${product.firstprice.old_price}</span>`;
        }
        var price = amount_format(price, 'icon');
        var preview = product.preview != null ? product.preview.value : base_url + '/uploads/default.png';
        var ratings = '';

        // EDITED BY MUTAMAN
        for (var i = 1; i <= 5; i++) {
            var review_full = `<li><i class="icofont-star star"></i></li>`;
            var review_half = `<li><i class="icofont-star"></i></li>`;

            i > product.rating ? ratings += review_half : ratings += review_full;
        }

        var html = ` <div class="col-lg-6 col-md-6 col-6">
                                <!-- Start Single Deal -->
                                <div class="single-deal">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-md-5 col-12">
                                        <div class="image">
                                        <a href="${base_url + '/product/' + product.slug}"> <img class="lazy" src="${preloader}" data-src="${preview}" alt=""/></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="content">
                                            <h3><a href="${base_url + '/product/' + product.slug}">${str_limit(product.title, 20)}</a></h3>
                                            <p>
                                            ${str_limit(product.excerpt != null ? product.excerpt.value : '', 30)}
                                            </p>
                                            <div class="price">
                                            <h5>${price}</h5>
                                            </div>

                                            <div class="rating-main">
                                            <ul class="rating">
                                                ${ratings != '' ? ratings : ''}
                                            </ul>
                                            <a href="${base_url + '/product/' + product.slug}" class="total-review">${product.rating != null ? '(' + product.rating + ') Review' : ''}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- End Single Deal -->
                            </div>`;

        $(target).append(html);
    });
    run_lazy();
}
/*====================================
    End render_discountable_product section
======================================*/

/*====================================
    Add To Cart Product
======================================*/
$(document).on('click', '.add_to_cart', function () {
    var id = $(this).data('id');
    var stockstatus = $(this).data('stockstatus');
    var stockmanage = $(this).data('stockmanage');
    var stockqty = $(this).data('qty');
    var input_qty = $('.input_qty' + id).val();

    if (stockstatus == 0) {
        Sweet('error', 'Stock Out');
        return true;
    }

    var ajax_request = true;

    if (stockmanage == 1) {
        if ($('.exist_cart' + id).length != 0) {
            var exisist_cart = $('.exist_cart' + id).val();
            exisist_cart = parseInt(exisist_cart);
            if (exisist_cart >= stockqty || exisist_cart >= input_qty || input_qty >= stockqty) {
                Sweet('error', 'Opps maximum stock limit exceeded...!!');
                ajax_request = false;
            }
        }
        else {
            ajax_request = true;
        }
    }

    // SPINER FOR LOADING ADD TO CART, FOR HOMEPAGE
    if (ajax_request == true) {
        var btn_html = $(this).html();
        console.log(btn_html);

        $(this).attr('disabled', '');
        // var spinner = `<div class="spinner-border spinner-border-sm" role="status">
        // <span class="visually-hidden"></span>
        // </div>`;

        var spinner = `<div class="spinner-border spinner-border-add-cart-list" role="status"></div>`;

        $(this).html('');
        $(this).html(spinner);
        var qty = $('.cart_qty' + id).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: cart_link,
            data: {
                id: id,
                qty: 1
            },
            dataType: 'json',
            success: function (response) {
                // Apply changes
                $('.cart' + id).css('background-color', 'rgb(40, 167, 69, .7)').html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">\n' +
                    '<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>\n' +
                    '</svg>');

                // Reset to default status after 500 milliseconds (0.5 seconds)
                setTimeout(function () {
                    $('.cart' + id).css('background-color', '').html(btn_html);
                }, 3000);
                // end

                $('.cart' + id).removeAttr('disabled');
                $('.cart_decrement_' + id).removeAttr('disabled');
                $('.add_to_decrease_cart' + id).removeAttr('disabled');

                $('.cart_subtotal').html(amount_format(response.cart_subtotal));

                // TODO
                // $('.cart_discount').html(response.cart_discount);
                // console.log((response.cart_discount));

                $('.cart_count').html(response.cart_count);
                $('.cart_total').html(response.cart_total);
                $('.cart_tax').html(response.cart_tax);
                render_cart(response.cart_content);

                Sweet('success', 'Added To Cart Successfully');
            },
            error: function (xhr, status, error) {
                $('.cart' + id).html(btn_html);
                $('.cart' + id).removeAttr('disabled');
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                });
            }
        });

    }
});
/*====================================
    End Add Product To Cart Section
======================================*/

/*=======================
    Remove Cart
=========================*/
$(document).on('click', '.remove_cart', function () {
    var rowid = $(this).data('id');
    var productid = $(this).data('productid');

    $('.cart_item' + rowid).remove();
    $.ajax({
        type: 'get',
        url: base_url + '/remove-cart/' + rowid,
        dataType: 'json',
        success: function (response) {
            $('.cart_qty' + productid).val(0);
            $('.cart_count').html(response.cart_count);
            $('.cart_subtotal').text(amount_format(response.cart_subtotal));
            $('.cart_total').html(response.cart_total);
            $('.cart_tax').html(response.cart_tax);
        },
    });
});

/*=======================
    End Remove Cart Section
=========================*/

/*=======================
    Decrease Cart
=========================*/
$(document).on('click', '.add_to_decrease_cart', function () {

    var id = $(this).data('id');

    if ($('.cart_decrement_' + id).length != 0) {
        $('.cart_decrement_' + id).click();

    }
});
/*=======================
    End Decrease Cart
=========================*/

/*=======================
    Increment Cart
=========================*/
$(document).on('click', '.cart_increment', function () {
    var rowid = $(this).data('id');
    var stock = $(this).data('stock');
    var productid = $(this).data('productid');
    var totalqty = $('.current_cart_qty' + rowid).val();
    if ($(this).data('isvariation') == 1) {
        return true;
    }

    totalqty = parseInt(totalqty);
    if (stock != null || stock != '') {
        if (totalqty < stock) {
            var newqty = totalqty + 1;
            $('.current_cart_qty' + rowid).val(newqty);
            cartqty(rowid, newqty);

            // Added by mutaman to update total price automatically
            var item = cart_content[rowid];

            // Calculate the new total price
            var newTotalPrice = item.price * newqty;

            // // Update the total price in the HTML
            $('.total_price' + item.rowId).text(amount_format(newTotalPrice));

        }
        else {
            Sweet('error', 'Opps maximum stock limit exceeded...!!');
        }
    }
    else {
        var newqty = totalqty + 1;
        $('.current_cart_qty' + rowid).val(newqty);
        cartqty(rowid, newqty);
    }
});
/*=======================
    End Increment Cart
=========================*/

/*=======================
    Cart Decrement
=========================*/
$(document).on('click', '.cart_decrement', function () {
    var rowid = $(this).data('id');
    var stock = $(this).data('stock');
    var productid = $(this).data('productid');
    var totalqty = $('.current_cart_qty' + rowid).val();
    var product_id = $(this).data('productid');

    if ($(this).data('isvariation') == 1) {
        return true;
    }

    totalqty = parseInt(totalqty);
    var newqty = totalqty - 1;
    $('.current_cart_qty' + rowid).val(newqty);

    if (newqty == 0 || newqty == NaN) {
        $('.cart_item' + rowid).remove();
        $('cart_qty' + product_id).val(0);
    }
    cartqty(rowid, newqty);

    // Added by mutaman to update total price automatically
    var item = cart_content[rowid];

    // Calculate the new total price
    var newTotalPrice = item.price * newqty;

    // // Update the total price in the HTML
    $('.total_price' + item.rowId).text(amount_format(newTotalPrice));
});

/*=======================
    End Cart Decrement
=========================*/

/*=======================
    Render Cart
=========================*/
function render_cart(items) {
    $('.cart_item').remove();
    var cartpage = $('.cart_page').length != 0 ? true : false;
    $.each(items, function (key, item) {
        var cart_options = '';
        $.each(item.options.options, function (option_key, option) {
            var child_options = '';
            $.each(option, function (child_option_key, child_option_value) {
                child_options += `${child_option_value.name},`;
            })
            cart_options += `<br><small>${option_key}: (${child_options})</small>`;
        });

        //    console.log(item);
        var qtyrow = parseInt(item.qty);
        // var cart_item=` <li class="cart_item cart_item${item.rowId}">
        //        <div class="cart-single-main">
        //           <div class="cart-top">
        //              <a data-id="${item.rowId}" data-productid="${item.id}" href="javascript:void(0)" class="remove remove_cart" title="Remove this item"><i class="icofont-close-circled"></i></a>
        //              <a class="cart-img" href="${base_url+'/product/'+item.options.slug}"><img src="${item.options.preview != null ? item.options.preview : ''}" alt=""></a>
        //           </div>
        //           <div class="cart-single-item">
        //              <h4><a href="${base_url+'/product/'+item.options.slug}">${str_limit(item.name,20)}</a><span>${cart_options}</span>
        //              </h4>
        //              <div class="quantity-price">
        //                 <div class="quantity">
        //                    <div class="quantity">
        //                      <div class="input-group">
        //                       <div class="button minus" >
        //                          <button type="button" class="inline arrow sp-minus fff cart_decrement  cart_decrement_${item.id} btn btn-primary btn-number" data-productid="${item.id}" data-id="${item.rowId}"   data-type="minus" data-field="quant[1]"><i class="icofont-minus"></i></button>
        //                       </div>
        //                       <input type="text" name="quant[1]" class="input-number quntity-input current_cart_qty${item.rowId} exist_cart${item.id}" data-min="1"  value="${item.qty}">
        //                       <div class="button plus">
        //                          ${item.options.options.length != 0 ? `<a href="${base_url+'/product/'+item.options.slug}" class="btn btn-primary btn-number cart_increment last" data-type="plus" data-field="quant[1]" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}"><i class="icofont-plus"></i></a>` : `<button type="button" class="btn btn-primary btn-number cart_increment last" data-type="plus" data-field="quant[1]" data-id="${item.rowId}" data-stock="${item.options.stock }" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}"><i class="icofont-plus"></i></button>`}

        //                       </div>
        //                    </div>
        //                 </div>
        //              </div>
        //              <div class="product-price">
        //                 <b>${amount_format(item.price*parseInt(item.qty),'icon')}</b>
        //              </div>
        //           </div>
        //        </div>
        //     </div>
        //  </li>
        //  `;

        var checkout_item = `<div class="item  cart_item cart_item${item.rowId}">
                            <div class="item-left">
                                <div class="img-cart-product">
                                    <a href="${base_url + '/product/' + item.options.slug}">
                                        <img src="${item.options.preview != null ? item.options.preview : ''}" data-src="${item.options.preview != null ? item.options.preview : ''}" alt="${str_limit(item.name, 100)}" class="lazyload img-fluid img-product" onerror="this.src='< ?= base_url(IMG_BG_PRODUCT_SMALL); ?>'">
                                    </a>
                                </div>
                            </div>
                            <div class="item-right">
                                <div class="list-item">
                                    <a href="${base_url + '/product/' + item.options.slug}">${str_limit(item.name, 100)}</a>
                                    <a href="javascript:void(0)" class="mt-0 float-right btn btn-sm btn-outline-gray btn-cart-remove remove_cart" data-id="${item.rowId}"><i class="icon-close"></i>Remove</a>
                                </div>

                                <div class="list-item m-t-15">
                                    <label>Quantity:</label>
                                    <strong class="lbl-price">${item.qty}</strong>
                                </div>
                                <div class="list-item">
                                    <label>Price:</label>
                                    <strong class="lbl-price total_price${item.rowId}">${amount_format(item.price * item.qty)}</strong>
                                </div>
                                <div class="list-item">
                                    <label>Tax:</label>
                                    <strong>${amount_format(item.tax)}</strong>
                                </div>
                            </div>
                        </div>`;


        var cart_item = `<div class="item cart_item cart_item${item.rowId}">
                            <div class="cart-item-image">
                                <div class="img-cart-product">
                                    <a href="#">
                                        <img src="${item.options.preview != null ? item.options.preview : ''}" data-src="${item.options.preview != null ? item.options.preview : ''}" alt="#" class="lazyload img-fluid img-product" onerror="this.src='#'">
                                    </a>
                                </div>
                            </div>
                            <div class="cart-item-details">
                                <div class="list-item">
                                    <a href="generateProductUrl">${str_limit(item.name, 100)}</a>
                                </div>
                                
                                <div class="list-item">
                                    <strong class="lbl-price total_price${item.rowId}">${amount_format(item.price * item.qty)}</strong>
                                </div>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="number-spinner">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-spinner-minus cart_decrement" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}"  data-type="minus" data-field="quant[1]" data-dir="dwn"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">-</a></button>
                                        </span>
                                        <input type="text" class="form-control text-center current_cart_qty${item.rowId} exist_cart${item.id}" data-min="1" data-max="${item.options.stock}" value="${item.qty}">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-spinner-plus cart_increment" data-type="plus" data-field="quant[1]" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}" data-dir="up"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">+</a></button>
                                        </span>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-cart-remove remove_cart" data-id="${item.rowId}"><i class="icon-close"></i>Remove</a>
                            </div>
                        </div>`;

        if (cartpage == true) {
            // Added by mutaman
            // TODO CART TAX
            var cart_page_item = `<div class="item cart_item cart_item${item.rowId}">
                                    <div class="cart-item-image">
                                        <div class="img-cart-product">
                                            <a href="#">
                                                <img src="${item.options.preview != null ? item.options.preview : ''}" data-src="${item.options.preview != null ? item.options.preview : ''}" alt="#" class="lazyload img-fluid img-product" onerror="this.src='#'">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cart-item-details">
                                        <div class="list-item">
                                            <a href="generateProductUrl">${str_limit(item.name, 100)}</a>
                                        </div>
                                        <div class="list-item m-t-15">
                                            <label>Unite Price:</span></label>
                                            <strong class="lbl-price">
                                            ${amount_format(item.price)}</span>
                                                <span class="discount-rate-cart">
                                                    ${item.discount > 0 ? `(${item.discount})` : ''}
                                                </span>
                                            </strong>
                                        </div>
                                        <div class="list-item">
                                            <label>Total Price:</label>
                                            <strong class="lbl-price total_price${item.rowId}">${amount_format(item.price * item.qty)}</strong>

                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-cart-remove remove_cart" data-id="${item.rowId}"><i class="icon-close"></i>Remove</a>
                                    </div>
                                    <div class="cart-item-quantity">
                                        <span>Quantity: ${item.qty}</span>
                                        <div class="number-spinner">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-minus cart_decrement" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}"  data-type="minus" data-field="quant[1]" data-dir="dwn"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">-</a></button>
                                                </span>
                                                <input type="text" class="form-control text-center current_cart_qty${item.rowId} exist_cart${item.id}" data-min="1" data-max="${item.options.stock}" value="${item.qty}">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-spinner-plus cart_increment" data-type="plus" data-field="quant[1]" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}" data-dir="up"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">+</a></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            $('.cart_page').append(cart_page_item);
        }
        $('.shopping-list').append(cart_item);
        $('.checkout_page').append(checkout_item);
    });
}
/*=======================
    End Render Cart Section
=========================*/

/*=======================
    Render Wishlist -- Added by mutaman
=========================*/
function render_wishlist(items) {
    $('.wishlist_item').remove();
    // var wishlistpage=$('.wishlist_page').length != 0 ? true : false;
    $.each(items, function (key, item) {
        var cart_options = '';
        $.each(item.options.options, function (option_key, option) {
            var child_options = '';
            $.each(option, function (child_option_key, child_option_value) {
                child_options += `${child_option_value.name},`;
            })
            cart_options += `<br><small>${option_key}: (${child_options})</small>`;
        });
        //    console.log(item);
        var qtyrow = parseInt(item.qty);

        // if (wishlistpage == true)
        // {
        // Added by mutaman
        // TODO CART TAX
        var wishlist_page_item = `<div class="item col-lg-6 col-sm-12 wishlist_item wishlist_item${item.rowId}">
                                        <div class="cart-item-image">
                                            <div class="img-cart-product">
                                                <a href="#">
                                                    <img src="${item.options.preview != null ? item.options.preview : ''}" data-src="${item.options.preview != null ? item.options.preview : ''}" alt="#" class="lazyload img-fluid img-product" onerror="this.src='#'">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cart-item-details">
                                            <div class="list-item">
                                                <a href="generateProductUrl">${str_limit(item.name, 100)}</a>
                                            </div>
                                                <div class="list-item m-t-15">
                                                    <label>Unite Price:</span></label>
                                                    <strong class="lbl-price">
                                                    ${amount_format(item.price)}</span>
                                                        <span class="discount-rate-cart">
                                                            ${item.discount > 0 ? `(${item.discount})` : ''}
                                                        </span>
                                                    </strong>
                                                </div>
                                            <div class="list-item">
                                                <label>Total Price:</label>
                                                <strong class="lbl-price total_price${item.rowId}">${amount_format(item.price * item.qty)}</strong>

                                            </div>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-cart-remove remove_cart" data-id="${item.rowId}"><i class="icon-close"></i>Remove</a>
                                        </div>
                                        <div class="cart-item-quantity">
                                            <span>Quantity: ${item.qty}</span>
                                            <div class="number-spinner">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-default btn-spinner-minus cart_decrement" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}"  data-type="minus" data-field="quant[1]" data-dir="dwn"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">-</a></button>
                                                    </span>
                                                    <input type="text" class="form-control text-center current_cart_qty${item.rowId} exist_cart${item.id}" data-min="1" data-max="${item.options.stock}" value="${item.qty}">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-default btn-spinner-plus cart_increment" data-type="plus" data-field="quant[1]" data-id="${item.rowId}" data-stock="${item.options.stock}" data-isvariation="${item.options.options.length != 0 ? 1 : 0}" data-productid="${item.id}" data-dir="up"><a class="text-dark" href="${item.options.options.length != 0 ? base_url + '/product/' + item.options.slug : 'javascript:void(0)'}">+</a></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
        $('.wishlist_page').append(wishlist_page_item);
        // }
    });
}
/*=======================
    End Render Wishlist Section
=========================*/

/*=======================
    CartQty function
=========================*/
function cartqty(cartId, qty) {
    var url = cart_increment;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id: cartId,
            qty: qty
        },
        dataType: 'json',
        success: function (response) {
            $('.cart_subtotal').html(amount_format(response.cart_subtotal));

            $('.cart_count').html(response.cart_count);
            $('.cart_total').html(response.cart_total);
            $('.cart_tax').html(response.cart_tax);
        },
        error: function (xhr, status, error) {
            $.each(xhr.responseJSON.errors, function (key, item) {
                Sweet('error', item)
            });
        }
    });
}
/*=======================
    End CartQty function
=========================*/

/*=======================
    Add To Cart Modal
=========================*/
$(document).on('click', '.add_to_cart_modal', function () {
    var product_id = $(this).data('id');
    render_card_modal(product_id);

    var previous_id = $('.quickview-slider-active').data('termid');
    $('.quickview-slider-active').removeClass('gellery_' + previous_id);

    $('.quickview-slider-active').addClass('gellery_' + product_id);
    $('.quickview-slider-active').attr('termid', product_id);

});
/*=======================
   End Add To Cart Modal
=========================*/


/*=======================
    Add To Wishlist
=========================*/
$(document).on('click', '.add_to_wishlist', function () {
    var termid = $(this).data('id');
    $.ajaxSetup({
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: base_url + '/add-to-wishlist',
        data: { id: termid },
        dataType: 'json',
        beforeSend: function () {
            // var spinner = `<div class="spinner-border spinner-border-sm" role="status">
            // <span class="visually-hidden"></span>
            // </div>`;

            var spinner = `<div class="spinner-border spinner-border-add-cart-list" role="status"></div>`;

            $('.wishlist' + termid).html(spinner);

        },
        success: function (response) {
            $('.wishlist' + termid).removeClass('add_to_wishlist');
            $('.wishlist' + termid).attr('href', base_url + '/wishlist');
            $('.wishlist' + termid).html(`<i class="icon-heart"></i>`);
            $('.wishlist_count').html(response);
        }
    });
});
/*=======================
    End Add To Wishlist
=========================*/

/*=======================
    render_card_modal
=========================*/
function render_card_modal(product_id) {
    var url = base_url + '/product-details';
    $('#modal_id').val('');

    $.ajaxSetup({
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: url + '/' + product_id,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('.option_form_area').html('');
            $('.modal_pricesvariationshide').remove();
            $('.modal-option-area').html('');
            $('.quick_single_slider').remove();
            $('.quick_sliders').html('');
        },

        success: function (response) {
            var html = '';
            $('.single-slider').remove();
            $('.render_star').html('');
            $('.total_review').remove();
            $('.cats_area').html('');

            $('#modal_id').val(product_id);

            $.each(response.galleries, function (key, item) {
                var html = `<div class="quick_single_slider single-slider">
                                    <img src="${item}" alt="${response.data.title}">
                                    </div>`;
                $('.quick_sliders').append(html);

            });

            if (response.data.rating != null && response.data.rating != 0) {
                for (var i = 1; i <= 5; i++) {
                    var rating_html = `<li><i class="icofont-star ${i <= response.data.rating ? 'star' : ''}"></i></li>`;
                    $('.render_star').append(rating_html);
                }
                $('.render_rating').append(`<a href="#" class="total-review total_review"> ${response.data.rating} | (${response.data.reviews_count}) Reviews</a>`);
            }

            if (response.data.category.length > 0) {
                var cats_html = '';
                $.each(response.data.category, function (key, item) {
                    cats_html += `<a href="${base_url + '/category/' + item.slug}" class="categories" data-id="${item.id}">${item.name}</a>`;

                });

                $('.cats_area').append(`<p class="cat">Category :${cats_html}</p>`);
            }

            if (response.data.brands.length > 0) {
                var cats_html = '';
                $.each(response.data.brands, function (key, item) {
                    cats_html += `<a href="${base_url + '/brand/' + item.slug}" class="categories" data-id="${item.id}">${item.name}</a>`;
                });

                $('.cats_area').append(`<p class="cat">Brand :${cats_html}</p>`);
            }

            if (response.data.tags.length > 0) {
                var cats_html = '';
                $.each(response.data.tags, function (key, item) {
                    cats_html += `<a href="${base_url + '/tag/' + item.slug}" class="categories" data-id="${item.id}">${item.name}</a>`;
                });

                $('.cats_area').append(`<p class="cat">Tags :${cats_html}</p>`);
            }

            $('.quickViewtitle').text(response.data.title);
            $('.quickViewdescription').text(response.data.excerpt != null ? response.data.excerpt.value : '');
            if (response.galleries.length > 1) {
                quickViewSlider('.gellery_' + product_id);
            }

            $('.modal_stock').remove();
            if (response.data.optionwithcategories.length == 0) {
                var stock_status = response.data.price.stock_status == 1 ? 'In Stock' : 'Out of stock';
                var stock_status = `<a href="javascript:void(0)">${response.data.price.stock_status == 1 ? 'In Stock' : '<span class="text-danger">Out of stock</span>'}</a>`
            }
            else {
                var stock_status = '';
            }

            var stock_html = `<div class="product-tag modal_stock modal_stock_status ${response.data.optionwithcategories.length != 0 ? 'none' : ''}">
                                            <p class="cat">Availability:
                                            <span class="modal_stock_status_display">
                                                ${response.data.optionwithcategories.length == 0 ? stock_status : ''}
                                                </span>
                                            </p>
                                        </div>`;

            $('.quick_stock_area').html(stock_html);

            if (response.data.optionwithcategories.length == 0) {


                var main_price = amount_format(response.data.price.price, 'sign');
                var old_price = null;
                if (response.data.price.old_price != null) {
                    old_price = amount_format(response.data.price.old_price, 'sign');

                    main_price = `<span class="discount">${main_price}</span><s>${old_price}</s>`;
                }
                else {
                    main_price = `<span class="discount">${main_price}</span>`;
                }

                var hide_input = `<input class="none modal_pricesvariationshide"
                                   data-stockstatus="${response.data.price.stock_status}"
                                   data-stockmanage="${response.data.price.stock_manage}"
                                   data-sku="${response.data.price.sku}"
                                   data-qty="${response.data.price.qty}"
                                   data-oldprice="${response.data.price.old_price}"
                                   data-price="${response.data.price.price}"
                                   type="radio"
                                   checked>`;

                $('.quick_price_area').html(main_price);
                $('.quick_form').append(hide_input);

            }
            else {
                render_price_variation(response.data.optionwithcategories);
            }



            modal_variations();
        },
        error: function (xhr, status, error) {

            $.each(xhr.responseJSON.errors, function (key, item) {
                Sweet('error', item)

            });

        }
    })
}


$(document).on('submit', '.modal_product_option_form', function (e) {
    e.preventDefault();

    if ($('.modal_pricesvariationshide').length == 1) {
        var $qty = $('.input-number');
        var $button = $(this);
        var $input = $button.closest('.quantity').find("input.input-number");
        var currentVal = parseInt($input.val(), 10);
        if (!isNaN(currentVal)) {

            if ($('.modal_input_qty').data('max') < currentVal) {
                Sweet('error', $('.modal_input_qty').data('max') + ' Pieces Available Only');
                return false;
            }

        }

    }

    var required = false;


    if ($('.modal_required_var').length > 0) {
        $('.modal_required_var').each(function () {
            var optionid = $(this).data('id');
            required = false;

            $('.modal_variations' + optionid).each(function () {
                if (this.checked == true) {
                    required = true;
                }
            });

        });
    }
    else {
        required = true;
    }

    if (required == false) {
        Sweet('error', 'Select a required variation');
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
            beforeSend: function () {
                $('.modal_add_to_cart_btn').text('Please Wait.....');
                $('.modal_add_to_cart_btn').attr('disabled', '');
            },
            success: function (response) {
                $('.modal_add_to_cart_btn').text('Add To Cart');
                $('.modal_add_to_cart_btn').removeAttr('disabled');

                render_cart(response.cart_content);
                $('.subtotal').html(response.cart_subtotal);
                $('.cart_subtotal').html(response.cart_subtotal);

                $('.tax').html(response.cart_tax);

                $('.total_amount').val(response.cart_total);
                $('.cart_count').html(response.cart_count)

                Sweet('success', 'Cart Added');





            },
            error: function (xhr, status, error) {
                $('.modal_add_to_cart_btn').text('Add To Cart');
                $('.modal_add_to_cart_btn').removeAttr('disabled');

                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                });

            }
        });


    }
});

$(document).on('change', '.input-number', function () {

    if ($(this).val() <= 0) {
        $(this).val(1);
    }

    var stockmanage = $(this).data('stockmanage');
    var stockstatus = $(this).data('stockstatus');
    var max = $(this).data('max');
    if (stockstatus == 0) {
        $(this).val(0);
        $(this).attr('disabled', '');
    }

    if (stockmanage == 1) {
        if (max < $(this).val()) {
            $(this).val(max);
        }
    }


});


$(document).on('click', '.product_option', function () {

    var qty = $(this).data('qty');
    var stockmanage = $(this).data('stockmanage');
    var stockstatus = $(this).data('stockstatus');

    if (stockmanage == 1) {
        $('.input_qty').attr('max', qty);
    }
    else {
        $('.input_qty').removeAttr('max');
    }


});

$(document).on('submit', '.option_form', function (e) {
    e.preventDefault();
    var form_data = $(this).serialize();
    var required = false;
    if ($('.req').length > 0) {
        $('.req:checked').each(function () {
            if (this.checked == true) {
                required = true;
            } else {
                required = false;
            }

        });
        if (required == false) {
            $('.required_option').show();
        } else {
            $('.required_option').hide();
        }
    } else {
        required = true;
    }
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
            beforeSend: function () {
                $('.add_to_cart_form_btn').text('Please Wait.....');
                $('.add_to_cart_form_btn').attr('disabled', '');
            },
            success: function (response) {
                $('.add_to_cart_form_btn').text('Add To Cart');
                $('.add_to_cart_form_btn').removeAttr('disabled');

                render_cart(response.cart_content);
                $('.subtotal').text(amount_format(response.cart_subtotal));

                $('.cart_count').html(response.cart_count)

                Sweet('success', 'Cart Added');

                $('#product_variation_modal').modal('toggle');



            },
            error: function (xhr, status, error) {
                $('.add_to_cart_form_btn').text('Add To Cart');
                $('.add_to_cart_form_btn').removeAttr('disabled');

                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                });

            }
        });


    }
});

function modal_variations() {
    var totalprice = 0;
    var totaloldprice = 0;

    if ($('.modal_pricesvariationshide').length == 1) {

        $('.modal_pricesvariationshide').each(function () {


            var oldprice = $(this).data('oldprice');
            var price = $(this).data('price');
            var qty = $(this).data('qty');
            totalprice = totalprice + price;
            totaloldprice = totaloldprice + oldprice;

            if ($(this).data('stockstatus') == 1) {
                $('.modal_input_qty').attr('data-max', qty);
                $('.modal_input_qty').attr('max', qty);
            }
            $('.modal_add_to_cart_btn').removeAttr('disabled');
            $('.modal_maxqty').text(qty);
            $('.modal_qty_display').show();
        });

        $('.modal_pricesvariationshide').each(function () {
            if ($(this).is(':checked') && $(this).data('stockstatus') == 0) {
                $('.modal_add_to_cart_btn').attr('disabled', '');
            }
        });




    }
    else {
        $('.modal_pricesvariations').each(function () {

            if ($(this).is(':checked') && $(this).data('stockstatus') == 1) {
                var oldprice = $(this).data('oldprice');
                var price = $(this).data('price');
                var qty = $(this).data('qty');
                totalprice = totalprice + price;
                totaloldprice = totaloldprice + oldprice;

                if ($(this).data('stockmanage') == 1) {
                    $('.modal_input_qty').attr('data-max', qty);
                    $('.modal_input_qty').attr('max', qty);
                }
                $('.modal_add_to_cart_btn').removeAttr('disabled');

            }
        });

        $('.modal_pricesvariations').each(function () {
            if ($(this).is(':checked') && $(this).data('stockstatus') == 0) {
                $('.modal_add_to_cart_btn').attr('disabled', '');
            }
        });


        if (totalprice == 0) {
            $('.price_area').html('');
            return false;
        }
    }






    var newtotaloldprice = totaloldprice != 0 ? amount_format(totaloldprice) : '';
    var price_html = `<span class="discount">${amount_format(totalprice)}</span><s>${newtotaloldprice}</s>`;
    $('.quick_price_area').html(price_html);


}


function render_price_variation(prices) {
    $.each(prices, function (key, row) {
        var option_group_title = `<h6><span class="text-danger ${row.is_required == 1 ? 'modal_required_var' : ''}" data-id="${row.id}">${row.is_required == 1 ? '*' : ''}</span>${row.category.name ?? ''} :</h6>`;

        var option_html = '';
        $.each(row.priceswithcategories, function (k, price) {
            if (row.category.slug == 'checkbox') {
                var input_option = `&nbsp&nbsp <input
    class="custom-control modal_variations${row.id} modal_pricesvariations ${row.is_required == 1 ? 'req' : ''}"
    data-stockstatus="${price.stock_status}"
    data-stockmanage="${price.stock_manage}"
    data-sku="${price.sku}"
    data-qty="${price.qty}"
    data-oldprice="${price.old_price}"
    data-price="${price.price}"
    type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
    id="modal_variation${price.id}"
    name="option[${row.id}][]"
    value="${price.id}"
    ${row.is_required == 1 && k == 0 ? 'checked' : ''}
    >

    <label for="modal_variation${price.id}">${price.category.name}</label>`;
            }

            else if (row.category.slug == 'checkbox_custom') {
                var input_option = `
        <div class="custom_checkbox modal_variation${price.id}">
        <input
        class="custom-control modal_variations${row.id} modal_pricesvariations ${price.is_required == 1 ? 'req' : ''}"
        data-stockstatus="${price.stock_status}"
        data-stockmanage="${price.stock_manage}"
        data-sku="${price.sku}"
        data-qty="${price.qty}"
        data-oldprice="${price.old_price}"
        data-price="${price.price}"
        type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
        id="modal_variation${price.id}"
        name="option[${row.id}][]"
        value="${price.id}">
        <label for="modal_variation${price.id}">${price.category.name}</label>
        </div>`;

            }

            else if (row.category.slug == 'radio') {
                var input_option = `<div class="custom_radio"><input
        class="custom-control modal_variations${row.id} modal_pricesvariations ${row.is_required == 1 ? 'req' : ''}"
        data-stockstatus="${price.stock_status}"
        data-stockmanage="${price.stock_manage}"
        data-sku="${price.sku}"
        data-qty="${price.qty}"
        data-oldprice="${price.old_price}"
        data-price="${price.price}"
        type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
        id="modal_variation${price.id}"
        name="option[${row.id}][]"
        value="${price.id}">
        <label for=" modal_variation${price.id}">${price.category.name}</label></div>`;

            }

            else if (row.category.slug == 'radio_custom') {
                var input_option = `&nbsp&nbsp
            <div class="custom_radio modal_variations${row.id} modal_pricesvariations variation${price.id}">
                <input
                class="custom-control modal_variations${row.id} modal_pricesvariations ${row.is_required == 1 ? 'req' : ''}"
        data-stockstatus="${price.stock_status}"
        data-stockmanage="${price.stock_manage}"
        data-sku="${price.sku}"
        data-qty="${price.qty}"
        data-oldprice="${price.old_price}"
        data-price="${price.price}"
        type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
        id="modal_variation${price.id}"
        name="option[${row.id}][]"
        value="${price.id}">
               <label for="modal_variation${price.id}">${price.category.name}</label>
            </div>`;
            }

            else if (row.category.slug == 'color_single') {
                var input_option = `<div class="color_widget">
        <div class="single_color">
            <input class=" modal_variations${row.id} color_single modal_pricesvariations ${row.is_required == 1 ? 'req' : ''}"
        data-stockstatus="${price.stock_status}"
        data-stockmanage="${price.stock_manage}"
        data-sku="${price.sku}"
        data-qty="${price.qty}"
        data-oldprice="${price.old_price}"
        data-price="${price.price}"
        type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
        id="modal_variation${price.id}"
        name="option[${row.id}][]"
        value="${price.id}">


        <label
        class="modal_variation$${price.id}

         ${price.category.name != 'white' ? 'text-light' : 'text-dark'}
         "
         for="modal_variation${price.id}"
         style="background-color: ${price.category.name}">
        </label>


        </div>
      </div>`;
            }

            else if (row.category.slug == 'color_multi') {
                var input_option = `<div class="color_widget">
        <div class="single_color">
            <input class=" modal_variations${row.id} color_single modal_pricesvariations ${price.is_required == 1 ? 'req' : ''}"
        data-stockstatus="${price.stock_status}"
        data-stockmanage="${price.stock_manage}"
        data-sku="${price.sku}"
        data-qty="${price.qty}"
        data-oldprice="${price.old_price}"
        data-price="${price.price}"
        type="${row.select_type == 1 ? 'checkbox' : 'radio'}"
        id="modal_variation${price.id}"
        name="option[${row.id}][]"
        value="${price.id}">

        <label
        class="modal_variation$${price.id}
         ${price.category.name != 'white' ? 'text-light' : 'text-dark'}
         "
         for="modal_variation${price.id}"
         style="background-color: ${price.category.name}">
        </label>

        </div>

    </div>`;

            }

            option_html += `<div class="color">${input_option}</div>`;
        });

        var base_html = `<div class="option-colors">
            ${option_group_title}

            ${option_html}
         </div>`;

        $('.modal-option-area').append(base_html);
    });

}


$(document).on('change', '.modal_pricesvariations', function () {
    var stockstatus = $(this).data('stockstatus');
    var stockmanage = $(this).data('stockmanage');
    var sku = $(this).data('sku');
    var qty = $(this).data('qty');
    var oldprice = $(this).data('oldprice');
    var price = $(this).data('price');

    if ($(this).is(':checked')) {
        var stockstatus_html = `<a href="javascript:void(0)">${stockstatus == 1 ? 'In Stock' : '<span class="text-danger">Out of stock</span>'}</a>`

        $('.modal_stock_status_display').html(stockstatus_html);
        $('.modal_stock_status').show();

        if (stockmanage == 1) {
            $('.modal_qty_display').show();
            $('.modal_maxqty').html(qty);
        }

    }
    else {

        $('.modal_stock_status').hide();
        $('.modal_qty_display').hide();

    }

    modal_variations();


});


render_cart(cart_content);

// const wishlist_content = JSON.parse($('#wishlist_content').val());

// Create a new array with the converted data format using the map() method
var converted_wishlist_content = Object.values(wishlist_content).map(function (item) {
    return {
        created_at: null,
        discount: {
            id: null,
            term_id: null,
            special_price: null,
            price_type: null,
            ending_date: null
        },
        featured: null,
        features: [],
        firstprice: item.options.firstprice,
        full_id: null,
        id: item.id,
        is_variation: null,
        lastprice: item.options.lastprice,
        medias: null,
        preview: {
            id: null,
            term_id: null,
            key: "preview",
            value: item.options.preview
        },
        rating: item.options.rating,
        slug: item.options.slug,
        status: 1,
        title: item.name,
        type: 'product',
        updated_at: null
    };
});

// console.log(converted_wishlist_content);




if (converted_wishlist_content.length !== 0) {
    render_product_preloaded(10, '.wishlist_page_preloader', 'col-6 col-sm-4 col-md-3 col-mds-5 col-product', '');

    runpreloader();


    // Hide the preloader after a short delay (adjust the delay time as needed)
    setTimeout(function () {
        $('.wishlist_page_preloader').remove();

        // Render the products if wishlist_content is not empty
        if (converted_wishlist_content.length !== 0) {
            render_primary_product(converted_wishlist_content, '.wishlist_page', 'col-6 col-sm-4 col-md-3 col-mds-5 col-product', true);
        } else {
            // If wishlist_content is empty, remove the wishlist_page container
            $('.wishlist_page').remove();

        }
    }, 1000); // Adjust the delay time as needed (1 second in this example)
} else {
    // $('.zero_product').show(); 
    $('.zero_product').removeClass('d-none');
}


$('.trans_lang').on('change', function () {
    $('.change_lang_form').submit();
});

var entityMap = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#39;',
    '/': '&#x2F;',
    '`': '&#x60;',
    '=': '&#x3D;'
};

/*-------------------------
        escapeHtml
    --------------------------*/
function escapeHtml(string) {
    return String(string).replace(/[&<>"'`=\/]/g, function (s) {
        return entityMap[s];
    });
}
