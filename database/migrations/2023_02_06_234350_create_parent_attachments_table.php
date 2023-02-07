<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('parent_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->foreignId('parent_id')->constrained('my_parents')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('parent_attachments');
    }
};
