<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienvenida extends Model
{
    protected $table = 'bienvenida';
    protected $primaryKey = 'id_bienvenida';
    protected $fillable = ['contenido'];
    public $timestamps = false;

    use HasFactory;
}
