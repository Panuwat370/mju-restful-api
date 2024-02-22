<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('majors', function (Blueprint $table) { //สร้างตารางใหม่ชื่อว่า major
            $table->unsignedBigInteger('major_id')->autoIncrement();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps(); //คือค่าเวลา เซ็ต created_at,updated_at มาให้อัตโนมัติ 

        });

        $test = DB::table('majors')->insert([ //เพิ่มข้อมูลเข้าไปยังตาราง majors 
                [
                    'name'=>'ไทย',
                    'name_en'=>'thai',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'=>'ลาว',
                    'name_en'=>'laos',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'=>'อังกฤษ',
                    'name_en'=>'eng',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>'จีน',
                    'name_en'=>'chinese',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>'เกาหลี',
                    'name_en'=>'korea',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mju_students', function(Blueprint $table){
            // Drop the foreign key
            $table->dropForeign(['major_id']);
        });

        Schema::dropIfExists('majors');
    }
};