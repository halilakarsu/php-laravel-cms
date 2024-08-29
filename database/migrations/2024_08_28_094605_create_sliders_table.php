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
        Schema::create('sliders', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('slider_title');
                $table->string('slider_slug');
                $table->string('slider_url');
                $table->string('slider_file');
                $table->string('slider_sort')->nullable();
                $table->text('slider_content')->nullable();
                $table->enum('slider_status',[1,0])->default(1);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
