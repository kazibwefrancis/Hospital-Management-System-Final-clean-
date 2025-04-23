<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointmentsori', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('email');
            $table->date('appointment_date');
            $table->string('departement');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointmentsori');
    }
};