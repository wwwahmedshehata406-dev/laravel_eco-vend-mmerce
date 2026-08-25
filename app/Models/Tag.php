<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected  $fillable =[
        'name', 'slug'
    ];

    public $timestamps = false;

    //& tag  has many tag products
    public function products()
    {   
        return $this->belongsToMany(Tag::class,'product_tag', 'product_id', 'tag_id', 'id');                                
    }

}
//  Tag::class,          //& this is the relation
// 'product_tag',        //& pivot table name
// 'product_id',         //& FK in pivot table for the current model
// 'tag_id',             //& FK in pivot table for the related model   
// 'id'