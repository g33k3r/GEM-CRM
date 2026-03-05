<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertSettings extends Model
{
    use HasFactory;
    protected $table = 'alert_settings';
    protected $fillable = [
        'user_id',
        'follow_up',
        'follow_up_freq',
        'upcoming_maintenance',
        'upcoming_maintenance_freq',
        'overdue_maintenance',
        'overdue_maintenance_freq'
    ];
}

