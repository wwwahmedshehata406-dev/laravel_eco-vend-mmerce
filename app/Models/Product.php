<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'store_id',
        'price',
        'rating',
        'compare_price',
        'status'
    ];
    // protected $appends = ['image_url'];




    // *=============================== SCOPE===============================

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }


    //*===================== Fack Image For Products =======================
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.opelgtsource.com/assets/default_product.png';
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }



    public function getSalePercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }

        return  number_format((($this->compare_price - $this->price) / $this->compare_price * 100), 1);
    }


    //^* Globel Scope
    //* booted => laravel function using for intialization
    // protected static function booted()
    // {
    //     static::addGlobalScope('store', new StoreScope());
    // }

    //* =============================== Relations ===============================

    //* category has many products
    //* category_id is arelation into  products table
    public function category()
    {                                      
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    //* category has many products
    //* category_id is arelation into  products table  
    public function store()
    {  
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }



    //* products has many tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id', 'id');
    }

}




//   Tag::class,        //& this is the relation
//   'product_tag',     //& pivot table name
//   'product_id',      //& FK in pivot table for the current model
//   'tag_id',          //& FK in pivot table for the related model   
//   'id'