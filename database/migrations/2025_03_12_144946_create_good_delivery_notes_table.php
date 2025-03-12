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
        Schema::create('good_delivery_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); //FK
            $table->unsignedBigInteger('payment_method_id')->nullable(); //FK
            $table->string('code')->unique();
            $table->string('customer');
            $table->decimal('total_price', 15, 2);
            $table->enum('status', ['Pending', 'Success', 'Failed','Processing'])->default('Pending');
            $table->softDeletes('deleted_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_delivery_notes');
    }
};
