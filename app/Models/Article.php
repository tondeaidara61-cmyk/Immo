<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'specification',
        'prix',
        'ville',
        'commune',
        'quatier',
        'etage',
        'chambre',
        'piece',
        'description',
        'surface',
        'image'
    ];

    public function specifications()
    {
        return $this->belongsToMany(Specification::class);
    }

    public function galeries()
    {
        return $this->hasMany(galerie::class);
    }
}
