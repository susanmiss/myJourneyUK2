<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleImagesColumnsToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image0')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('image8')->nullable();
            $table->string('image9')->nullable();
            $table->string('image10')->nullable();
            $table->string('image11')->nullable();
            $table->string('image12')->nullable();
            $table->string('image13')->nullable();
            $table->string('image14')->nullable();
            $table->string('image15')->nullable();
            $table->string('image16')->nullable();
            $table->string('image17')->nullable();
            $table->string('image18')->nullable();
            $table->string('image19')->nullable();
            $table->string('image20')->nullable();
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
            $table->dropColumn('image0');
            $table->dropColumn('image1');
            $table->dropColumn('image2');
            $table->dropColumn('image3');
            $table->dropColumn('image4');
            $table->dropColumn('image5');
            $table->dropColumn('image6');
            $table->dropColumn('image7');
            $table->dropColumn('image8');
            $table->dropColumn('image9');
            $table->dropColumn('image10');
            $table->dropColumn('image11');
            $table->dropColumn('image12');
            $table->dropColumn('image13');
            $table->dropColumn('image14');
            $table->dropColumn('image15');
            $table->dropColumn('image16');
            $table->dropColumn('image17');
            $table->dropColumn('image18');
            $table->dropColumn('image19');
            $table->dropColumn('image20');

        });
    }
}
