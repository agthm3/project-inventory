<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'requestdate',
        'requestor',
        'department',
        'ponumber',
        'notes',
        'from_note',
        'to_note',
        'vehiclenumber',
        'status',
        'quantity',
    ];
}
