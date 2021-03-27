<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInsuranceToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
								$table->integer('life')->nullable();
								$table->integer('midical')->nullable();
								$table->integer('saving')->nullable();
								$table->integer('cancer')->nullable();
								$table->integer('pension')->nullable();
								$table->integer('all_life')->nullable();
								$table->integer('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
								$table->dropColumn('insurance_type');
        });
    }
}
