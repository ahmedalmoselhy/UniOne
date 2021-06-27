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
            $table->string('address')->nullable();
            $table->foreignId('image_id')->nullable();
            $table->foreignId('level_id')->nullable();

//            data related to student only
            $table->date('joining_date')->nullable();
            $table->float('highschool_score')->nullable();
//            THINK about the idea of levels

//            data related to professor, assistant and employee only
            $table->foreignId('degree_id')->nullable();
            $table->boolean('hiring_year')->nullable();

//            data related to professor only
            $table->boolean('is_deen')->default(0);
            $table->boolean('is_manager')->default(0);
            $table->boolean('is_president')->default(0);


//            data related to all personal (student_professor_assistant_employee) also (department_college)
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('college_id')->nullable();
            $table->bigInteger('university_id')->nullable();


//            data related to university and college only
            $table->date('establishment_year')->nullable();

//            data related to university and department only
            $table->boolean('is_private')->nullable()->default(0);
            $table->bigInteger('presedent_id')->nullable();

//            data related to college only
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_credit')->default(0);
            $table->bigInteger('deen_id')->nullable();

//            data related to department only
            $table->bigInteger('manager_id')->nullable();


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
