<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherItems extends Model
{
    use HasFactory;
    protected $table = 'other_items';
    protected $fillable = [
        'name',
        'fields'
    ];
}

/*



 */
