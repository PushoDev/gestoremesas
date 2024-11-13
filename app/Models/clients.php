<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class clients extends Model
{
    // Modelo del cliente que Envia
    use HasFactory;
    protected $fillable = [
        'name',
        'no_cell',
        'cant_money_envia'
    ];

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
