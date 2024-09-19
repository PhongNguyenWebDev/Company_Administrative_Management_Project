<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id()->primary(); // Sử dụng id() để tạo cột ID tự tăng là khóa chính
            $table->string('department_name');
            $table->integer('floor')->nullable();
            $table->integer('unit')->nullable();
            $table->string('building')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
