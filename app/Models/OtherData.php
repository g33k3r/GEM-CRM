<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherData extends Model
{
    use HasFactory;
    protected $table = 'other_data';
    protected $fillable = [
        'name',
        'item_type_id',
        'data',
        'client_id'
    ];
}

/*



 */
