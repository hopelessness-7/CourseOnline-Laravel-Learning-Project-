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
        Schema::create('user_theme_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_course_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('course_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('status_zadan');
            $table->string('status_vidim');
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
        Schema::dropIfExists('user_theme_courses');
    }
};
