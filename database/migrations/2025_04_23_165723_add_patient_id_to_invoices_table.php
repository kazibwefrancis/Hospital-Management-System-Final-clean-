<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientIdToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column already exists before adding it
        if (!Schema::hasColumn('invoices', 'patient_id')) {
            Schema::table('invoices', function (Blueprint $table) {
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
        });
    }
}
