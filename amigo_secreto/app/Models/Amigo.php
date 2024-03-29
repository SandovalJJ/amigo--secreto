<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    use HasFactory;

    protected $table = 'amigo';
    protected $fillable = [
        'id_user',
        'id_amigo'
        ];
public $timestamps = false;
}
