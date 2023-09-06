<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Termcategory;
use App\Models\Term;
use App\Models\Category;

class TenantTermcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $productIds = Term::where('type', 'product')->pluck('id');

        $categoryIds = Category::where('type', 'category')->pluck('id');
        $tagIds = Category::where('type', 'tag')->pluck('id');
        $brandIds = Category::where('type', 'brand')->pluck('id');

        $termCategories = [];

        $categoryCount = count($categoryIds);
        $tagCount = count($tagIds);
        $brandCount = count($brandIds);

        foreach ($productIds as $index => $termId)
        {
            $categoryId = $categoryIds[$index % $categoryCount];
            $tagId = $tagIds[$index % $tagCount];
            $brandId = $brandIds[$index % $brandCount];

            $termCategories[] = [
                "term_id" => $termId,
                "category_id" => $categoryId,
            ];

            $termCategories[] = [
                "term_id" => $termId,
                "category_id" => $tagId,
            ];

            $termCategories[] = [
                "term_id" => $termId,
                "category_id" => $brandId,
            ];
        }

        Termcategory::insert($termCategories);
    }

}
