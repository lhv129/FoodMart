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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_method_id')->nullable(); //FK
            $table->string('code')->unique();
            $table->string('customer');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->longText('note')->nullable();
            $table->decimal('total_price', 15, 2);
            $table->enum('status', ['Pending', 'Success', 'Failed','Paid'])->default('Pending');
            $table->softDeletes('deleted_at');
            $table->timestamps();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
