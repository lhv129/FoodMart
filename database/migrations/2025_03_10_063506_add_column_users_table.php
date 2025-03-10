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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id'); //FK
            $table->string('phone',255)->nullable();
            $table->text('address',255)->nullable();
            $table->date('birthday',255)->nullable();
            $table->string('avatar',255)->nullable();
            $table->string('fileAvatar',255)->nullable();
            $table->enum('status', ['active', 'inactive','block'])->default('inactive');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
