<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class family extends Model
{
    // MOdelo del Familiar que Recive
    use HasFactory;
    protected $fillable = [
        'name',
        'no_cell',
        'no_card',
        'address',
        'cant_money_recive',
        'tipo'
    ];

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
