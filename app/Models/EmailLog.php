<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    use HasFactory;
    protected $table = 'email_logs';
    protected $fillable = [
        'email_type',
        'reference_type',
        'reference_id',
        'equipment_type',
        'frequency',
        'target_date',
        'recipient_id',
        'recipient_email',
        'sent_at'
    ];

    protected $casts = [
        'target_date' => 'date',
        'sent_at' => 'datetime'
    ];
}

