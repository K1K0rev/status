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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['new', 'in_process', 'in_work', 'complete', 'rejected'])->default('new');
            $table->integer('height')->nullable();
            $table->integer('surface_area');
            $table->boolean('rent_equipment')->default(false);
            $table->enum('complexity', ['легкая', 'средняя', 'сложная'])->default('легкая');
            $table->enum('accessibility_surface', ['свободное', 'затрудненное', 'критическое'])->default('свободное');
            $table->enum('accessibility_workplace', ['свободное', 'затрудненное', 'критическое'])->default('свободное');
            $table->boolean('protect_other_components')->default(false);
            $table->boolean('schedule')->default(false);
            $table->boolean('combined_work')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
