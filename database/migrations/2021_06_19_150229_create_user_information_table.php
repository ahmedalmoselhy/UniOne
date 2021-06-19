<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
//            General data relates to all users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('address');

//            data related to students only
            $table->date('joining_date')->nullable();
            $table->float('highschool_score')->nullable();

//            data related to university and college only
            $table->date('establishment_year')->nullable();

//            data related to university only
            $table->boolean('is_private')->nullable()->default(0);
            $table->bigInteger('presedent_id')->nullable();

//            data related to college only
            $table->bigInteger('university_id')->nullable();

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
        Schema::dropIfExists('user_information');
    }
}
