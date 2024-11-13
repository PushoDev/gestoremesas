<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class entrega extends Model
{
    // Modelo de las Entregas
    protected $fillable = [
        'clients_id',
        'family_id',
        'messager_id'
    ];

    public function cliente_envia()
    {
        return $this->belongsTo(Clients::class);
    }

    public function familiar_recive()
    {
        return $this->belongsTo(Family::class);
    }

    public function mensajero()
    {
        return $this->belongsTo(Messager::class);
    }
}
