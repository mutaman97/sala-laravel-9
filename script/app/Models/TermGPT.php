<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Str;
use App\Models\Termmeta;
// use App\Models\Termmedia;
use App\Models\Category;
use App\Models\Price;
use App\Models\Productoption;
use App\Models\Termcategory;
use App\Models\Discount;
use App\Models\Review;
use App\Models\Orderitem;

class Term extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_id',
    ];

    public static function boot()
    {
        parent::boot();
        if (tenant('id') != null) {

            static::creating(function ($model) {
                $model->id = Term::max('id') + 1;
                $model->full_id = str_pad($model->id, 7, '0', STR_PAD_LEFT);
            });
        }
    }

    // Relation To User
    public function user()
    {
        return $this->belongsTo(User::class, 'featured', 'id');
    }

    // Relation To Termmeta
    public function termMeta()
    {
        return $this->hasOne(Termmeta::class, 'term_id')->where('key', 'service');
    }

    // Relation To TermsMeta
    public function meta()
    {
        return $this->hasOne(Termmeta::class, 'term_id');
    }

    // // Relation To Termmeta
    // public function termmetas($key)
    // {
    //     return $this->hasOne(Termmeta::class, 'term_id')->where('key', $key);
    // }

    // Relation To Termmeta
    public function termmetas()
    {
        // if ($key) {
        //     return $this->hasOne(Termmeta::class, 'term_id')->where('key', $key);
        // }

        return $this->hasOne(Termmeta::class, 'term_id');
    }

    public function quickStart()
    {
        return $this->termmetas()->where('key', 'quick_start_meta');
    }

    // Relation To TermsMeta
    public function page()
    {
        return $this->termmetas()->where('key', 'page');
    }

    // Relation To TermsMeta
    public function excerpt()
    {
        return $this->termmetas()->where('key', 'excerpt');
    }

    // Relation To TermsMeta
    public function thum_image()
    {
        return $this->termmetas()->where('key', 'thum_image');
    }

    // Relation To TermsMeta
    public function description()
    {
        return $this->termmetas()->where('key', 'description');
    }

    public function preview()
    {
        return $this->termmetas()->where('key', 'preview');
    }

    // Relation To Termmeta
    public function media()
    {
        return $this->termmetas()->where('key', 'preview');
    }

    // Relation To Termmeta
    public function medias()
    {
        return $this->termmetas()->where('key', 'gallery');
    }

    // Relation To Termmeta
    public function seo()
    {
        return $this->termmetas()->where('key', 'seo');
    }

    // Relation To Termmeta
    public function discount()
    {
        return $this->hasOne(Discount::class, 'term_id');
    }

    // Relation To Termmeta
    public function price()
    {
        return $this->hasOne(Price::class, 'term_id')->where('productoption_id', null);
    }

    // Relation To Termmeta
    public function firstprice()
    {
        return $this->hasOne(Price::class, 'term_id')->orderBy('price', 'asc');
    }

    // Relation To Termmeta
    public function lastprice()
    {
        return $this->hasOne(Price::class, 'term_id')->orderBy('price', 'desc');
    }

    // Relation To Termmeta
    public function prices()
    {
        return $this->hasMany(Price::class, 'term_id');
    }

    // Relation To Category
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'termcategories');
    }

    // Relation To Category
    public function tags()
    {
        return $this->categories()->where('type', 'tag');
    }

    // Relation To Category
    public function category()
    {
        return $this->categories()->where('type', 'category');
    }

    // Relation To Category
    public function brands()
    {
        return $this->categories()->where('type', 'brand');
    }

    // Relation To Termcategory
    public function termcategories()
    {
        return $this->hasMany(Termcategory::class);
    }

    // Relation To Productoption
    public function productoption()
    {
        return $this->hasMany(Productoption::class, 'term_id');
    }

    // Relation To Review
    public function reviews()
    {
        return $this->hasMany(Review::class, 'term_id');
    }

    // Relation To Productoption
    public function productoptionwithcategories()
    {
        return $this->hasMany(Productoption::class, 'term_id')->with('categorywithchild', 'priceswithcategories');
    }

    // Relation To Productoption
    public function optionwithcategories()
    {
        return $this->hasMany(Productoption::class, 'term_id')->with('category', 'priceswithcategories');
    }

    // Relation To Orderitem
    public function orders()
    {
        return $this->hasMany(Orderitem::class, 'term_id', 'id');
    }

    public function makeSlug($title, $type)
    {
        $slug_gen = str($title)->slug();
        $slug = Term::where('type', $type)->where('slug', $slug_gen)->count();
        if ($slug > 0) {
            $slug_count = $slug + 1;
            return $slug = $slug_gen . $slug_count;
        }

        return $slug_gen;
    }

    // Relation To Termmeta
    public function serviceMeta()
    {
        return $this->hasOne(Termmeta::class)->where('key', 'service')->select('id', 'term_id', 'value');
    }

    // Relation To Category
    public function features()
    {
        return $this->belongsToMany(Category::class, 'termcategories')->where('type', 'product_feature')->select('id', 'name', 'type', 'slug');
    }

    // Relation To Termmeta
    public function pagecontent()
    {
        return $this->hasOne(Termmeta::class)->where('key', 'page')->select('id', 'term_id', 'value');
    }
}
