<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'client_id',
        'service_type',
        'visit_date',
        'assigned_worker',
        'job_status'
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    /**
     * Get the client that owns the job.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Get the assigned worker (credentials).
     */
    public function worker()
    {
        return $this->belongsTo(Credentials::class, 'assigned_worker');
    }
}

