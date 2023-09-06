<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Productoption;
use App\Models\Term;
use App\Models\Category;

class TenantProductoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $parent_attributes = ['Color','Size','Fabric','Material'];

        $products = Term::where([
            ['type', '=', 'product'],
            ['is_variation', '=', 1]
        ])->get();

        $productAttributes = [];

        // Get all random 'parent_attribute' category IDs
        $parentIds = Category::where('type', 'parent_attribute')->pluck('id')->toArray();

        // Get child IDs linked to parent IDs
        $childIdsByParent = Category::where('type', 'child_attribute')
        ->whereIn('category_id', $parentIds)
        ->get()
        ->groupBy('category_id');

        foreach ($products as $product) {

            $categoryIdKey = array_rand($parentIds);
            $categoryId = $parentIds[$categoryIdKey];

            $termId = $product->id;

            $productAttributes[] = [
                "term_id" => $termId,
                "category_id" => $categoryId,
                "select_type" => 1,   //1 is checkbox 2 is radio select
                "is_required" => 1
            ];

            $childIds = ($childIdsByParent[$categoryId] ?? collect())->pluck('id')->toArray();

            for ($i = 1; $i <= 3; $i++)
            {

                $childId = array_shift($childIds); // Get and remove the first element

                $productAttributes[] = [
                    "term_id" => $termId,
                    "category_id" => $childId,
                    "select_type" => 1,   //1 is checkbox 2 is radio select
                    "is_required" => 1
                ];
            }
        }

        Productoption::insert($productAttributes);
    }
}
