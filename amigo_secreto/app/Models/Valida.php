<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valida extends Model
{
    use HasFactory;

    protected $table = 'validar';
    protected $fillable = [
        'cc_user'
    ];
public $timestamps = false;

}
