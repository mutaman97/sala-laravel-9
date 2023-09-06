<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TenantfreshDataBaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $themes;

    public function __construct()
    {
        // $file=file_get_contents('theme/themes.json');
        // $this->$themes = json_decode($file);

        $file=File::get('theme/themes.json');
        $this->themes = json_decode($file);

    }

    public function run()
    {
        $tenantTheme = ucfirst($this->getTenantTheme());

        switch ($tenantTheme) {
            case 'Elham':
                $this->call([
                        \Database\Seeders\Tenant\TenantDBSeeder::class,
                        \Database\Seeders\Tenant\TenantOptionSeeder::class,
                        // \Database\Seeders\Tenant\TenantCategorySeeder::class,
                        \Database\Seeders\Tenant\TenantLocationSeeder::class,
                        // \Database\Seeders\Tenant\TenantGetwaySeeder::class,
                        // \Database\Seeders\Tenant\TenantMenuSeeder::class,
                        // \Database\Seeders\Tenant\TenantShippingcategoriesSeeder::class,
                        // \Database\Seeders\Tenant\TenantTermSeeder::class,
                        // \Database\Seeders\Tenant\TenantTermmetaSeeder::class,
                        // \Database\Seeders\Tenant\TenantProductoptionSeeder::class,
                        // \Database\Seeders\Tenant\TenantOrderSeeder::class,
                        // \Database\Seeders\Tenant\TenantReviewSeeder::class,
                        // \Database\Seeders\Tenant\TenantPriceSeeder::class,
                        // \Database\Seeders\Tenant\TenantTermcategoriesSeeder::class,
                        // \Database\Seeders\Tenant\TenantDiscountSeeder::class,
                ]);
                break;
            case 'Grshop':
                $this->call([
                    \Database\Seeders\Tenant\TenantDBSeeder::class,
                    \Database\Seeders\Tenant\TenantOptionSeeder::class,
                    // \Database\Seeders\Tenant\TenantCategorySeeder::class,
                    \Database\Seeders\Tenant\TenantLocationSeeder::class,
                    // \Database\Seeders\Tenant\TenantGetwaySeeder::class,
                    // \Database\Seeders\Tenant\TenantMenuSeeder::class,
                    // \Database\Seeders\Tenant\TenantShippingcategoriesSeeder::class,
                    // \Database\Seeders\Tenant\TenantTermSeeder::class,
                    // \Database\Seeders\Tenant\TenantTermmetaSeeder::class,
                    // \Database\Seeders\Tenant\TenantProductoptionSeeder::class,
                    // \Database\Seeders\Tenant\TenantOrderSeeder::class,
                    // \Database\Seeders\Tenant\TenantReviewSeeder::class,
                    // \Database\Seeders\Tenant\TenantPriceSeeder::class,
                    // \Database\Seeders\Tenant\TenantTermcategoriesSeeder::class,
                    // \Database\Seeders\Tenant\TenantDiscountSeeder::class,
            ]);
                break;
            default:
                // handle default theme
                break;
        }

        foreach ($this->themes as $key => $value)
        {
            if($value->name == $tenantTheme)
            {
                $data = $value;
                $tenant = tenant();
                $tenant->theme = $data->view_path;
                $tenant->save();
            }
        }

    }

    public function getTenantTheme(): string
    {
        $storeData = Session::get('store_data');
        $tenantTheme = $storeData['theme'] ?? '';
        if(empty($tenantTheme)) {

            $tenantTheme = 'Elham';
        }
        return $tenantTheme;
    }
}
