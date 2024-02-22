<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mju_students', function (Blueprint $table) { //สร้างตารางใหม่ ชื่อว่า mju_students
            $table->string('student_code')->primary(); 
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('first_name_en');
            $table->string('last_name_en')->nullable();
            $table->unsignedInteger('major_id');
            $table->foreign('major_id')->references('id')->on('majors'); //foreign กำหนดเส้นทางไปยังคอลัมในตารางชื่อ majors
            $table->string('idcard');
            $table->date('birthdate')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamps();

            //define foreign key contraint
            $table->foreign('major_id')->referrnces('major_id')->on('majors')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('mju_students', function(Blueprint $table){
            // Drop the foreign key
            $table->dropForeign(['major_id']);
        });

        Schema::dropIfExists('mju_students');
    }
};