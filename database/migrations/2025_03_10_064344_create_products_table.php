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
            $table->unsignedBigInteger('category_id'); //FK
            $table->unsignedBigInteger('unit_id'); //FK
            $table->string('name',255)->unique();
            $table->string('image',255)->nullable();
            $table->string('fileImage',255)->nullable();
            $table->decimal('entry_price', 15, 2);
            $table->decimal('retail_price', 15, 2);
            $table->string('slug',255)->unique();
            $table->timestamps();
            $table->softDeletes('deleted_at');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
