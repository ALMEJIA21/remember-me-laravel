<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'recordatorios';

    protected $fillable = [
        'medicamento', 
        'hora', 
        'dias', 
        'notificacion'
    ];
}