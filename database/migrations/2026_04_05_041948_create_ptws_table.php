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
        Schema::create('ptws', function (Blueprint $table) {
            $table->id();

            $table->string('status')->default('draft');
            $table->string('ptw_number')->nullable();

            $table->string('request_by');
            $table->string('section');
            $table->date('work_date');
            $table->text('description');

            $table->timestamp('printed_at')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('closed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ptws');
    }
};
