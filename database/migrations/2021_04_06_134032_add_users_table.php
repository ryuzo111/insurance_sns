<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
						$table->string('image')->nullable();
						$table->integer('age')->nullable();
						$table->integer('sex')->nullable();
						$table->integer('recruiter')->nullable();
						$table->string('insurance_company')->nullable();
						$table->string('family_structure')->nullable();
						$table->integer('home')->nullable();
						$table->string('pref')->nullable();
						$table->string('have_insurance')->nullable();
						$table->string('free_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
