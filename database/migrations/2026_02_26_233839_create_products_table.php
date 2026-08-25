<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();   
            $table->string('image')->nullable();   
            $table->float('price')->default(0);               
            $table->float('compare_price')->nullable();               
            $table->json('options')->nullable();   
            $table->float('rating')->default(0);
            $table->boolean('featured')->default(0);   //^ الاكثر مبيعا مثلا
            //^ products سيتم حذف جميع ال Store عند حذف ال
            $table->foreignId('store_id')->nullable()->constrained('stores')->cascadeOnDelete();   
            //^ products لن يتم حذف ال category عند حذف 
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();    
            //^ draft => product not ready , 
            $table->enum('status',['active','draft','archived'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
