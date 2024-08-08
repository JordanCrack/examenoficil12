<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function atraccion()
    {
        return $this->belongsTo(Atraccion::class, 'id_atraccion');
    }
}
