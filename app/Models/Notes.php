<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = [
        'user_id',
        'client_id',
        'note'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that created the note.
     */
    public function user()
    {
        return $this->belongsTo(Credentials::class, 'user_id');
    }

    /**
     * Get the client that the note belongs to.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

/*



 */
