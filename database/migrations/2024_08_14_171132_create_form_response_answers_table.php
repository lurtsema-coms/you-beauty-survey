<?php

use App\Models\FormResponse;
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
        Schema::create('form_response_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FormResponse::class);
            $table->string('question');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->index('form_response_id');
            $table->index('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_response_answers');
    }
};
