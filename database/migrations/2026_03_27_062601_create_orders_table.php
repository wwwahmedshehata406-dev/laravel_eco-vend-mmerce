<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->nullOnDelete();
            $table->string('number')->unique();
            $table->string('payment_method')->unique();

            $table->enum('status' , ['pending' , 'processing' , 'delivering' , 'completed' , 'cancelled', 'refund'])->default('pending');
            $table->enum('payment_status' , ['pending' , 'paid' , 'faild'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
