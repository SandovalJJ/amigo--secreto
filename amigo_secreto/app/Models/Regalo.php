<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    use HasFactory;

    protected $table = 'deseos';
    protected $fillable = [
        'id_user',
        'mi_deseo'
        ];
public $timestamps = false;


}
