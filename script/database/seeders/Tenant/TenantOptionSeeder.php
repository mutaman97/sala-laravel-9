<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Option;
class TenantOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options= array(
        array(
            "id" => 1,
            "key" => "seo",
            "value" => '{"title":"","description":"test","canonical":"","tags":"test","twitterTitle":"@salaplatform"}',
            "autoload" => 0
        ),
        array(
            "id" => 2,
            "key" => "google_map",
            "value" => '{"api":"","range":"","shipping":""}',
            "autoload" => 0
        ),
        array(
            "id" => 3,
            "key" => "languages",
            "value" => '[{"name":"English","code":"en"},{"name":"Arabic","code":"ar"}]',
            "autoload" => 1
        ),
        array(
            "id" => 4,
            "key" => "store_sender_email",
            "value" => "storename@sala.sd",
            "autoload" => 1
        ),
        // array(
        //     "id" => 5,
        //     "key" => "invoice_data",
        //     "value" => '{"store_legal_name":"Store Name",
        //         "store_legal_description":"Our platform is designed to provide you with the tools and support you need to create a successful online business.",
        //         "store_legal_phone":"+249-1234-567-89",
        //         "store_legal_address":"Khartoum, Sudan, Burri Block 6",
        //         "store_legal_house":"Building 9 floor 3",
        //         "store_legal_city":"Khartoum",
        //         "country":"Sudan",
        //         "post_code":"11111",
        //         "store_legal_email":"storename@example.com"}',
        //     "autoload" => 1
        // ),
        array(
            "id" => 6,
            "key" => "timezone",
            "value" => "Africa/Khartoum",
            "autoload" => 1
        ),
        array(
            "id" => 7,
            "key" => "default_language",
            "value" => "ar",
            "autoload" => 1
        ),
        array(
            "id" => 8,
            "key" => "weight_type",
            "value" => "KG",
            "autoload" => 1
        ),
        array(
            "id" => 9,
            "key" => "currency_data",
            "value" => '{"currency_name":"SDG","currency_position":"left","currency_icon":"SDG"}',
            "autoload" => 1
        ),
        array(
            "id" => 10,
            "key" => "average_times",
            "value" => '{"delivery_time":"10 min","pickup_time":"20 min"}',
            "autoload" => 0
        ),
        array(
            "id" => 11,
            "key" => "order_method",
            "value" => "mail",
            "autoload" => 0
        ),
        array(
            "id" => 12,
            "key" => "whatsapp_no",
            "value" => "249123456789",
            "autoload" => 1
        ),
        array(
            "id" => 15,
            "key" => "order_settings",
            "value" => '{"order_method":"mail","shipping_amount_type":"shipping","google_api":"","google_api_range":"2000","delivery_fee":"10"}',
            "autoload" => 0
        ),
        array(
            "id" => 17,
            "key" => "home_page",
            "value" => '{"meta":{"featured_products_title":"Featured Products","featured_products_description":"browse our featured products","featured_products_status":"yes","products_area_short_title":"For you","products_area_title":"Latest Products","products_area_description":"Take a look  at our latest products","discount_product_title":"Deals Of The Day","discount_product_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci lacus, tempus quis libero nec, vehicula sagittis erat.","discount_product_status":"yes","testimonial_title":"Happy Clients Say","testimonial_description":null,"testimonial_status":"yes","menu_area_title":"Our Recommendations","menu_area_description":"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.","menu_area_status":"yes","blog_area_short_title":"Last added blog posts","blog_area_title":"Latest Blog Posts","blog_area_description":"There are many variations of passages of Lorem Ipsum available,but the majority have suffered alteration in some form.","blog_area_status":"yes"},"seo":{"site_title":"Sala Store","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"insert page discription here!","meta_image":"uploads/dummy/21/12/61af7a4466fcf0712211638890052.jpg"}}',
            "autoload" => 0
        ),
        array(
            "id" => 19,
            "key" => "product_page",
            "value" => '{"meta":{"product_page_short_title":"Wanna more?","product_page_title":"Check Related products","product_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg"},"seo":{"site_title":"Products","twitter_title":"@salaplatform","tags":"tags1","description":"test","meta_image":"uploads/dummy/21/12/61cdee406c8533012211640885824.png"}}',
            "autoload" => 0
        ),
        array(
            "id" => 20,
            "key" => "cart_page",
            "value" => '{"meta":{"cart_page_title":"Cart","cart_page_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","cart_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg"},"seo":{"site_title":"Cart","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"test","meta_image":null}}',
            "autoload" => 0
        ),
        array(
            "id" => 21,
            "key" => "checkout_page",
            "value" => '{"meta":{"cart_page_title":"Checkout","cart_page_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","checkout_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg","checkout_form_title":"Make Your Checkout Here","checkout_form_description":"Please register in order to checkout more quickly"},"seo":{"site_title":"Checkout","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"test","meta_image":"uploads/dummy/21/12/61cded4b446463012211640885579.png"}}',
            "autoload" => 0
        ),
        array(
            "id" => 22,
            "key" => "menu_page",
            "value" => '{"meta":{"menu_page_title":"Our Menu","menu_page_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","menu_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg","menu_product_section_title":"Latest Receipe","menu_product_section_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci lacus, tempus quis libero nec, vehicula sagittis erat.","menu_page_product_ads_banner":"uploads/dummy/21/12/61cded4b446463012211640885579.png","menu_page_product_ads_link":"/products"},"seo":{"site_title":"Our menu","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"test","meta_image":"uploads/dummy/21/12/61af7a4477da90712211638890052.jpg"}}',
            "autoload" => 0
        ),
        array(
            "id" => 23,
            "key" => "products_page",
            "value" => '{"meta":{"products_page_title":"Products","products_page_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","products_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg","products_page_product_ads_banner":"uploads/dummy/21/12/61cdee406c8533012211640885824.png","products_page_product_ads_link":"/products"},"seo":{"site_title":"Our products","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"tes","meta_image":null}}',
            "autoload" => 0
        ),
        array(
            "id" => 24,
            "key" => "login_page",
            "value" => '{"seo":{"site_title":"Login","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"test","meta_image":null}}',
            "autoload" => 0
        ),
        array(
            "id" => 25,
            "key" => "register_page",
            "value" => '{"seo":{"site_title":"Register","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"fff","meta_image":null}}',
            "autoload" => 0
        ),
        array(
            "id" => 26,
            "key" => "wishlist_page",
            "value" => '{"meta":{"wishlist_page_title":"Wishlist","wishlist_page_description":"test","wishlist_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg"},"seo":{"site_title":"Wishlist","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"tes","meta_image":null}}',
            "autoload" => 0
        ),
        array(
            "id" => 27,
            "key" => "blog_page",
            "value" => '{"seo":{"site_title":"salaplatform Blogs","twitter_title":"@salaplatform","tags":"food, accessories, clothes","description":"test","meta_image":null},"meta":{"blog_page_title":"Blogs","blog_page_description":"test","blog_page_banner":"uploads/dummy/21/12/61cde8e0371023012211640884448.jpg"}}',
            "autoload" => 0
        ),
        array(
            "id"=>28,
            "key"=>'site_settings',
            "value"=>'{"meta":{"bottom_center_column":"<p>\u00a9 Copyright 2021 -2022. <a href=\"#\" >AMCoders<\/a> All right reserved<\/p>","preloader":"yes","scroll_to_top":"yes","cart_sidebar":"yes","bottom_bar":"yes","en":{"footer_store_description":"Our platform is designed to provide you with the tools and support you need to create a successful online business.","footer_store_address":"Khartoum, Sudan, Al-amarat Street 61","footer_contact_number":"0123456789","footer_copyright":"© 2023 - All Rights Reserved","cart_sidebar":"yes","sidebar":"yes","bottom_bar":"yes","newsletter_status":"yes"},"ar":{"footer_store_description":"منصتنا مصممة لتزويدك بالأدوات والدعم اللازمين لإنشاء عمل ناجح عبر الإنترنت.","footer_store_address":"\u0627\u0644\u062e\u0631\u0637\u0648\u0645, \u0627\u0644\u0633\u0648\u062f\u0627\u0646, \u0627\u0644\u0639\u0645\u0627\u0631\u0627\u062a \u0634\u0627\u0631\u0639 61","footer_contact_number":"0123456789","footer_copyright":"© 2023 - جميع الحقوق محفوظة","cart_sidebar":"yes","sidebar":"yes","bottom_bar":"yes","newsletter_status":"yes"}}}',
            "autoload" => 1
        ),
        array(
            "id"=>29,
            "key"=>'active_languages',
            "value"=>'{"en":"English","ar":"Arabic"}',
            "autoload" => 1
        ),
        array(
            "id" => 30,
            "key" => "theme_color",
            "value" => "#333333",
            "autoload" => 0
        ),
        array(
            "id" => 31,
            "key" => "socialmedia",
            "value" => '{"meta":{"facebook_url":"#","twitter_url":"#","instagram_url":"#","pinterest_url":"#","linkedin_url":"#","vk_url":"#","whatsapp_url":"#","telegram_url":"#","youtube_url":"#","rss_url":"#"}}',

            "autoload" => 1
        )
      );


      Option::insert($options);

    }
}
