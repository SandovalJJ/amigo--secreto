<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dulce extends Model
{
    use HasFactory;

    protected $table = 'dulces';
    protected $fillable = [
        'id_user',
        'dulces'
        ];
public $timestamps = false;

}
