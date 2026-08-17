<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = [
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
}
