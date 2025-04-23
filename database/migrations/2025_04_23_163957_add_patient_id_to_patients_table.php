<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column already exists before adding it
        if (!Schema::hasColumn('patients', 'patient_id')) {
            Schema::table('patients', function (Blueprint $table) {
                $table->string('patient_id')->nullable()->after('id'); // Add column as nullable first
            });

            // Assign unique patient_id values to existing rows
            $patients = DB::table('patients')->get();
            foreach ($patients as $patient) {
                DB::table('patients')
                    ->where('id', $patient->id)
                    ->update(['patient_id' => 'OH' . str_pad($patient->id, 4, '0', STR_PAD_LEFT)]);
            }

            // Make the column unique and non-nullable
            Schema::table('patients', function (Blueprint $table) {
                $table->string('patient_id')->unique()->nullable(false)->change();
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
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('patient_id');
        });
    }
};
