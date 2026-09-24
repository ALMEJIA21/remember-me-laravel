<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'cuidador_id',
        'nombre',
        'correo',
        'telefono',
        'fechaNacimiento',
        'tipoUsuario'
    ];

    public function cuidador()
    {
        return $this->belongsTo(User::class, 'cuidador_id');
    }
}