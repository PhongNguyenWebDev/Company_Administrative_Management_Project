<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id()->primary(); // Sử dụng id() để tạo cột ID tự tăng là khóa chính
            $table->foreignId('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->string('location_name');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
