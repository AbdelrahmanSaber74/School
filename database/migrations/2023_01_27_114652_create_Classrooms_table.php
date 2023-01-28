<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('Classrooms', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_class_ar');
            $table->string('name_class_en');
            $table->foreignId('grade_id')->constrained('grades')->onUpdate('cascade')->onDelete('RESTRICT');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Classrooms');
	}
}
