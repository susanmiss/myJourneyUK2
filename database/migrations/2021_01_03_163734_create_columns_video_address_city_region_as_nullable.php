<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsVideoAddressCityRegionAsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('address0')->nullable();
            $table->string('city0')->nullable();
            $table->string('region0')->nullable();
            $table->string('video0')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('address0');
            $table->dropColumn('city0');
            $table->dropColumn('region0');
            $table->dropColumn('video0');
        });
    }
}