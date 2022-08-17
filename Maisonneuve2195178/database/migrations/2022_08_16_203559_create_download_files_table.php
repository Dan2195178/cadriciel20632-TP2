<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_files', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);// champ de table
            $table->string('title_fr',100);// champ de table
            $table->date('date');
            $table->string('file_url',100);
            $table->string('file_extension',5);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('download_files');
    }
}
