<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Menu;
class TenantMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=now();

        $menus=array(
            array(
                "id" => 1,
                "name" => "Header",
                "position" => "header",
                "data" => '[{"text":"Home","href":"/","icon":"","target":"_self","title":""},{"text":"Products","href":"/products","icon":"empty","target":"_self","title":""},{"text":"Contact","href":"/contact","icon":"empty","target":"_self","title":""},{"text":"Pages","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"Cart","href":"/cart","icon":"empty","target":"_self","title":""},{"text":"Checkout","href":"/checkout","icon":"empty","target":"_self","title":""},{"text":"login","href":"/customer/login","icon":"empty","target":"_self","title":""},{"text":"Register","href":"/customer/register","icon":"empty","target":"_self","title":""},{"text":"Terms and conditions","icon":"","href":"/page/terms-and-conditions","target":"_self","title":""}]},{"text":"Blog","href":"/blog","icon":"empty","target":"_self","title":""},{"text":"Customer","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"Dashboard","href":"/customer/dashboard","icon":"","target":"_self","title":""},{"text":"Orders","href":"/customer/orders","icon":"empty","target":"_self","title":""},{"text":"Reviews","href":"/customer/reviews","icon":"empty","target":"_self","title":""},{"text":"Profile Settings","href":"/customer/settings","icon":"empty","target":"_self","title":""}]},{"text":"Delivery Rider","href":"#","icon":"","target":"_self","title":"","children":[{"text":"Dashboard","href":"/rider/dashboard","icon":"empty","target":"_self","title":""},{"text":"Orders","href":"/rider/order","icon":"empty","target":"_self","title":""},{"text":"Settings","href":"/rider/settings","icon":"empty","target":"_self","title":""}]}]',
                "lang" => "en",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ),
            array(
                "id" => 2,
                "name" => "Header Arabic",
                "position" => "header",
                "data" => '[{"text":"الرئيسية","href":"/","icon":"","target":"_self","title":""},{"text":"المنتجات","href":"/products","icon":"empty","target":"_self","title":""},{"text":"إتصل بنا","href":"/contact","icon":"empty","target":"_self","title":""},{"text":"الصفحات","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"السلة","href":"/cart","icon":"empty","target":"_self","title":""},{"text":"صفحة الدفع","href":"/checkout","icon":"empty","target":"_self","title":""},{"text":"تسجيل الدخول","href":"/customer/login","icon":"empty","target":"_self","title":""},{"text":"تسجيل","href":"/customer/register","icon":"empty","target":"_self","title":""},{"text":"البنود و الشروط","icon":"","href":"/page/terms-and-conditions","target":"_self","title":""}]},{"text":"المدونة","href":"/blog","icon":"empty","target":"_self","title":""},{"text":"العملاء","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"لوحة التحكم","href":"/customer/dashboard","icon":"","target":"_self","title":""},{"text":"الطلبات","href":"/customer/orders","icon":"empty","target":"_self","title":""},{"text":"التقييمات","href":"/customer/reviews","icon":"empty","target":"_self","title":""},{"text":"الصفحة الشخصية","href":"/customer/settings","icon":"empty","target":"_self","title":""}]},{"text":"سائق التوصيل","href":"#","icon":"","target":"_self","title":"","children":[{"text":"لوحة التحكم","href":"/rider/dashboard","icon":"empty","target":"_self","title":""},{"text":"الطلبات","href":"/rider/order","icon":"empty","target":"_self","title":""},{"text":"الإعدادات","href":"/rider/settings","icon":"empty","target":"_self","title":""}]}]',
                "lang" => "ar",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ),
            array(
                "id" => 3,
                "name" => "روابط سريعة",
                "position" => "footer_menu_1",
                "data" => '[{"text":"الرئيسية","icon":"empty","href":"/","target":"_self","title":""},{"text":"المدونة","icon":"empty","href":"/blog","target":"_self","title":""},{"text":"السلة","icon":"empty","href":"/cart","target":"_self","title":""}]',
                "lang" => "ar",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ),
            array(
                "id" => 4,
                "name" => "معلومات عنا",
                "position" => "footer_menu_2",
                "data" => '[{"text":"البنود و الشروط","icon":"","href":"#","target":"_self","title":""},{"text":"من نحن","icon":"empty","href":"#","target":"_self","title":""},{"text":"فريق عملنا","icon":"empty","href":"#","target":"_self","title":""}]',
                "lang" => "ar",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ),
            array(
                "id" => 5,
                "name" => "Quick Links",
                "position" => "footer_menu_1",
                "data" => '[{"text":"Home","icon":"empty","href":"/","target":"_self","title":""},{"text":"Blog","icon":"empty","href":"/blog","target":"_self","title":""},{"text":"Cart","icon":"empty","href":"/cart","target":"_self","title":""}]',
                "lang" => "en",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            ),
            array(
                "id" => 6,
                "name" => "Information",
                "position" => "footer_menu_2",
                "data" => '[{"text":"Terms & Conditions","icon":"","href":"#","target":"_self","title":""},{"text":"About Us","icon":"empty","href":"#","target":"_self","title":""},{"text":"Our Team","icon":"empty","href":"#","target":"_self","title":""}]',
                "lang" => "en",
                "status" => 1,
                "created_at" => $now,
                "updated_at" => $now
            )
        );

        Menu::insert($menus);
    }
}
