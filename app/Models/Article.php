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
        'surface'
    ];

    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }

    public function images()
{
    return $this->hasMany(galerie::class);
}

}
