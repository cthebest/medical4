<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->unsignedBigInteger('order')->default(0);
            $table->string('icon')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->foreignId('component_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('component_option_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('menu_items');
    }
};
