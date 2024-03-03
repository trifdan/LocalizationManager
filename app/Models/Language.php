<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';
    protected $fillable = [
        'code_iso2',
        'name'
    ];
    public $timestamps = false;
}
