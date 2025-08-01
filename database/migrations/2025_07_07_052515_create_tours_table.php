<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // e.g., "Catamaran Cruise to Ile Aux Gabriel Island"
            $table->string('full_title')->nullable(); // Optional full title
            $table->string('slug')->unique();   // Add this line
            $table->text('description')->nullable();  // full description (optional)
            $table->integer('duration_minutes');      // e.g., 420 for 7 hours
            $table->boolean('pickup_available')->default(false); // true/false
            $table->decimal('starting_price', 8, 2);  // e.g., 42.00
            $table->decimal('transfer_price', 8, 2)->nullable(); // Optional additional price for transfers
            $table->decimal('average_rating', 3, 2)->default(0); // e.g., 4.70
            $table->integer('total_reviews')->default(0);        // e.g., 932
            $table->foreignId('tour_category_id')->constrained('tour_categories')->onDelete('cascade');
            $table->string('main_image')->nullable(); // card cover photo

            // Group pricing fields
            $table->boolean('is_group_priced')->default(false);
            $table->decimal('group_price', 8, 2)->nullable();
            $table->integer('group_size')->nullable();

            // Optional return location
            $table->string('location')->nullable();

            // Number of pictures (default 4)
            $table->integer('number_of_pictures')->default(4);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
