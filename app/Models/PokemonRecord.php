<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Base_Experience',
        'weight',
        'stat',
        'abilities',
        'image_url'
    ];
}
