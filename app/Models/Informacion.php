<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'seccion',
        'titulo',
        'subtitulo',
        'contenido',
        'pie',
        'orden'
    ];
}
