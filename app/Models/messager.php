<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messager extends Model
{
    // Modelo del Mensajero que realiza entrega
    use HasFactory;
    protected $fillable = [
        'name',
        'no_cell'
    ];

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
