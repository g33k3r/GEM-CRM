<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        // Clinic Details
        'office_name',
        'doctor_name',
        'address',
        'suite',
        'city',
        'state',
        'zip_code',
        'office_number',
        'last_dos',

        // Compressor A
        'compressor_a_model',
        'compressor_a_serial',
        'compressor_a_oem',
        'compressor_a_initial',
        'compressor_a_last',
        'compressor_a_next',
        'compressor_a_days',

        // Compressor B
        'compressor_b_model',
        'compressor_b_serial',
        'compressor_b_oem',
        'compressor_b_initial',
        'compressor_b_last',
        'compressor_b_next',
        'compressor_b_days',

        // Water Sediment Filter
        'water_filter_initial',
        'water_filter_next',
        'water_filter_days',
        'water_filter_completed',
        'water_filter_maintenance',

        // Silver Filter
        'silver_filter_initial',
        'silver_filter_next',
        'silver_filter_days',
        'silver_filter_maintenance',

        // Cavitron Filter
        'cavitron_filter_initial',
        'cavitron_filter_next',
        'cavitron_filter_days',
        'cavitron_filter_maintenance',

        // Amalgam Separator
        'amalgam_model',
        'amalgam_initial',
        'amalgam_next',
        'amalgam_days',
        'amalgam_maintenance',

        // Sterilizer
        'sterilizer_model',
        'sterilizer_initial',
        'sterilizer_next',
        'sterilizer_days',
        'sterilizer_maintenance',

        // Status
        'status',
    ];

    protected $casts = [
        'last_dos' => 'date',
        'compressor_a_initial' => 'date',
        'compressor_a_last' => 'date',
        'compressor_a_next' => 'date',
        'compressor_a_days' => 'integer',
        'compressor_b_initial' => 'date',
        'compressor_b_last' => 'date',
        'compressor_b_next' => 'date',
        'compressor_b_days' => 'integer',
        'water_filter_initial' => 'date',
        'water_filter_next' => 'date',
        'water_filter_days' => 'integer',
        'silver_filter_initial' => 'date',
        'silver_filter_next' => 'date',
        'silver_filter_days' => 'integer',
        'cavitron_filter_initial' => 'date',
        'cavitron_filter_next' => 'date',
        'cavitron_filter_days' => 'integer',
        'amalgam_initial' => 'date',
        'amalgam_next' => 'date',
        'amalgam_days' => 'integer',
        'sterilizer_initial' => 'date',
        'sterilizer_next' => 'date',
        'sterilizer_days' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active clients.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include inactive clients.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    /**
     * Scope a query to only include archived clients.
     */
    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }
}

