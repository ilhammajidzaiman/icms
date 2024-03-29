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
        Schema::create('user_access_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_level_id')->constrained('user_levels')->cascadeOnUpdate()->restrictOnDelete()->comment('id table user_levels');
            $table->foreignId('user_menu_parent_id')->constrained('user_menu_parents')->cascadeOnUpdate()->restrictOnDelete()->comment('id table user_menu_parents');
            $table->foreignId('user_menu_child_id')->constrained('user_menu_children')->cascadeOnUpdate()->restrictOnDelete()->comment('id table user_menu_children');
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
        Schema::dropIfExists('user_access_children');
    }
};
