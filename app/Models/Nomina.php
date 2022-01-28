<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $fillable =
    [
        'nombreEmpleado',
        'cedula',
        'salario',
        'diasTrabajados',
        'auxTransporte',
        'prima',
     ];
}
