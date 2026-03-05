<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->enum('water_filter_maintenance', ['yes', 'no'])->nullable()->after('water_filter_completed');
            $table->enum('silver_filter_maintenance', ['yes', 'no'])->nullable()->after('silver_filter_days');
            $table->enum('cavitron_filter_maintenance', ['yes', 'no'])->nullable()->after('cavitron_filter_days');
            $table->enum('amalgam_maintenance', ['yes', 'no'])->nullable()->after('amalgam_days');
            $table->enum('sterilizer_maintenance', ['yes', 'no'])->nullable()->after('sterilizer_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn([
                'water_filter_maintenance',
                'silver_filter_maintenance',
                'cavitron_filter_maintenance',
                'amalgam_maintenance',
                'sterilizer_maintenance'
            ]);
        });
    }
};

