<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;      // primary key of this model not auto increment
    protected $fillable =[
        'cookie_id','user_id','product_id','quantity','options'
    ];




    protected static function booted()
    {
        static::observe(CartObserver::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name'=>'Anonymous',
        ]);
    }

    public function product()
    {
            return $this->belongsTo(Product::class);
    }



}
