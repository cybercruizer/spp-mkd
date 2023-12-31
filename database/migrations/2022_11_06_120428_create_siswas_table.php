<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('wali_id')->nullable()->index();
            $table->integer('rombel_id')->nullable();
            $table->string('wali_status')->nullable();
            $table->string('nama', 255);
            $table->string('nisn', 20)->unique();
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('jurusan', 20);
            $table->tinyInteger('kelas');
            $table->integer('angkatan');
            $table->enum('kategori',['REG','AP50','AP100'])->default('REG');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('siswas');
    }
};
