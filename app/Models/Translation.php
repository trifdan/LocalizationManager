<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $table = 'translations';
    protected $fillable = [
        'language_code',
        'locale_key',
        'value'
    ];
    public $timestamps = false;
    public $hidden = ['id'];
}
