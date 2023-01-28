<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('Grades', function(Blueprint $table) {
            $table->id();
			$table->string('name_ar')->unique();
            $table->string('name_en')->unique();
			$table->string('notes', 50)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Grades');
	}
}
