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
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('username'); // عمود اسم المستخدم
            $table->string('email')->unique(); // عمود الايميل ويكون فريد
            $table->string('password'); // عمود كلمة المرور
            $table->string('domain')->unique();
            $table->string('storename'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login');
    }
};
