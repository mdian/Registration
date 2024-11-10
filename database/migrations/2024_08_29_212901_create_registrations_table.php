<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fullName');
            $table->integer('age');
            $table->enum('agetype', ['سنة', 'شهر', 'يوم']);
            // $table->date('dob');
            $table->enum('type', ['نازح', 'مقيم']);
            $table->enum('clinic', ['العينية', 'الأذنية', 'oct']);
            $table->string('address');
            $table->string('phoneNum');
            $table->enum('appointmentDay', [
                'السبت',
                'الأحد',
                'الأثنين',
                'الثلاثاء',
                'الأربعاء',
                'الخميس',
                'الجمعة',
            ]);
            $table->string('hospitalName')->nullable();
            $table->date('matchDate')->default('1900-1-1');
        });
    }

    public function down()
    {
        Schema::drop('registrations');
    }
}
