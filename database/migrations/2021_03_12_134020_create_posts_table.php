<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id');
	    $table->string('title');
	    $table->string('trouble');
	    $table->string('person')->nullable();
	    $table->integer('person_age')->nullable();
	    $table->string('insurance_type')->nullable();
	    $table->string('insurance_value')->nullable();
	    $table->string('contents');
	    $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
