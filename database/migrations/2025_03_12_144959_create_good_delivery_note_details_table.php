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
        Schema::create('good_delivery_note_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('good_delivery_note_id'); //FK
            $table->unsignedBigInteger('product_id'); //FK
            $table->integer('quantity');
            $table->decimal('sub_total', 15, 2);
            $table->softDeletes('deleted_at');
            $table->timestamps();

            $table->foreign('good_delivery_note_id')->references('id')->on('good_delivery_notes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_delivery_note_details');
    }
};
