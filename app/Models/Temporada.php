<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];

    public function Temporada()
    {
        return $this->hasMany(Temporada::class, 'serie_id');
    }
}