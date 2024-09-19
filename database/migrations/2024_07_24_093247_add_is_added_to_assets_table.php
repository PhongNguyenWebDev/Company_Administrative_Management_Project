<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAddedToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->boolean('is_added')->default(false)->after('supplier_id');
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('is_added');
        });
    }
}
