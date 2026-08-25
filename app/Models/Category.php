<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['name', 'description', 'status', 'parent_id', 'slug', 'image'];


    
    //* 2- global   filtering 
    public function scopeFilter(Builder $builder, $filters)
    {
        //^ use categories.name  or  name
        $builder->when($filters['name'] ?? false, function ($builder, $value) {
            $builder->where('categories.name', '=', $value);
        });

        $builder->when($filters['status'] ?? false, function ($builder, $value) {
            $builder->where('categories.status', '=', $value);
        });
    }


    //* categories has many products
    public function products()
    {   //* category_id is a relation into  products table  
        return $this->hasMany(Product::class , 'category_id' , 'id');
    }



    public function parent()
    {  
        return $this->belongsTo(Category::class , 'parent_id' , 'id')
        ->withDefault(
            [
                'name'=> '-'
            ]
        );
    }
    public function children()
    {  
        return $this->hasMany(Category::class , 'parent_id' , 'id');
    }














    //* 1- Local Scope
    // public function scopeActive(Builder $builder){
    //     $builder->where('status', '=' , 'active');
    // } 
}
