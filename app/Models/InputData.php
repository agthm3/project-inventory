<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputData extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'verificationdate',
       'ponumber',
       'deskripsi',
       'quantity',
       'receivedby',
       'user',
       'storagelocation',
       'vehiclenumber',
       'supplier',
       'remark',
    'image'
    ];

// Di dalam model InputData

public function requestMaterial()
{
    return $this->hasOne(RequestMaterial::class, 'input_data_id');
}

   
}
