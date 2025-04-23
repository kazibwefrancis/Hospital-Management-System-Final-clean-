<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientIdToMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column already exists before adding it
        if (!Schema::hasColumn('medical_records', 'patient_id')) {
            Schema::table('medical_records', function (Blueprint $table) {
                $table->string('patient_id')->after('id'); // Add patient_id column
                $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade'); // Add foreign key
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
        });
    }
}
