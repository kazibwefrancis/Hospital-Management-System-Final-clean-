<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *@return void
     */
    public function up(): void
{
    Schema::create('medical_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
        $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');
        $table->date('visit_date');
        $table->text('symptoms')->nullable();
        $table->text('diagnosis')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('medical_records');
}

};
