<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageText extends Model
{
    protected $fillable = [
        'text',
        'img_url',
        'created_at',
        'updated_at'
    ];
}
