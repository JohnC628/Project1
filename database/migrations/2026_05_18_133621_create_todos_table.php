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
        Schema::create('todos', function (Blueprint $table) {
            $table->id()->comment('');
            $table->UnsignedBigInteger('user_id')->comment('使用者編號');
            $table->string('title')->comment('代辦事項標題');
            $table->text('description')->nullable()->comment('代辦事項描述');
            $table->boolean('is_completed')->default(false)->comment('使用者編號');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
